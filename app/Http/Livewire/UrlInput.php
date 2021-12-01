<?php

namespace App\Http\Livewire;

use App\Http\Classes\LinkRepository;
use Livewire\Component;

class UrlInput extends Component
{
    public string $url;

    public function mount($url='')
    {
        $this->url = $url;
    }

    public function render()
    {
        return view('livewire.url-input');
    }

    /**
     *
     */
    public function shortenURL()
    {
        $this->emit('buttonPressed', $this->url);
    }
}
