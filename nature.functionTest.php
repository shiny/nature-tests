<?php
    namespace Nature;
    
    /**
     * @runTestsInSeparateProcesses
     */
    class functionTest extends \PHPUnit_Framework_TestCase
    {
        function testSingleton()
        {
            $db = singleton('Nature\Template');
            $this->assertInstanceOf('Nature\Template', $db);
        }
        function testHttpResponseCode()
        {
            http_response_code(333);
            $code = http_response_code();
            $this->assertEquals(333, $code);
        }
    }