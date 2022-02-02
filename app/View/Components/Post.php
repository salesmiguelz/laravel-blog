<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Post extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $title;
    public $description;
    public $userId;
    public $img;
    public $author;
    public $canUpdate;


    
    public function __construct($id, $title, $description, $userId, $img, $author, $canUpdate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->userId = $userId;
        $this->img = $img;
        $this->author = $author;
        $this->canUpdate = $canUpdate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post');
    }
}
