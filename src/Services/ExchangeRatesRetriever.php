<?php
namespace MediaWiki\Extension\CzkExchangeRates\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use MediaWiki\Extension\CzkExchangeRates\Data\ExchangeData;
use MediaWiki\Extension\CzkExchangeRates\Exceptions\CouldNotGetRatesFromApiException;
use MediaWiki\Extension\CzkExchangeRates\Interfaces\ExchangeRatesRetrieverInterface;
use Throwable;

class ExchangeRatesRetriever implements ExchangeRatesRetrieverInterface
{
	private string $apiKey;

	private string $apiEndpoint = 'https://api.currencyscoop.com/v1/latest';

	private string $czechCrownCode = 'CZK';

	private array $otherCurrenciesCodes = ['USD', 'EUR', 'GBP'];

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
		try {
			$rates = [];

			foreach ($this->otherCurrenciesCodes as $currencyCode) {
				$response = $this->httpClient->get($this->apiEndpoint, [
					'query' => [
						'api_key' => $this->apiKey,
						'base' => $currencyCode,
						'symbols' => $this->czechCrownCode
					]
				]);

				$decodedJson = json_decode($response->getBody(), true);
				$rates[$currencyCode] = $decodedJson['response']['rates'][$this->czechCrownCode];
			}
		} catch (BadResponseException $exception) {
			throw CouldNotGetRatesFromApiException::create($exception->getCode());
		}

		return new ExchangeData(
			$rates,
			$decodedJson['response']['date']
		);
	}
}
