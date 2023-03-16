<?php

namespace App\View\Components;

use App\Models\Announcement;
use Illuminate\View\Component;

class AnnouncementCard extends Component
{
    public $cardType;
    public Announcement $announcement;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($announcement, $cardType=1)
    {
        $this->announcement= $announcement;
        $this->cardType= $cardType;
    }



    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        switch ($this->cardType) {
            case 0:
                return "";
                break;
            case 1:
                return view('components.announcement.horizard');;
                break;
            case "mini":
                return view('components.announcement.mini-card');
                break;
            case "details":
                return view('components.announcement.details');
            default:
                return view('components.announcement.horizard');
                break;
                
        }
    }
}
