<?php

namespace App\View\Components;

use Illuminate\View\Component;

class breadcrumb extends Component
{
    public $one;
    public $two;
    public $three;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($one, $two, $three)
    {
        $this->one = $one;
        $this->two = $two;
        $this->three = $three;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb');
    }
}
