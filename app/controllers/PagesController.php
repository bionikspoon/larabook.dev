<?php

/**
 * Class PagesController
 */
class PagesController extends \BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return View::make('pages.home');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function phpinfo()
    {
        return View::make('pages.phpinfo');
    }
}
