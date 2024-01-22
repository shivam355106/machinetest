<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Files extends Component
{
    public $js;
    public $css;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($js = [], $css = [])
    {
        $this->js = $js;
        $this->css = $css;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.files');
    }
}
