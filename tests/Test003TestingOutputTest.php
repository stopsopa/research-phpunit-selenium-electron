<?php

namespace Stopsopa;
use PHPUnit\Framework\TestCase;

/**
 * https://phpunit.de/manual/current/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.output
 */
class Test003TestingOutputTest extends TestCase {

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