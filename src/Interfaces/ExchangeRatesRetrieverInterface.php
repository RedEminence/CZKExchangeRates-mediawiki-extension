<?php

namespace MediaWiki\Extension\CzkExchangeRates\Interfaces;

use MediaWiki\Extension\CzkExchangeRates\Data\ExchangeData;

interface ExchangeRatesRetrieverInterface
{
	public function getExchangeData(): ExchangeData;
}
