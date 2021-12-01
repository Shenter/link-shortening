<?php

namespace App\Http\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LinkRepository
{
    public function __construct($url = null)
    {
        $this->url = $url;
    }


    public function getUrl($shortLink)
    {
        $link = DB::table('links')->where('short_url', $shortLink)->get();
        if(!$link->count())
        {
            abort(404);
        }
        return $link->first()->url;
    }



    public function putUrl()
    {
        if ($this->checkUrl($this->url) === false)
        {
            return false;
        }
        do{
            $shortLink = Str::random(6);
        }
        while
            (DB::table('links')->where('short_url')->exists()  );

        DB::table('links')->insert(['url'=>$this->url, 'short_url'=>$shortLink]);
        return $shortLink;
    }

    public function checkUrl()
    {
         return filter_var($this->url, FILTER_VALIDATE_URL)  ;
    }

}
