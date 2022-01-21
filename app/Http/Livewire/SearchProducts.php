<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProducts extends Component
{
    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function render()
    {
        $query = array();
        if(!empty($this->search)) {
            $query = Product::where('fa_title', 'like', '%' . $this->search . '%')->get();
        }
        return view('livewire.search-products', [
            'products' => $query,
        ]);
    }
}
