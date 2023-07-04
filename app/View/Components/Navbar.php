<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Navbar extends Component
{

    public array $navigationItems = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->navigationItems = [

            ['label' => 'Home', 'href' => '/'],
            ['label' => 'Shop', 'href' => '/shop'],
            ['label' => 'About us', 'href' => '/about-us'],
            ['label' => 'Contact us', 'href' => '/contact-us'],

        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
