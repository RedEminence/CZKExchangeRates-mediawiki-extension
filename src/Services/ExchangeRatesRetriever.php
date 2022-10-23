<?php
namespace MediaWiki\Extension\CzkExchangeRates\Services;

use GuzzleHttp\Client;
use MediaWiki\Extension\CzkExchangeRates\Data\ExchangeData;
use MediaWiki\Extension\CzkExchangeRates\Interfaces\ExchangeRatesRetrieverInterface;
use Throwable;

class ExchangeRatesRetriever implements ExchangeRatesRetrieverInterface
{
	private string $apiKey;

	private string $apiEndpoint = 'https://api.currencyscoop.com/v1/latest';

	private string $czechCrownCode = 'CZK';

	private array $otherCurrencyCodes = ['USD', 'EUR', 'GBP'];

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		try {
			$this->apiKey = $GLOBALS['wgCzkExchangeRatesApiKey'];
		} catch (Throwable $exception)
		{
			throw new \Exception(
				'Could not set API key, please ensure that string variable $wgCzkExchangeRatesApiKey present in LocalSettings.php'
			);
		}

		$this->httpClient = $httpClient;
	}

	public function getExchangeData(): ExchangeData
	{
		$response = $this->httpClient->get($this->apiEndpoint, [
			'query' => [
				'api_key' => $this->apiKey,
				'base' => $this->czechCrownCode,
				'symbols' => implode(',', $this->otherCurrencyCodes)
			]
		]);

		$decodedJson = json_decode($response->getBody(), true);

		return new ExchangeData($decodedJson['response']['rates'], $decodedJson['response']['date']);
	}
}
