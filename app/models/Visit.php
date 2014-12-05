<?php


class Visit extends Eloquent{

    protected $fillable = ['start', 'end', 'person_id'];

    public function person()
    {
        return $this->belongsTo('Person');
    }

}