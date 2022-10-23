<?php
namespace MediaWiki\Extension\CzkExchangeRates;

use MediaWiki\Extension\CzkExchangeRates\Interfaces\ExchangeRatesRetrieverInterface;
use MediaWiki\Rest\SimpleHandler;

class RestApi extends SimpleHandler
{
	private ExchangeRatesRetrieverInterface $exchangeRatesRetriever;

	public function __construct(ExchangeRatesRetrieverInterface $exchangeRatesRetriever)
	{
		$this->exchangeRatesRetriever = $exchangeRatesRetriever;
	}
	public function run()
	{
		return $this->exchangeRatesRetriever->getExchangeData()->getCurrencyInfo();
	}
}
