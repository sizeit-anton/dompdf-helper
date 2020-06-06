<?php

namespace dompdfmodule\Tests;

use dompdfmodule\Module;

class ModuleTest extends \PHPUnit\Framework\TestCase
{
    public function testConfigIsReturned()
    {
        $module = new Module();

        self::assertIsArray($module->getConfig());
    }
}
