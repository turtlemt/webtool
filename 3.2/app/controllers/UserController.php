<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	|
	| User Basic controller
	|
	*/

	public function getUser()
	{
	    echo 'getuser';
		return View::make('hello');
	}
	
	public function postUser()
	{
	    echo 'postuser';
		return View::make('hello');
	}

}