<?php

use GuzzleHttp\Client;
use MediaWiki\Extension\CzkExchangeRates\Interfaces\ExchangeRatesRetrieverInterface;
use MediaWiki\Extension\CzkExchangeRates\Services\ExchangeRatesRetriever;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

abstract class BaseExchangeRatesRetrieverTest extends TestCase
{
	protected function constructMockExchangeRatesRetriever(array $rates, string $date): ExchangeRatesRetrieverInterface
	{
		$httpClientMock = $this->getMockBuilder(Client::class)->getMock();
		$responseMock = $this->getMockBuilder(ResponseInterface::class)->getMock();
		$responseMock->method('getBody')->willReturn(json_encode([
			'response' => [
				'rates' => $rates,
				'date' => $date
			]
		]));
		$httpClientMock->method('get')->willReturn($responseMock);

		$GLOBALS['wgCzkExchangeRatesApiKey'] = '123456testAPIKey';

		return new ExchangeRatesRetriever($httpClientMock);
	}
}
