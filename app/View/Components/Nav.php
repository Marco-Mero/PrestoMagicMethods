<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Nav extends Component
{
    public $pageNav;
    public $navType;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pageNav=0, $navType=1)
    {
        $this->pageNav = $pageNav;
        $this->navType = $navType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        switch ($this->navType) {
            case 0:
                return "";
                break;
            case "welcome":
                return view('components.nav.welcome-nav');
                break;
            default:
                return view('components.nav.welcome-nav');;
                break;
        }
    }
}
