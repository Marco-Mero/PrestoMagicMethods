<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Footer extends Component
{
    public $footerMsg;
    public $footerType;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($footerMsg = '© 2022 Company,', $footerType = "1")
    {
        $this->$footerMsg = $footerMsg;
        $this->footerType = $footerType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    { {
            switch ($this->footerType) {
                case 0:
                    return "";
                    break;
                case 1:
                    return view('components.footer.mfooter');
                    break;
                case "prova":
                    return view('components.footer.prova-footer');
                    break;
                default:
                    return view('components.footer.mfooter');
                    break;
            }
        }
    }
}
