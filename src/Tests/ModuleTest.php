<?php

namespace dompdfmodule\Tests;

use dompdfmodule\Module;

class ModuleTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_returns_config()
    {
        $module = new Module();

        self::assertInternalType('array', $module->getConfig());
    }
}
