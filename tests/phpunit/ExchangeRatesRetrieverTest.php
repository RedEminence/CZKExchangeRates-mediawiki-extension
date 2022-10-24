<?php

use MediaWiki\Extension\CzkExchangeRates\Data\ExchangeData;

class ExchangeRatesRetrieverTest extends BaseExchangeRatesRetrieverTest
{
	public function testService()
	{
		$rates = [
			'USD/CZK' => 24,
			'EUR/CZK' => 24,
			'GBP/CZK' => 24
		];
		$date = '2022-10-23T17:09:34Z';

		$exchangeRatesRetriever = $this->constructMockExchangeRatesRetriever($date);

		$this->assertEquals($exchangeRatesRetriever->getExchangeData(), new ExchangeData($rates, $date));
	}
}
