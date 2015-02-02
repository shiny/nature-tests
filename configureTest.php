<?php
    
    class configureTest extends PHPUnit_Framework_TestCase
    {
        protected $cfg = array();
        function setUp()
        {
            $cfg = require('base/configure.php');
           Nature\App::parse_config($cfg, $this->cfg);
        }
        function testFileExists()
        {
            require('base/configure.php');
        }
        function testTemplateRoot()
        {
            $this->assertTrue(isset($this->cfg['Nature']['Template']['root']));
            $this->assertNotEmpty($this->cfg['Nature']['Template']['root']);
        }
        function testEnvironment()
        {
            $this->assertNotEmpty($this->cfg['environment']);
        }
    }