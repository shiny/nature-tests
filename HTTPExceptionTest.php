<?php
    namespace Nature;
    require('../autoload.php');
    require('base/nature.function.php');
    require('base/HTTPException.php');
    class HTTPExceptionTest extends \PHPUnit_Framework_TestCase 
    {
        /**
         * @expectedException  Nature\HTTPException
         */
        public function testException() 
        {
            throw new HTTPException;
        }
        /**
         * @expectedException  Nature\HTTPException
         * @expectedExceptionCode 404
         */
        public function test404()
        {
            throw new HTTPException('HTTP Not Found', 404);
        }
        public function testHttpStatusCode404()
        {
            try {
                throw new HTTPException('HTTP Not Found', 404);
            } catch (\Exception $e) { }
            $this->assertEquals(404, http_response_code());
        }
        /**
         * @expectedException  Nature\HTTPException
         * @expectedExceptionCode 500
         */
        public function test500()
        {
            $this->expectOutputRegex('/\<html/');
            throw new HTTPException('Server Error', 500);
        }
    }