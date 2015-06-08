<?php

class ActController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Act Controller
	|--------------------------------------------------------------------------
	|
	| Activities Basic controller
	|
	*/

	public function getIndex()
	{
	    //$myacts = DB::table('act_content')->where('date_start', '>', date("Y-m-d H:i:s"))->get();
        $act = new Act;
        $myacts = $act->getActOpen();
        /*foreach($myacts as $data){
            echo $data['id'];
        }*/
        return View::make('activities.index', 
                            array('title' => 'Activities',
                            'activities' => $myacts,
                            ));
	}
	
	public function postUser()
	{
	    echo 'postuser';
		return View::make('hello');
	}

}