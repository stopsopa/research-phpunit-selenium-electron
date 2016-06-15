<?php

namespace Stopsopa;
use PHPUnit\Framework\TestCase;

/**
 * https://phpunit.de/manual/current/en/fixtures.html#fixtures.global-state
 * @backupStaticAttributes true
 */
class Test005BackupGlobalTest extends TestCase {
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