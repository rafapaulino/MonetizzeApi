<?php 
declare(strict_types = 1);
namespace Monetizze\Tests;

use Monetizze\Token;

class TokenTest extends \PHPUnit_Framework_TestCase 
{
    protected $_obj;

    public function setUp()
    {
        $this->_obj = new Token('123456');
    }
        
    public function testTokenIsNull()
    {
        $token = $this->_obj->getToken();
        $this->assertEquals($token, NULL);
    }

    public function testDataIsArray()
    {
        $data = $this->_obj->getData();
        $this->assertTrue(is_array($data));
    }
}