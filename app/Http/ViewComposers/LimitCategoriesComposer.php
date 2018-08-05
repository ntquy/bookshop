<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;
use DB;

class LimitCategoriesComposer
{
    
    /**
     * Bind data to the view.
     *
     * @param    View  $view
     * @return  void
     */
    public function compose(View $view)
    {
        $limit_categories = DB::table('categories')
                            ->select('categories.*')
                            ->limit(4)
                            ->get();

        $view->with('limit_categories', $limit_categories);
    }
}
