<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public $headerType;

    public $h1;
    public $h2;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $h1 ="presto.it", string $h2 ="", $headerType="1")
    {
        $this->h1 = $h1;
        $this->h2 = $h2;
        $this->headerType = $headerType;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        switch ($this->headerType) {
            case 0:
                return "";
                break;
            case 1:
                return view('components.header.main-header');;
                break;
            case "welcome":
                return view('components.header.welcome-header');
                break;
            default:
                return view('components.header.main-header');;
                break;
        }
       
    }
}
