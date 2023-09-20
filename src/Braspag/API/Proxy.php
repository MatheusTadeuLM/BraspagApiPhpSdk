<?php

namespace Braspag\API;

class Proxy
{
    private $host;
    private $username;
    private $password;
    private $port;

    public function __construct($proxy)
    {
        $this->host = $proxy['host'];
        $this->username = $proxy['username'];
        $this->password = $proxy['password'];
        $this->port = $proxy['port'];
    }

    public function proxyAuth($curl)
    {
        curl_setopt_array($curl, array(
            CURLOPT_PROXY           => $this->host,
            CURLOPT_PROXYPORT       => $this->port,
            CURLOPT_PROXYUSERPWD    => $this->username . ':' . $this->password
        ));
    }
}
