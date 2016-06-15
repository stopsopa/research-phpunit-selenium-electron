<?php

namespace Stopsopa;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

/**
 * phpunit.de/manual/current/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.exceptions
 */
class Test002ExceptionsAndPhpErrorsTest extends TestCase {

    protected function _throwInvalidArgumentException() {
        throw new InvalidArgumentException(
            $message = "description of exception",
            $code = 678
        );
    }
    public function testException()
    {
        // Method available since phpunit 5.2.0
        if (method_exists($this, 'expectException')) {
            $this->expectException(get_class(new InvalidArgumentException()));
            $this->expectExceptionCode(678);
            $this->expectExceptionMessage("description of exception");
            $this->expectExceptionMessageRegExp('# of #');
        }
        else {
            $this->setExpectedException(
                get_class(new InvalidArgumentException()),
                $message = "description of exception",
                $code = 678
            );
            $this->setExpectedExceptionRegExp(
                get_class(new InvalidArgumentException()),
                $messageRegExp = '# of #',
                $code = 678
            );
        }

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