<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Contracts\Pagination\Paginator;

class Pagination extends Component
{
    public $items;
    /**
     * Create a new component instance.
     */
    public function __construct(Paginator $items)
    {
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pagination', [
            'items' => $this->items,
        ]);
    }
}
