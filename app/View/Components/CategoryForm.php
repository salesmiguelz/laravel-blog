<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryForm extends Component
{
    /**
 * Create a new component instance.
     *
     * @return void
     */

    public $method;
    public $category;
    public function __construct($method, $category)
    {
        $this->method = $method;
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-form');
    }
}
