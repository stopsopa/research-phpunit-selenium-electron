<?php

namespace Stopsopa;
use PHPUnit\Framework\TestCase;
use Stopsopa\Mock\AbstractTrait;
use Stopsopa\Mock\AbstractClass;

/**
 * https://phpunit.de/manual/current/en/test-doubles.html#test-doubles.mocking-traits-and-abstract-classes
 */
class Test011MockingTheFilesystemTest extends TestCase {
    public function testConcreteMethodFromAbstractTrait()
    {
        $mock = $this->getMockForTrait(AbstractTrait::class);

        $mock->expects($this->any())
            ->method('abstractMethod')
            ->will($this->returnValue(true));

        $this->assertTrue($mock->concreteMethod());
    }
    public function testConcreteMethodFromAbstractClass()
    {
        $stub = $this->getMockForAbstractClass(AbstractClass::class);

        $stub->expects($this->any())
            ->method('abstractMethod')
            ->will($this->returnValue(true));

        $this->assertTrue($stub->concreteMethod());
    }
}