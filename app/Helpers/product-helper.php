<?php

function getCurrency(){
    return '$ ';
}

function imageURL($url){

    if(!empty($url)){
        $url = URL::asset('storage/'.$url);
        if(get_headers($url)[0] == 'HTTP/1.1 404 Not Found')
        {
            Log::info(get_headers($url)[0]);
            return URL::asset('images/placeholder.png');
        }
        else
        {
            return $url;
        }
    }else{
        return URL::asset('images/placeholder.png');
    }

}
