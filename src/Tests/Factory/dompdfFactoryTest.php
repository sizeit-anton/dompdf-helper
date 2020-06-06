<?php

namespace dompdfmodule\Tests\Factory;

use dompdfmodule\Factory\dompdfFactory;

class dompdfFactoryTest extends \PHPUnit\Framework\TestCase
{
    private $factory;

    /**
     * {@inheritDoc}
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp(): void
    {
        $this->factory = new dompdfFactory();
    }

    /**
     * {@inheritDoc}
     * @see \PHPUnit\Framework\TestCase::tearDown()
     */
    protected function tearDown(): void
    {
        unset($this->factory);
    }

    public function test_it_is_initializable()
    {
        self::assertInstanceOf('dompdfmodule\Factory\dompdfFactory', $this->factory);
    }
}
