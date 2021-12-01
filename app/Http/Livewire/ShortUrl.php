<?php

namespace App\Http\Livewire;


use App\Http\Classes\LinkRepository;
use Livewire\Component;

class ShortUrl extends Component
{
    protected $listeners = ['buttonPressed'=>'displayUrl'];
    public function render()
    {
        return view('livewire.short-url');
    }

    public function mount($shortUrl='')
    {
        $this->shortUrl = $shortUrl;
    }

    public function displayUrl($shortUrl){
        $urlCreator = new LinkRepository($shortUrl);
        $result = $urlCreator->putUrl();
        if($result===false) {
            $this->shortUrl = '<span style="color:red">Wrong URL provided</span>';
        }
        else {
            $this->shortUrl = '<a href="' . $result . '">' .request()->server('SERVER_NAME').'/' .$result . '</a>';
        }
    }
}
