<?php
class Act extends Eloquent 
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'activities_entity';
	protected $tableContent = 'activities_content';

	public function getActOpen()
	{
	    $now = date('Y-m-d H:i:s', time());
	    $result = $this->where('open_date', '<', $now)
	              ->where('start_date', '>', $now)
	              ->get()->toJson();
	    //$queries = DB::getQueryLog();$last_query = end($queries);var_dump($last_query);
	    return $result;
	}

}