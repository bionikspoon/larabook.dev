<?php

/**
 * Class ExampleTest
 */
class ExampleTest extends TestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        /** @noinspection PhpUnusedLocalVariableInspection */
        $crawler = $this->client->request('GET', '/');

        $this->assertTrue($this->client->getResponse()->isOk());
    }
}
