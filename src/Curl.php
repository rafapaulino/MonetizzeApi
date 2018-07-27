<?php
namespace Monetizze;

abstract class Curl
{
    protected $_ch;

    public function __construct()
    {
        $this->_ch = null;

        if ( $this->curlLoaded() && $this->isCurl() ) {
            $this->_ch = curl_init();
        } else {
            throw New \Exception('A extensão curl não foi instalada nesse sistema.');
        }
    }

    public function __destruct()
    {
        if ( !is_null($this->_ch) )
        curl_close($this->_ch);
    }

    public function exec(): array
    {
        $data = array();
        
        if ( !is_null($this->_ch) ) {
           $data = json_decode(curl_exec($this->_ch), true);
        } 

        if ( is_array($data) )
        return $data;
        else
        return array();
    }

    private function isCurl(): bool
    {
        return function_exists('curl_version');
    }

    private function curlLoaded(): bool
    {
        return extension_loaded('curl');
    }
}