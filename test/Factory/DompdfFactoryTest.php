<?php

namespace DompdfModuleTest\Factory;

use DompdfHelper\Factory\DompdfFactory;
use PHPUnit\Framework\TestCase;

class DompdfFactoryTest extends TestCase
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

    /**
     * @covers DompdfHelper\Factory\DompdfFactory::__invoke
     */
    public function testInitWentThrough(): void
    {
        $this->assertInstanceOf(DompdfFactory::class, $this->factory);
    }
}
