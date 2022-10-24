<?php

use MediaWiki\Extension\CzkExchangeRates\RestApi;

class RestApiTest extends BaseExchangeRatesRetrieverTest
{
	public function testRestApi()
	{
		$rates = [
			'USD/CZK' => 24,
			'EUR/CZK' => 24,
			'GBP/CZK' => 24
		];
		$date = '2022-10-23T17:09:34Z';

		$exchangeRatesRetriever = $this->constructMockExchangeRatesRetriever($date);

		$restApi = new RestApi($exchangeRatesRetriever);

		$this->assertEquals([
			'success' => true,
			'data' => [
				'rates' => $rates,
				'updated_at' => $date
			]
		], $restApi->run());
	}
}
