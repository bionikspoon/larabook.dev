<?php

/**
 * Class HomeController
 */
class HomeController extends BaseController
{

    /**
     * @return Response
     */
    public function showWelcome()
    {
        return View::make('hello');
    }
}
