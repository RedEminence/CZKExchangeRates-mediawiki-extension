<?php


namespace MediaWiki\Extension\CzkExchangeRates\Interfaces;


interface ExchangeDataInterface
{
	/**
	 * @return array in format ['USD/CZK' => 24, 'EUR/CZK' => 25, 'GBP/CZK' => 26]
	 */
	public function getRates(): array;

	/**
	 * @return string for example, 2022-10-23T17:09:34Z
	 */
	public function getUpdatedAt(): string;
}
