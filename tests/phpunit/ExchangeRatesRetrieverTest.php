<?php

use MediaWiki\Extension\CzkExchangeRates\Data\ExchangeData;

class ExchangeRatesRetrieverTest extends BaseExchangeRatesRetrieverTest
{
	public function testService()
	{
		$rates = [
			'USD' => 24,
			'EUR' => 24,
			'GBP' => 24
		];
		$date = '2022-10-23T17:09:34Z';

		$exchangeRatesRetriever = $this->constructMockExchangeRatesRetriever($date);

		$this->assertEquals($exchangeRatesRetriever->getExchangeData(), new ExchangeData($rates, $date));
	}
}
