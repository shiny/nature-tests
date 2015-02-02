<?php
    require('../autoload.php');
    
    class cURLTest extends PHPUnit_Framework_TestCase 
    {
        function setUp()
        {
            $this->ch = new Nature\cURL;
        }
        
        function testGet()
        {
            $content = $this->ch->get('http://t.cn');
            $this->assertContains('<html', $content);
        }
    }