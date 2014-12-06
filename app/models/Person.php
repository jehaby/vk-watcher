<?php


class Person extends Eloquent {

    protected $fillable = ['id', 'first_name', 'last_name', 'domain', 'last_check_online'];

    public function users()
    {
        return $this->belongsToMany('User');
    }

    public function visits()
    {
        return $this->hasMany('Visit');
    }

    protected $table = 'persons';

}