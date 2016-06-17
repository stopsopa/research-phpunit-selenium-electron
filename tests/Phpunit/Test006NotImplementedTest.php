<?php

namespace Stopsopa\Phpunit;
use PHPUnit_Framework_TestCase;

/**
 * https://phpunit.de/manual/current/en/fixtures.html#fixtures.global-state
 * @backupStaticAttributes true
 */
class Test005BackupGlobalTest extends PHPUnit_Framework_TestCase {
    protected static $var;
//    protected $one;
    public function testOne() {
        $this->assertTrue(true);
        static::$var = 'value';
//        $this->one = 'two';
    }
    public function testTwo() {
        $this->assertTrue(true);
        $this->assertEquals('value', static::$var);
//        $this->assertEquals('two', $this->one);
    }
}