<?php

namespace Stopsopa\Phpunit;
use PHPUnit_Framework_TestCase;

class DummyTest extends PHPUnit_Framework_TestCase {
    public function test() {
        $this->assertEquals('raz', 'raz');
    }
}