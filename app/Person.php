<?php namespace VkWatcher;

use Illuminate\Database\Eloquent\Model;

class Person extends Model {

    protected $fillable = ['id', 'first_name', 'last_name', 'domain', 'last_check_online'];



    public function users()
    {
        return $this->belongsToMany('VkWatcher\User');
    }


    public function visits()
    {
        return $this->hasMany('VkWatcher\Visit');
    }


    protected $table = 'persons';

}