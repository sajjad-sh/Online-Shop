<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * The alert id.
     *
     * @var string
     */
    public $id;

    /**
     * The alert title.
     *
     * @var string
     */
    public $title;

    /**
     * The alert toggle.
     *
     * @var string
     */
    public $toggle;

    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title, $message)
    {
        $this->id = $id;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
