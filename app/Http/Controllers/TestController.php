<?php namespace VkWatcher\Http\Controllers;

use Illuminate\Routing\Controller;

class TestController extends Controller{

//    public function __construct()
//    {
//
//    }
//
//    public function index()
//    {
//        echo 'hellow, ...';
//    }

    public function getIndex()
    {
        return response()->view('pure');
        echo 'hellow, ...';
    }
}