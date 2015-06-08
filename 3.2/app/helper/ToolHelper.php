<?php
class ToolHelper
{
	public function postParser($content)
	{
	    $exchangebox = array();
	    $i = 0;
	    $contentTemp = $content;
	    while(strpos($contentTemp, 'http://turtlemt.pixnet.net/album/photo/') !== false){
	        $exchangebox[$i]['link'] = substr($contentTemp, strpos($contentTemp, 'http://turtlemt.pixnet.net/album/photo/'));
	        $contentTemp = substr($contentTemp, strpos($contentTemp, 'http://turtlemt.pixnet.net/album/photo/') + 39);
	        $exchangebox[$i]['link'] .= substr($contentTemp, 0, strpos($contentTemp, '"'));
	        var_dump($exchangebox);exit;
	    }
	}
//<a href="http://turtlemt.pixnet.net/album/photo/108225497">
//<img title="PA290412.jpg" src="http://pic.pimg.tw/turtlemt/4affac0b268e6.jpg" border="0" alt="PA290412.jpg" /></a>
}