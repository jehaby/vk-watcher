<?php

use Carbon\Carbon;

class Visit extends Eloquent {

    /**
     * primaryKey
     *
     * @var integer
     * @access protected
     */
//    protected $primaryKey = null;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
//    public $incrementing = false;


    protected $fillable = ['online', 'offline', 'person_id'];

    public $timestamps = false;


    public function person()
    {
        return $this->belongsTo('Person');
    }


    public function scopeDay($query, $person_id, $day)
    {
        return $query->wherePersonId($person_id);
//            ->whereBetween('online', [Carbon::day()]);
    }


    public function scopeLastNDays($query, $person_id, $number_of_days)
    {
        return $query->wherePersonId($person_id)
            ->whereBetween('online', [Carbon::today()->subDays($number_of_days - 1), Carbon::now()]);
    }




}