<?php

/**
 * Class PagesController
 */
class PagesController extends \BaseController
{
    /**
     * @return Response
     */
    public function home()
    {
        return View::make('pages.home');
    }

    /**
     * @return Response
     */
    public function phpinfo()
    {
        return View::make('pages.phpinfo');
    }
}
