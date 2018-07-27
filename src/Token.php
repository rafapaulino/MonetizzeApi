<?php
namespace Monetizze;
use Monetizze\Curl;

class Token extends Curl
{
    protected $_token;
    protected $_userId;
    protected $_expire;
    private $_data;

    public function __construct($consumerKey)
    {
        parent::__construct();
        $url = "https://api.monetizze.com.br/2.1/token";
        
        curl_setopt($this->_ch, CURLOPT_HTTPHEADER, array("X_CONSUMER_KEY: " . $consumerKey));
        curl_setopt($this->_ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($this->_ch, CURLOPT_URL, $url); 
        curl_setopt($this->_ch, CURLOPT_RETURNTRANSFER, true);

        $this->_data = $this->exec();
    }

    public function getToken()
    {
        if ( isset($this->_data['token']) )
        return $this->_data['token'];
        else
        return null;
    }

    public function getUser()
    {
        if ( isset($this->_data['user_id']) )
        return $this->_data['user_id'];
        else
        return null;
    }

    public function getExpire()
    {
        if ( isset($this->_data['expire']) )
        return $this->_data['expire'];
        else
        return null;
    }

    public function getData()
    {
        return $this->_data;
    }
}