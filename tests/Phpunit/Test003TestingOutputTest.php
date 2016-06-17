<?php

namespace Stopsopa\Phpunit;
use PHPUnit_Framework_TestCase;

/**
 * https://phpunit.de/manual/current/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.output
 */
class Test003TestingOutputTest extends PHPUnit_Framework_TestCase {

    public function testExpectFooActualFoo()
    {
        $this->expectOutputString('foo');
        print 'foo';
    }

    /**
     * @
     */
    public function testExpectAnno()
    {
        $this->expectOutputString('foo');
        print 'foo';
    }
}