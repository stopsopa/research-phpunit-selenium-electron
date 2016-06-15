<?php

namespace Stopsopa;
use PHPUnit_Framework_TestCase;
use Stopsopa\Filesystem\Example;
use org\bovigo\vfs\vfsStreamWrapper;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStream;

/**
 * https://phpunit.de/manual/current/en/test-doubles.html#test-doubles.mocking-traits-and-abstract-classes
 */
class Test010MockingAbstractClassesAndTraitsTest extends PHPUnit_Framework_TestCase {
    // zamiast tego vvv

//    protected function setUp()
//    {
//        if (file_exists(dirname(__FILE__) . '/id')) {
//            rmdir(dirname(__FILE__) . '/id');
//        }
//    }
//
//    public function testDirectoryIsCreated()
//    {
//        $example = new Example('id');
//        $this->assertFalse(file_exists(dirname(__FILE__) . '/id'));
//
//        $example->setDirectory(dirname(__FILE__));
//        $this->assertTrue(file_exists(dirname(__FILE__) . '/id'));
//    }
//
//    protected function tearDown()
//    {
//        if (file_exists(dirname(__FILE__) . '/id')) {
//            rmdir(dirname(__FILE__) . '/id');
//        }
//    }

    // zamiast tego ^^^

    // robimy tak
    public function setUp()
    {
        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory('exampleDir'));
    }

    public function testDirectoryIsCreated()
    {
        $example = new Example('id');
        $this->assertFalse(vfsStreamWrapper::getRoot()->hasChild('id'));

        $example->setDirectory(vfsStream::url('exampleDir'));
        $this->assertTrue(vfsStreamWrapper::getRoot()->hasChild('id'));
    }
}