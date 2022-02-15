<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    public $searchQuery;

    public function mount(){
        $this->searchQuery = '';
    }
    public function render()
    {
        $posts = Post::when($this->searchQuery != '', function ($query){
            $query->where('title', 'like', '%'.$this->searchQuery.'%');
        })->get();

        return view('livewire.posts', [
            'posts' => $posts
        ]);
    }

}
