<?php

namespace dompdfmodule\Tests\Factory;

use dompdfmodule\Factory\DompdfFactory;

class DompdfFactoryTest extends \PHPUnit\Framework\TestCase
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

    public function testInitWentThrough()
    {
        self::assertInstanceOf(DompdfFactory::class, $this->factory);
    }
}
