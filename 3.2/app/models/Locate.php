<?php
class Locate extends Eloquent 
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'map_locate';
	
	public function locates()
    {
        return $this->hasMany('Locate');
    }
    
    public function getMaps($country)
	{
	    $result = $this->find(1)->locates()->where('id', '=', 'foo')->first();
	    return $result;
	}

	/*public function getMaps($country)
	{
	    $result = $this->leftJoin('map_entity', function($join) {
            $join->on('map_locate.id', '=', 'map_entity.locate');
        })
	    
	    where('country', '=', $now)
	              ->where('start_date', '>', $now)
	              ->get()->toJson();
	    //$queries = DB::getQueryLog();$last_query = end($queries);var_dump($last_query);
	    return $result;
	}*/

}