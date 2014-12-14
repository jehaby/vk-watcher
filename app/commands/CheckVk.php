<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Carbon\Carbon;


class CheckVk extends ScheduledCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'jehaby:checkvk';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Checks vk';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * When a command should run
	 *
	 * @param Scheduler $scheduler
	 * @return \Indatus\Dispatcher\Scheduling\Schedulable
	 */
	public function schedule(Schedulable $scheduler)
	{
		return $scheduler->everyMinutes(5);
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{

		$this->doStuff();
		Log::info('vk_watcher_works');

	}

	private function doStuff()  // it should be in outer class
	{

		$persons = Person::lists('last_check_online', 'id');
		$ids_string = implode(',', array_keys($persons));

		$vk_response = file_get_contents("https://api.vk.com/method/users.get?user_ids={$ids_string}&fields=online");
		$res = json_decode($vk_response);

		foreach($res->response as $person) {

			$last_check_online = $persons[$person->uid];  // getPersonWithThisID

			// There will be bug if server go offline or VK ban us!
			//  it can be solved with task which checks when was the last sucessfull request to vk api

			if ($person->online && !$last_check_online) {  // person appears online
				Visit::create(['person_id' => $person->uid, 'online' => Carbon::now()]);
				Person::find($person->uid)->update(['last_check_online' => true]);  // how many queries?
			}

			if (!$person->online && $last_check_online) { // person go offline
				Visit::wherePersonId($person->uid)->orderBy('online', 'desc')->first()->update(['offline' => Carbon::now()]);
				Person::find($person->uid)->update(['last_check_online' => false]);
			}
		}
	}

	private function getStatuses($ids)
	{

		return file_get_contents("https://api.vk.com/method/users.get?user_id={$ids}&fields=online");
	}




}
