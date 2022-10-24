<?php
namespace MediaWiki\Extension\CzkExchangeRates\Exceptions;

use Exception;

class CouldNotGetRatesFromApiException extends Exception
{
	public static function create(int $invalidResponseStatus): self
	{
		return new static('A call to the external exchange rates API was unsuccessful. Status: ' . $invalidResponseStatus);
	}
}
