<?php

class ToolController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Tool Controller
	|--------------------------------------------------------------------------
	*/
    public function __construct()
    {
        require app_path().'/helper/ToolHelper.php';
    }

	public function post()
	{
	    //$myacts = DB::table('act_content')->where('date_start', '>', date("Y-m-d H:i:s"))->get();
        $tool = new Tool;
        $posts = $tool->getPost();
        $helper = new ToolHelper;
        foreach($posts as $post){
            if(strpos($post['post_content'], 'http://turtlemt.pixnet.net/album/photo/') !== false)
                $post['post_content'] = $helper->postParser($post['post_content']);
        }
        return View::make('tools.post', 
                            array('title' => 'tools',
                            'posts' => $posts,
                            ));
	}

}