<?php

use MediaWiki\Extension\CzkExchangeRates\RestApi;

class RestApiTest extends BaseExchangeRatesRetrieverTest
{
	public function testRestApi()
	{
		$rates = [
			'USD' => 24,
			'EUR' => 24,
			'GBP' => 24
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
