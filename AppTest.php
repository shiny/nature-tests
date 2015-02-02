<?php
    namespace Nature;
    require('../autoload.php');
    
    class testController extends Controller {
        function head()
        {
            return 'call success';
        }
    }
    
    /**
     * @runTestsInSeparateProcesses
     */
    class AppTest extends \PHPUnit_Framework_TestCase
    {
        protected function setUp()
        {
            $this->app = new App;
        }
        public function testParseConfig()
        {
            $cfg = array();
            $unparsed = array('x.y.z'=>'test');
            App::parse_config($unparsed, $cfg);
            $this->assertEquals(array(
                'x'=>array(
                    'y'=>array(
                        'z'=>'test'
                    )
                )
            ), $cfg);
        }
        public function testLoadConfig()
        {
            $cfg = $this->app->load_config();
            $this->assertNotEmpty($cfg);
        }
        public function testRest()
        {
            $_SERVER['REQUEST_METHOD'] = 'HEAD';
            $controller = new testController;
            $this->app->rest($controller);
            $this->expectOutputString('call success');
        }
        public function testExceptionHandler()
        {
            try {
                throw new \Exception();
            } catch (\Exception $e) {}
            #$this->expectOutputRegex('/\<html/');
        }
    }