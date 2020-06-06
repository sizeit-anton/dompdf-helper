<?php

namespace DompdfModuleTest;

use DompdfHelper\Module;
use PHPUnit\Framework\TestCase;

class ModuleTest extends TestCase
{
    /**
     * @covers DompdfHelper\Module::getConfig
     */
    public function testConfigIsReturned()
    {
        $module = new Module();

        $this->assertIsArray($module->getConfig());
    }
}
