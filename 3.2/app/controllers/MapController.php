<?php

class MapController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Map Controller
	|--------------------------------------------------------------------------
	|
	| Dive site map Basic controller
	|
	*/

	public function getIndex()
	{
	    //$myacts = DB::table('act_content')->where('date_start', '>', date("Y-m-d H:i:s"))->get();
        /*$act = new Act;
        $myacts = $act->getActOpen();*/
        /*foreach($myacts as $data){
            echo $data['id'];
        }*/
        return View::make('maps.index', 
                            array('title' => 'Dive site map',
                            'activities' => '',
                            ));
	}
	
	public function postUser()
	{
	    echo 'postuser';
		return View::make('hello');
	}

}