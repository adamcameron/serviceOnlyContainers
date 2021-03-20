<?php

namespace adamCameron\serviceOnlyContainers\test\unit;

use adamCameron\serviceOnlyContainers\MyClass;
use PHPUnit\Framework\TestCase;

/**
 * @testdox Tests that code coverage analysis is operational
 * @coversDefaultClass \adamCameron\serviceOnlyContainers\MyClass
 */
class MyClassTest extends TestCase
{
    private $myClass;

    protected function setUp(): void
    {
        $this->myClass = new MyClass();
    }

    /**
     * @testdox It reports code coverage of a simple method correctly
     * @covers ::needsTesting
     */
    public function testNeedsTesting()
    {
        $needsTesting = $this->myClass->needsTesting();
        $this->assertTrue($needsTesting);
    }
}
