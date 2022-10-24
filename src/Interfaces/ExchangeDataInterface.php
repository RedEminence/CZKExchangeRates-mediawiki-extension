<?php


namespace MediaWiki\Extension\CzkExchangeRates\Interfaces;


interface ExchangeDataInterface
{
	/**
	 * @return array in format ['USD' => 0.0403, 'EUR' => 0.04, 'GBP' => 0.035]
	 */
	public function getRates(): array;

	/**
	 * @return string for example, 2022-10-23T17:09:34Z
	 */
	public function getUpdatedAt(): string;
}
