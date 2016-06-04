<?php

namespace Stopsopa;
use PHPUnit_Framework_TestCase;
use InvalidArgumentException;
use Exception;

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
        // Method available since Release 5.2.0
        if (method_exists($this, 'expectException')) {
            $this->expectException(get_class(new InvalidArgumentException()));
        }
        else {
            $this->setExpectedException(get_class(new InvalidArgumentException()));
        }
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