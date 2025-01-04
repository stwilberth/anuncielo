<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class PricingSection extends Component
{
    public function render(): View
    {
        return view('components.pricing-section');
    }
}
