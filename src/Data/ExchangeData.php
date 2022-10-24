<?php

namespace MediaWiki\Extension\CzkExchangeRates\Data;

use MediaWiki\Extension\CzkExchangeRates\Interfaces\ExchangeDataInterface;

class ExchangeData implements ExchangeDataInterface
{
	private array $rates;

	private string $updatedAt;

	public function __construct(array $rates, string $updatedAt)
	{
		$this->rates = $rates;
		$this->updatedAt = $updatedAt;
	}

	public function getRates(): array
	{
		return $this->rates;
	}

	public function getUpdatedAt(): string
	{
		return $this->updatedAt;
	}
}
