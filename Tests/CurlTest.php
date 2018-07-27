<?php 
declare(strict_types = 1);
namespace Monetizze\Tests;

use Monetizze\Curl;

class CurlTest extends \PHPUnit_Framework_TestCase 
{
    protected $_curl;

    public function setUp()
    {
        $this->_curl = new class extends Curl {           
        };
    }
        
    public function testCurlIsNotNull()
    {
        $this->assertNotEquals($this->_curl, NULL);
    }

    public function testExecAlwaysReturnArray()
    {
        $result = $this->_curl->exec();
        $this->assertTrue(is_array($result));
    }
}