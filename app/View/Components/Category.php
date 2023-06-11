<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Category extends Component
{
    /**
     * Create a new component instance.
     */

     public array $categories = [];

    public function __construct()
    {
        $this->categories = [

            ['label' => 'Sofa', 'href' => '#', 'image' => ''],
            ['label' => 'Shop', 'href' => '#', 'image' => ''],
            ['label' => 'About us', 'href' => '#', 'image' => ''],
            ['label' => 'Contact us', 'href' => '#', 'image' => ''],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category');
    }
}
