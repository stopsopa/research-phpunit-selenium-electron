<?php

namespace Stopsopa;
use PHPUnit_Framework_TestCase;

/**
 * https://phpunit.de/manual/current/en/fixtures.html#fixtures.global-state
 * @backupStaticAttributes true
 */
class Test006NotImplementedTest extends PHPUnit_Framework_TestCase {
    /**
     * @group exclude
     */
    public function testMark() {

        $this->isTrue();
        $this->assertTrue(true, 'should work');

//        $this->fail('message why');
//        $this->markTestSkipped('message why');

        $this->markTestIncomplete('message why');
    }
}