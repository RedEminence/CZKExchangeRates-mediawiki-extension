<?php

use MediaWiki\Extension\CzkExchangeRates\Data\ExchangeData;

class ExchangeRatesRetrieverTest extends BaseExchangeRatesRetrieverTest
{
	public function testService()
	{
		$rates = [
			'USD' => 0.04033418,
			'EUR' => 0.04085852,
			'GBP' => 0.03578366
		];
		$date = '2022-10-23T17:09:34Z';

		$exchangeRatesRetriever = $this->constructMockExchangeRatesRetriever($rates, $date);

		$this->assertEquals($exchangeRatesRetriever->getExchangeData(), new ExchangeData($rates, $date));
	}
}
