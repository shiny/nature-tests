<?php
    class testApp {
        function run(){
            echo 'run instance';
        }
    }
    class subclass extends Nature\App {
        function run(){
            echo 'run subclass';
        }
    }
    /**
     * @runTestsInSeparateProcesses
     */
    class runTest extends \PHPUnit_Framework_TestCase
    {
        function testRun()
        {
            $app = new testApp();
            require('base/run.php');
            $this->expectOutputString('run instance');
        }
        function testSubclass()
        {
            $app = new subclass();
            require('base/run.php');
            $this->expectOutputString('run subclass');
        }
    }