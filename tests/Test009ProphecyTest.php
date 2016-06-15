<?php

namespace Stopsopa;
use PHPUnit\Framework\TestCase;
use Stopsopa\Mock\Observer;
use Stopsopa\Mock\Subject;

/**
 * https://phpunit.de/manual/current/en/test-doubles.html#test-doubles.prophecy
 */
class Test009ProphecyTest extends TestCase {
    public function testObserversAreUpdated()
    {
        $subject = new Subject('My subject');

        // Create a prophecy for the Observer class.
        $observer = $this->prophesize(Observer::class);

        // Set up the expectation for the update() method
        // to be called only once and with the string 'something'
        // as its parameter.
        $observer->update('something')->shouldBeCalled();

        // Reveal the prophecy and attach the mock object
        // to the Subject.
        $subject->attach($observer->reveal());

        // Call the doSomething() method on the $subject object
        // which we expect to call the mocked Observer object's
        // update() method with the string 'something'.
        $subject->doSomething();
    }
}