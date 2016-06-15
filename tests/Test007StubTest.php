<?php

namespace Stopsopa;
use PHPUnit\Framework\TestCase;
use Stopsopa\SomeClass;
use Exception;

/**
 * https://phpunit.de/manual/current/en/test-doubles.html
 * @backupStaticAttributes true
 */
class Test007StubTest extends TestCase {
    public function testStub()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createMock(SomeClass::class);

        $this->assertTrue($stub instanceof SomeClass);

        // Configure the stub.
        $stub->method('doSomething')
            ->willReturn('foo');

        // Calling $stub->doSomething() will now return
        // 'foo'.
        $this->assertEquals('foo', $stub->doSomething());
    }
    public function testReturnArgumentStub()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createMock(SomeClass::class);

        $this->assertTrue($stub instanceof SomeClass);

        // Configure the stub.
        $stub->method('doSomething')
            ->will($this->returnArgument(0));

        // $stub->doSomething('foo') returns 'foo'
        $this->assertEquals('foo', $stub->doSomething('foo'));

        // $stub->doSomething('bar') returns 'bar'
        $this->assertEquals('bar', $stub->doSomething('bar'));
    }
    public function testReturnSelf()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createMock(SomeClass::class);

        $this->assertTrue($stub instanceof SomeClass);

        // Configure the stub.
        $stub->method('doSomething')
            ->will($this->returnSelf());

        // $stub->doSomething() returns $stub
        $this->assertSame($stub, $stub->doSomething());
    }
    public function testReturnValueMapStub()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createMock(SomeClass::class);

        $this->assertTrue($stub instanceof SomeClass);

        // Create a map of arguments to return values.
        $map = array(
            ['a', 'b', 'c', 'd'],
            ['e', 'f', 'g', 'h']
        );

        // Configure the stub.
        $stub->method('doSomething')
            ->will($this->returnValueMap($map));

        // $stub->doSomething() returns different values depending on
        // the provided arguments.
        $this->assertEquals('d', $stub->doSomething('a', 'b', 'c'));
        $this->assertEquals('h', $stub->doSomething('e', 'f', 'g'));
    }
    public function testReturnCallbackStub()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createMock(SomeClass::class);

        $this->assertTrue($stub instanceof SomeClass);

        // Configure the stub.
        $stub
            ->method('doSomething')
            ->will($this->returnCallback('str_rot13'))
        ;

        // Configure the stub.
        $stub
            ->method('doSomething2')
            ->will($this->returnCallback(function ($a) {
                return $a + 1;
            }));
        ;

        // $stub->doSomething($argument) returns str_rot13($argument)
        $this->assertEquals('fbzrguvat', $stub->doSomething('something'));
        $this->assertEquals(6, $stub->doSomething2(5));
    }
    public function testOnConsecutiveCallsStub()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createMock(SomeClass::class);

        $this->assertTrue($stub instanceof SomeClass);

        // Configure the stub.
        $stub->method('doSomething')
            ->will($this->onConsecutiveCalls(2, 3, 5, 7));

        // $stub->doSomething() returns a different value each time
        $this->assertEquals(2, $stub->doSomething());
        $this->assertEquals(3, $stub->doSomething());
        $this->assertEquals(5, $stub->doSomething());
    }
    public function testThrowExceptionStub()
    {

        // Method available since phpunit 5.2.0
        if (method_exists($this, 'expectException')) {
            $this->expectException(get_class(new Exception()));
        }
        else {
            $this->setExpectedException(
                get_class(new Exception())
            );
        }

        // Create a stub for the SomeClass class.
        $stub = $this->createMock(SomeClass::class);

        $this->assertTrue($stub instanceof SomeClass);

        // Configure the stub.
        $stub->method('doSomething')
            ->will($this->throwException(new Exception));

        // $stub->doSomething() throws Exception
        $stub->doSomething();
    }
}