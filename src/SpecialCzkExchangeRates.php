<?php
namespace MediaWiki\Extension\CzkExchangeRates;

use SpecialPage;

class SpecialCzkExchangeRates extends SpecialPage
{
	public function __construct()
	{
		parent::__construct('CzkExchangeRates');
	}

	public function execute($subPage): void
	{
		$output = $this->getOutput();
		$this->setHeaders();

		$html = '<div id="czk-exchange-rates"></div>';

		$output->addWikiTextAsInterface($html);
	}
}
