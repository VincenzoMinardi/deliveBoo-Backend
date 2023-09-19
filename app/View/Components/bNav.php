<?php

namespace App\View\Components;

use Illuminate\View\Component;

class bNav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $text;
    public $routeUrl;
    
    public function __construct($text, $routeUrl)
    {
        $this->text = $text;
        $this->routeUrl = $routeUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.b-nav');
    }
}
