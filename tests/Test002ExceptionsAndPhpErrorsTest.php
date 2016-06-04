<?php

namespace Stopsopa;
use PHPUnit_Framework_TestCase;
use stdClass;
use InvalidArgumentException;

/**
 * phpunit.de/manual/current/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.exceptions
 */
class Test002ExceptionsAndPhpErrorsTest extends PHPUnit_Framework_TestCase {

    protected function _throwInvalidArgumentException() {
        throw new InvalidArgumentException(
            $message = "description of exception",
            $code = 678
        );
    }
    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(678);
        $this->expectExceptionMessage("description of exception");
        $this->expectExceptionMessageRegExp('# of #');

        // and now we throw exception and test is ok
        $this->_throwInvalidArgumentException();
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionCode 678
     * @expectedExceptionMessage description of exception
     * @expectedExceptionMessageRegExp # of #
     */
    public function testAnnoException() {
        $this->_throwInvalidArgumentException();
    }

}