<?php


class Person extends Eloquent {

    protected $fillable = ['id', 'first_name', 'last_name', 'domain'];

    public function users()
    {
        return $this->belongsToMany('User');
    }

    protected $table = 'persons';

}