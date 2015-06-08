<?php
class Tool extends Eloquent 
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'wp_posts';
	protected $tableContent = 'divesite_entity';

	public function getPost()
	{
	    $result = $this->where('parser', '0')
	              ->take(20)->get();
	    //$queries = DB::getQueryLog();$last_query = end($queries);var_dump($last_query);
	    return $result;
	}

}