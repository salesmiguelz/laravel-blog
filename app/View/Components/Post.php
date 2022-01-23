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
    public $body;
    public $userId;


    
    public function __construct($id, $title, $description, $body, $userId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->body = $body;
        $this->userId = $userId;
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
