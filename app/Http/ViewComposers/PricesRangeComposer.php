<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Prices;

class PricesRangeComposer
{
    
    /**
     * Bind data to the view.
     *
     * @param    View  $view
     * @return  void
     */
    public function compose(View $view)
    {
        $view->with('range', Prices::all());
    }
}
