<?php
namespace MediaWiki\Extension\CzkExchangeRates;

use GuzzleHttp\Client;
use MediaWiki\Extension\CzkExchangeRates\Interfaces\ExchangeRatesRetrieverInterface;
use MediaWiki\Extension\CzkExchangeRates\Services\ExchangeRatesRetriever;
use MediaWiki\MediaWikiServices;

return [
	'CzkExchangeRates.ExchangeRatesRetriever' => function (MediaWikiServices $services): ExchangeRatesRetrieverInterface {
		return new ExchangeRatesRetriever(new Client());
	},
];
