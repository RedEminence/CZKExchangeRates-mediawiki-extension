<?php

use MediaWiki\Extension\CzkExchangeRates\RestApi;

class RestApiTest extends BaseExchangeRatesRetrieverTest
{
	public function testRestApi()
	{
		$rates = [
			'USD' => 0.04033418,
			'EUR' => 0.04085852,
			'GBP' => 0.03578366
		];
		$date = '2022-10-23T17:09:34Z';

		$exchangeRatesRetriever = $this->constructMockExchangeRatesRetriever($rates, $date);

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
