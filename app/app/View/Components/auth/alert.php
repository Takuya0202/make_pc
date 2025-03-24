<?php

namespace App\View\Components\auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class alert extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct(
        public ViewErrorBag $errors,
    ){}
    public function overThreeErrors():bool
    {
        return count($this->errors)>3;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.alert');
    }
}
