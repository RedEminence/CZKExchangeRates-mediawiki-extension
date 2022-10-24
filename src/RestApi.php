<?php
namespace MediaWiki\Extension\CzkExchangeRates;

use MediaWiki\Extension\CzkExchangeRates\Exceptions\CouldNotGetRatesFromApiException;
use MediaWiki\Extension\CzkExchangeRates\Interfaces\ExchangeRatesRetrieverInterface;
use MediaWiki\Rest\SimpleHandler;

class RestApi extends SimpleHandler
{
	private ExchangeRatesRetrieverInterface $exchangeRatesRetriever;

	public function __construct(ExchangeRatesRetrieverInterface $exchangeRatesRetriever)
	{
		$this->exchangeRatesRetriever = $exchangeRatesRetriever;
	}

	public function run(): array
	{
		try {
			$exchangeData = $this->exchangeRatesRetriever->getExchangeData();
		} catch (CouldNotGetRatesFromApiException $exception) {
			return [
				'success' => false,
				'error' => $exception->getMessage()
			];
		}

		return [
			'success' => true,
			'data' => [
				'rates' => $exchangeData->getRates(),
				'updated_at' => $exchangeData->getUpdatedAt()
			]
		];
	}
}
