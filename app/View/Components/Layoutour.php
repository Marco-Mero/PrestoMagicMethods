<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layoutour extends Component
{
    public string $title;
    public $layoutType;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title="Presto.it", $layoutType = 1)
    {
        $this->title = $title;
        $this->layoutType = $layoutType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        switch ($this->layoutType) {
            case 0:
                return "";
                break;
            case 1:
                return view('components.layout.main-layout');
                break;
            case "welcome":
                return view('components.layout.welcome-layout');
                break;
            default:
                return view('components.layout.main-layout');;
                break;
        }
    }
}
