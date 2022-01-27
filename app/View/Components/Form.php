<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
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
        return view('components.form');
    }
}
