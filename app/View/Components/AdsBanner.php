<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdsBanner extends Component
{
     public $adsBanner;
    /**
     * Create a new component instance.
     */
    public function __construct($adsBanner)
    {
         $this->adsBanner = $adsBanner;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ads-banner');
    }
}