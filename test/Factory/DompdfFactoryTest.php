<?php

namespace DompdfModuleTest\Factory;

use Dompdf\Dompdf;
use DompdfHelper\Factory\DompdfFactory;
use Laminas\ServiceManager\ServiceManager;
use PHPUnit\Framework\TestCase;

class DompdfFactoryTest extends TestCase
{
    /**
     * @var DompdfFactory
     */
    private $factory;

    /**
     * {@inheritDoc}
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    protected function setUp(): void
    {
        $this->factory = new DompdfFactory();
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
     * @covers DompdfHelper\Factory\DompdfFactory::createFromConfig
     * @covers DompdfHelper\Factory\DompdfFactory::createDefaultSettings
     */
    public function testInitWentThrough(): void
    {
        $factory = $this->factory;

        $serviceManager = new ServiceManager();
        $serviceManager->setService('config', []);

        $domPdf = $factory($serviceManager, null);
        $this->assertInstanceOf(Dompdf::class, $domPdf);
    }
}
