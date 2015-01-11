<?php namespace VkWatcher\Http\Controllers;

use Illuminate\Routing\Controller;

class UserController extends Controller{


    public function getRegister()
    {
        return response()->view('register');
    }


    public function postRegister()
    {
        $validator = Validator::make(Input::all(),
            [
                'username' => 'required|min:1|max:32|unique:users,username',
                'password' => 'required|min:3|max:128',
                'email' => 'required|email|unique:users,email'
            ]
        );

        if($validator->fails()) {
            return Redirect::to('u/register')->withErrors($validator)->withInput();
        }

        $new_user = User::create(Input::only('username', 'password', 'email'));

        d($new_user);

        return d(Input::all());

    }

}