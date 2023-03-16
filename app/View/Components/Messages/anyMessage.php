<?php

namespace App\View\Components\Messages;

use Illuminate\View\Component;

class anyMessage extends Component
{
    public $errors;
    public $messages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($errors="", $messages="")
    {
        $this->errors=$errors;
        $this->messages=$messages;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.messages.any-message');
    }
}
