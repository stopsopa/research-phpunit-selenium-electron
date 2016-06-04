<?php

namespace Stopsopa;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * https://phpunit.de/manual/current/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.test-dependencies
 */
class Test001DependsAndDataProvidersTest extends PHPUnit_Framework_TestCase {
    public function testEmpty()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    /**
     * @depends testEmpty
     */
    public function testPush(array $stack)
    {
        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertNotEmpty($stack);

        return $stack;
    }

    /**
     * @depends testPush
     */
    public function testPop(array $stack)
    {
        $this->assertEquals('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }

    public function testReference() {
        $obj = new stdClass();

        $obj->one = 'two';

        $this->assertEquals('two', $obj->one);

        return $obj;
    }

    /**
     * @depends testReference
     */
    public function testRef1(stdClass $obj) {

        $this->assertEquals('two', $obj->one);

        $obj->three = 'four';
    }
    /**
     * @depends testReference
     */
    public function testRef2(stdClass $obj) {

        $json = json_encode($obj);

        // you can see that $obj is the same instance like in testRef1

        $this->assertEquals('{"one":"two","three":"four"}', $json);

        $obj->six = 'seven';
    }
    /**
     * @depends clone testReference
     */
    public function testRef3(stdClass $obj) {

        $json = json_encode($obj);

        // as you can see 'ALL' test method that use testReference should use clone because if you use only
        // in one of them that is still working on object changed by every method without clone

        $this->assertEquals('{"one":"two","three":"four","six":"seven"}', $json);
    }


    public function testProducerFirst()
    {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer()
    {
        $this->assertEquals(
            ['first', 'second'],
            func_get_args()
        );
    }











    /**
     * https://phpunit.de/manual/current/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.data-providers
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    public function additionProvider()
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 2]
        ];
    }
    /**
     * @dataProvider additionNamedProvider
     */
    public function testNamedAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    public function additionNamedProvider()
    {
        return [
            // these names will be used to communicate in error on which set testNamedAdd has failed
            'adding zeros'  => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one'  => [1, 1, 2]
        ];
    }







    public function provider1()
    {
        return [['provider1']];
    }

    public function testProducerFirst1()
    {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond1()
    {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends testProducerFirst1
     * @depends testProducerSecond1
     * @dataProvider provider1
     */
    public function testConsumer1()
    {
        $this->assertEquals(
            ['provider1', 'first', 'second'],
            func_get_args()
        );
    }

}