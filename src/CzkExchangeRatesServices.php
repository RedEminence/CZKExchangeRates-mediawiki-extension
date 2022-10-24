<?php

namespace MediaWiki\Extension\CzkExchangeRates;

use MediaWiki\Extension\CzkExchangeRates\Interfaces\ExchangeRatesRetrieverInterface;
use MediaWiki\MediaWikiServices;
use Psr\Container\ContainerInterface;

class CzkExchangeRatesServices
{
	public static function getExchangeRatesRetriever(ContainerInterface $services = null) : ExchangeRatesRetrieverInterface
	{
		return ($services ?: MediaWikiServices::getInstance())
			->get('CzkExchangeRates.ExchangeRatesRetriever');
	}
}
