<?php

use MediaWiki\Extension\CzkExchangeRates\Exceptions\CouldNotGetRatesFromApiException;
use MediaWiki\Extension\CzkExchangeRates\Interfaces\ExchangeRatesRetrieverInterface;
use MediaWiki\Extension\CzkExchangeRates\RestApi;
use PHPUnit\Framework\TestCase;

class CouldNotGetRatesFromApiExceptionTest extends TestCase
{
	public function testException()
	{
		$exception = new CouldNotGetRatesFromApiException();
		$exchangeRatesRetrieverMock = $this->getMockBuilder(ExchangeRatesRetrieverInterface::class)->getMock();
		$exchangeRatesRetrieverMock->method('getExchangeData')->willThrowException($exception);

		$restApi = new RestApi($exchangeRatesRetrieverMock);

		$this->assertArrayHasKey('error', $restApi->run());
	}
}
