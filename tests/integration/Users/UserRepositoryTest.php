<?php

use Larabook\Users\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;

/**
 * Class StatusRepositoryTest
 */
class UserRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;
    /**
     * @var Larabook\Users\UserRepository $repo
     */
    protected $repo;
    // tests

    /** @test */
    public function it_paginates_all_users()
    {
        TestDummy::times(4)->create('Larabook\Users\User');

        $results = $this->repo->getPaginated(2);

        $this->assertCount(2, $results);
    }

    /**
     * Before each test, do this...*
     */
    protected function _before()
    {
        $this->repo = new UserRepository;
    }
}
