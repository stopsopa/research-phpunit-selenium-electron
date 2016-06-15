<?php

namespace Stopsopa;
use PHPUnit\Framework\TestCase;

/**
 * https://phpunit.de/manual/current/en/fixtures.html
 */
class Test004FixturesSetUpTearDownTest extends TestCase {

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