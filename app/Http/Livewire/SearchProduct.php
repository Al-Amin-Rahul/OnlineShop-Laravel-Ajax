<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;

class SearchProduct extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults  =   [];

        if(strlen($this->search) >= 2)
        {
            $searchResults  =   Product::select("name", "slug", "image")->where("name", "Like", "%".$this->search."%")->get();
        }
        return view('livewire.search-product', [
            'searchResults' => collect($searchResults)->take(7)
        ]);
    }
}
