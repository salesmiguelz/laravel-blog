<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $method;
    public $post;
    public function __construct($method, $post)
    {
        $this->method = $method;
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-form');
    }
}
