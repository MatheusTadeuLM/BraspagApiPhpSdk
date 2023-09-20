<?php
namespace Braspag\API\Request;

use Braspag\API\Request\AbstractSaleRequest;
use Braspag\API\Environment;
use Braspag\API\Merchant;
use Braspag\API\Proxy;
use Braspag\API\Sale;

class QuerySaleRequest extends AbstractSaleRequest
{

    private $environment;

    public function __construct(Merchant $merchant, Environment $environment, Proxy $proxy)
    {
        parent::__construct($merchant, $proxy);

        $this->environment = $environment;
    }

    public function execute($paymentId)
    {
        $url = $this->environment->getApiQueryURL() . 'v2/sales/' . $paymentId;

        return $this->sendRequest('GET', $url);
    }

    protected function unserialize($json)
    {
        return Sale::fromJson($json);
    }
}
