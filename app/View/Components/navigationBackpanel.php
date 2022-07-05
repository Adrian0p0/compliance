<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Subjects;

class navigationBackpanel extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $lang = session()->get('applocale', 'en');
        $navData = Subjects::select('id','name-'.$lang.' as name')->get();

        return view('components.navigation-backpanel')->with('nav_data',$navData);
    }
}
