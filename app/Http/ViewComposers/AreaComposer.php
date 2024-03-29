<?php

namespace App\Http\ViewComposers;

use App\Area;
use Illuminate\View\View;

class AreaComposer 
{
    private $area;
    public function compose(View $view)
    {
        // us in config
        if (! $this->area) {
            $this->area = Area::where('slug', session()->get('area', config()->get('classifieds.defaults.area')))->first();
        }

        return $view->with('area', $this->area);
    }
}
