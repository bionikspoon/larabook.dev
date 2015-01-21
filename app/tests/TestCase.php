<?php

/**
 * Class TestCase
 */
class TestCase extends Illuminate\Foundation\Testing\TestCase
{

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        /** @noinspection PhpUnusedLocalVariableInspection */
        $unitTesting = true;

        /** @noinspection PhpUnusedLocalVariableInspection */
        $testEnvironment = 'testing';

        return require __DIR__ . '/../../bootstrap/start.php';
    }
}
