<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    public $user_id;
    public $searchQuery;

    public function mount(){
        $this->searchQuery = '';
    }
    public function render()
    {
        if($this->user_id != NULL){
            $posts = Post::when($this->searchQuery != '', function ($query){
                $query->where('title', 'like', '%'.$this->searchQuery.'%');
            })->where('user_id', $this->user_id)->get();
          
        } else{
            $posts = Post::when($this->searchQuery != '', function ($query){
                $query->where('title', 'like', '%'.$this->searchQuery.'%');
            })->get();
        }

        return view('livewire.posts', [
            'posts' => $posts
        ]);
    }

}
