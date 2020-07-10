<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class InformationsComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {

        $user = User::find(auth()->id());
        $count_my_events = $user->my_events->count();
        return view('components.informations-component' , compact('count_my_events'));
    }
}
