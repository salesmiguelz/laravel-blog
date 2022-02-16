<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{

    public function render()
    {
        $categories = Category::all();
        return view('livewire.categories', [
            'categories' => $categories
        ]);
    }

    public function deleteCategory($category_id){
        Category::find($category_id)->delete();
    }
}
