<?php

namespace App\View\Components;

use Illuminate\View\Component;

class toast extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title ;
    public $msg;
    public $type;
    public function __construct($title , $msg  ,$type){
        $this -> title = $title;
        $this -> msg = $msg;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.toast');
    }
}
