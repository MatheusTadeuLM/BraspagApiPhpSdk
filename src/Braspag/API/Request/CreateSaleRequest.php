<?php
namespace Braspag\API\Request;

use Braspag\API\Request\AbstractSaleRequest;
use Braspag\API\Environment;
use Braspag\API\Merchant;
use Braspag\API\Proxy;
use Braspag\API\Sale;

class CreateSaleRequest extends AbstractSaleRequest
{

    private $environment;

    public function __construct(Merchant $merchant, Environment $environment, Proxy $proxy = null)
    {
        parent::__construct($merchant, $proxy);

        $this->environment = $environment;
    }

    public function execute($sale)
    {
        $url = $this->environment->getApiUrl() . 'v2/sales/';

        return $this->sendRequest('POST', $url, $sale);
    }

    protected function unserialize($json)
    {
        return Sale::fromJson($json);
    }
}
