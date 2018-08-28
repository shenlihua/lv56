<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;

class ProfileComposer
{

    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('count', 123);
    }
}