<?php


class Visit extends Eloquent{

    public function persons()
    {
        return $this->belongsToMany('Person');
    }

}