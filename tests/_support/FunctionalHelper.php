<?php
namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

/**
 * Class FunctionalHelper
 *
 * @package Codeception\Module
 */
class FunctionalHelper extends \Codeception\Module
{

    /**
     * @throws \Codeception\Exception\Module
     */
    public function signIn()
    {
        $email = 'foo@example.com';
        $username = 'Foobar';
        $password = 'foo';
        $this->haveAnAccount(compact('username', 'email', 'password'));

        $I = $this->getModule('Laravel4');

        $I->amOnPage('/login');
        $I->fillField('email', $email);
        $I->fillField('password', $password);
        $I->click('Sign In');
    }

    /**
     * @param array $overrides
     *
     * @return mixed
     */
    public function haveAnAccount($overrides = [])
    {
        return $this->have('Larabook\Users\User', $overrides);
    }

    /**
     * @param       $model
     * @param array $overrides
     *
     * @return mixed
     */
    public function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);
    }

    /**
     * @param $body
     *
     * @throws \Codeception\Exception\Module
     */
    public function postAStatus($body)
    {
        $I = $this->getModule('Laravel4');

        $I->fillField('body', $body);
        $I->click('Post Status');
        //return $this->have('Larabook\Statuses\Status', $overrides);
    }
}
