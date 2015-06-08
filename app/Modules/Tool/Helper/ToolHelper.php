<?php namespace App\Modules\Tool\Helper;

use PHPHtmlParser\Dom;

class ToolHelper
{
	/*public function postParser($post)
	{
        $output = array();
	    $parserLinks = $this->_getLink($post->post_content);
	    foreach ($parserLinks as $key => $link){
            $element = new \stdClass();
	        $element->href = $link->href;    //album link
	        $parserImages = $this->_getImg($link);
            if(count($parserImages) > 0){
                if(strpos($parserImages[0]->src, 'http://pic.pimg.tw/turtlemt') !== false){
                    $element->title =  $parserImages[0]->title;    //img title
                    $element->src =  $parserImages[0]->src;        //img src
                    $element->alt =  $parserImages[0]->alt;        //img alt
                    $output[$key] = $element;
                }
            }
	    }
	    return $output;
	}*/
    
    public function postParser($post, $imagelists)
	{
        $baseImageUrl = '/wp-content/uploads/2015/pixnet/';
	    $parserLinks = $this->_getDom($post->post_content)->find('a');
        $outputDom = $this->_getDom($post->post_content);
	    foreach ($parserLinks as $key => $link){
            $hitFlag = false;
	        $parserImages = $this->_getImg($link);
            $imageName = substr($link, strpos($link, 'http://turtlemt.pixnet.net/album/photo/') + 39, 9);
            if(count($parserImages) > 0){
                if(strpos($parserImages[0]->src, 'http://pic.pimg.tw/turtlemt') !== false){
                    foreach($imagelists as $imagelist){
                        //Has album column or not?
                        if($post->album != ''){
                            if($imagelist->folder == $post->album){
                                /*if(strpos($imagelist->filename, $parserImages[0]->title . '.')){
                                    $element = $this->fetchImage($baseImageUrl, $imagelist);
                                    $hitFlag = true;
                                }*/
                                if(strpos($imagelist->filename, $imageName) !== false){
                                    $element = $this->fetchImage($baseImageUrl, $imagelist);
                                    $hitFlag = true;
                                }
                            }
                        } else {
                            if(strpos($imagelist->filename, $parserImages[0]->title)){
                                $element = $this->fetchImage($baseImageUrl, $imagelist);
                                $hitFlag = true;
                            }
                        }
                    }
                }
            }
            if($hitFlag == true){//var_dump($link->outerHtml);
                $outputDom->find('a[href=' . $link->href . ']')->setAttribute('href', $element->href);
                //$outputDom->find('img[title=' . $parserImages[0]->title . ']')->setAttribute('title', $element->title)->setAttribute('src', $element->src)->setAttribute('alt', $element->alt);
                $imageTemps = $outputDom->find('a[href=' . $element->href . ']')->find('img');//var_dump($imageTemps->outerHtml);
                $imageTemps->setAttribute('title', $element->title)->setAttribute('src', $element->src)->setAttribute('alt', $element->alt);
                
            }
	    }
        if($hitFlag == true){
            return $outputDom->outerHtml;
        } else {
            return false;
        }
	}
    
    protected function fetchImage($baseImageUrl, $imagelist)
    {
        $element = new \stdClass();
        $element->href = $baseImageUrl . $imagelist->folder . '/' . $imagelist->filename;
        $element->title =  $imagelist->filename;    //img title
        $element->src =  $baseImageUrl . $imagelist->folder . '/' . $imagelist->filename;        //img src
        $element->alt =  $imagelist->filename; 
        return $element;
    }
    
    public function replaceParser($elements, $imagelists)
    {   
        $baseImageUrl = '/wp-content/uploads/2015/pixnet/';
        foreach($elements as $element){
            foreach($element->images as $image){
                foreach($imagelists as $imagelist){
                    if(strpos($imagelist->filename, $image->title)){
                        $image->href = $baseImageUrl . $imagelist->folder . '/' . $imagelist->filename;
                        $image->title = $imagelist->filename;
                        $image->src = $baseImageUrl . $imagelist->folder . '/' . $imagelist->filename;
                        $image->alt = $imagelist->filename;
                    }
                }
            }
        }
        return $elements;
    }
        
    public function replaceUpdate($elements, $posts)
    {   
        foreach ($posts as $key => $post){
	        if(strpos($post->post_content, 'http://turtlemt.pixnet.net/album/photo/') !== false){
                $parserLinks = $this->_getLink($post->post_content);
                foreach ($parserLinks as $key => $link){
                    $element = new \stdClass();
                    $element->href = $link->href;    //album link
                    $parserImages = $this->_getImg($link);
                    if(count($parserImages) > 0){
                        if(strpos($parserImages[0]->src, 'http://pic.pimg.tw/turtlemt') !== false){
                            foreach($elements as $element){
                                if($element->id == $post->ID){
                                    foreach($element->images as $image){
                                        
                                    }
                                }
                            }
                            $parserImages[0]->setAttribute('title', 'hahaha');    //img title
                            //$element->src =  $parserImages[0]->src;        //img src
                            //$element->alt =  $parserImages[0]->alt;        //img alt
                            var_dump($parserImages[0]->title);exit;
                        }
                    }
                }
            }
	    }
    }
    
    protected function _getDom($content)
	{
	    $dom = new Dom;
        $dom->loadStr($content, []);
        return $dom;
	}
	
	protected function _getImg($content)
	{
	    $dom = new Dom;
        $dom->loadStr($content, []);
        $parser = $dom->find('img');
        return $parser;
	}
//<a href="http://turtlemt.pixnet.net/album/photo/108225497">
//<img title="PA290412.jpg" src="http://pic.pimg.tw/turtlemt/4affac0b268e6.jpg" border="0" alt="PA290412.jpg" /></a>
}