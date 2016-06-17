<?php

namespace Stopsopa\Phpunit;
use PHPUnit_Framework_TestCase;
use Stopsopa\Phpunit\Mock\AbstractTrait;
use Stopsopa\Phpunit\Mock\AbstractClass;

/**
 * https://phpunit.de/manual/current/en/test-doubles.html#test-doubles.mocking-traits-and-abstract-classes
 */
class Test011MockingTheFilesystemTest extends PHPUnit_Framework_TestCase {
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