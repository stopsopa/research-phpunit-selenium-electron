<?php

namespace Stopsopa;
use PHPUnit\Framework\TestCase;

/**
 * https://phpunit.de/manual/current/en/fixtures.html#fixtures.global-state
 * @backupStaticAttributes true
 */
class Test006NotImplementedTest extends TestCase {
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