<?php

namespace Stopsopa\Phpunit;
use PHPUnit_Framework_TestCase;

/**
 * https://phpunit.de/manual/current/en/fixtures.html 
 */
class Test004FixturesSetUpTearDownTest extends PHPUnit_Framework_TestCase {

    /**
     * This method is good to establish connection to db
     */
    public static function setUpBeforeClass()
    {
        fwrite(STDOUT, "\n".__METHOD__);
//        self::$dbh = new PDO('sqlite::memory:');
    }

    protected function setUp()
    {
        fwrite(STDOUT, "\n".__METHOD__);
    }

    protected function assertPreConditions()
    {
        fwrite(STDOUT, "\n".__METHOD__);
    }

    public function testOne()
    {
        fwrite(STDOUT, "\n".__METHOD__);
        $this->assertTrue(true);
    }

    public function testTwo()
    {
        fwrite(STDOUT, "\n".__METHOD__);
        $this->assertTrue(true);
    }

    protected function assertPostConditions()
    {
        fwrite(STDOUT, "\n".__METHOD__);

    }

    protected function tearDown()
    {
        fwrite(STDOUT, "\n".__METHOD__);
    }

    /**
     * This method is ok to free db connection
     */
    public static function tearDownAfterClass()
    {
        fwrite(STDOUT, "\n".__METHOD__);
//        $this->pdo = null;
    }

    protected function onNotSuccessfulTest($e)
    {
        fwrite(STDOUT, "\n".__METHOD__);
        throw $e;
    }
}

/*

For all tests result is:
Tests\BackendBundle\Controller\CallbackControllerTest::setUpBeforeClass
Tests\BackendBundle\Controller\CallbackControllerTest::setUp
Tests\BackendBundle\Controller\CallbackControllerTest::assertPreConditions
Tests\BackendBundle\Controller\CallbackControllerTest::testOne
Tests\BackendBundle\Controller\CallbackControllerTest::assertPostConditions
Tests\BackendBundle\Controller\CallbackControllerTest::tearDown.
Tests\BackendBundle\Controller\CallbackControllerTest::setUp
Tests\BackendBundle\Controller\CallbackControllerTest::assertPreConditions
Tests\BackendBundle\Controller\CallbackControllerTest::testTwo
Tests\BackendBundle\Controller\CallbackControllerTest::assertPostConditions
Tests\BackendBundle\Controller\CallbackControllerTest::tearDown.
Tests\BackendBundle\Controller\CallbackControllerTest::tearDownAfterClass

for  --filter="testOne":
Tests\BackendBundle\Controller\CallbackControllerTest::setUpBeforeClass
Tests\BackendBundle\Controller\CallbackControllerTest::setUp
Tests\BackendBundle\Controller\CallbackControllerTest::assertPreConditions
Tests\BackendBundle\Controller\CallbackControllerTest::testOne
Tests\BackendBundle\Controller\CallbackControllerTest::assertPostConditions
Tests\BackendBundle\Controller\CallbackControllerTest::tearDown.
Tests\BackendBundle\Controller\CallbackControllerTest::tearDownAfterClass


*/
