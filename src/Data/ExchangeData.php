<?php

namespace MediaWiki\Extension\CzkExchangeRates\Data;

class ExchangeData
{
	/**
	 * @var array should be in format ['USD' => 0.0403, 'EUR' => 0.04, 'GBP' => 0,035]
	 */
	private array $rates;

	private string $updatedAt;

	public function __construct(array $rates, string $updatedAt)
	{
		$this->rates = $rates;
		$this->updatedAt = $updatedAt;
	}

	public function getCurrencyInfo(): array
	{
		return [
			"rates" => $this->rates,
			'updated_at' => $this->updatedAt
		];
	}
}
