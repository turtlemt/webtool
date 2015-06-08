<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Modules\Tool\Models\Post;
use App\Modules\Tool\Models\Imagelist;
use App\Modules\Tool\Helper\ToolHelper;

class ToolController extends Controller {
    
    /*public function __construct()
    {
        require app_path().'/Modules/Tool/Helper/ToolHelper.php';
        
    }*/
    
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function post()
	{
        ini_set('max_execution_time', '300');
        ob_start();
        $helper = new ToolHelper;
	    $posts = Post::where('parser', '=', 0)->take(30)->get();
        $imagelists = Imagelist::all();
        
        foreach ($posts as $post){
	        if(strpos($post->post_content, 'http://turtlemt.pixnet.net/album/photo/') !== false){
                $content = $helper->postParser($post, $imagelists);
                if($content)
                    $post->post_content = $content;
            }
            $post->parser = 1;
            $post->save();
            echo 'Process ID:' . $post->id . '</br>';
            echo str_pad('',4096);
            
            ob_flush();
            flush();
	    }
        ob_end_flush();
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
