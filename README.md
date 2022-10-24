# CZKExchangeRates-mediawiki-extension

An extension that adds a special page to mediawiki with currency exchange rates for USD/CZK, EUR/CZK, GBP/CZK pairs. This information refreshes every 60 seconds and is provided by [Currencyscoop](https://currencyscoop.com/) API.

## Installation

Clone the repo into the `extensions` directory.
```
git clone https://github.com/RedEminence/CZKExchangeRates-mediawiki-extension
```

Install NPM modules.

```
npm install
```

Configure LocalSettings.php - load extension and set an API key from [Currencyscoop.](https://currencyscoop.com/)

```
wfLoadExtension('CzkExchangeRates');
$wgCzkExchangeRatesApiKey = 'someapikey';
```
After that extension will be ready for use and available as a special page on /wiki/Special:CzkExchangeRates.

## Testing

To run tests execute `vendor/bin/phpunit extensions/CzkExchangeRates/tests` from the root directory.
