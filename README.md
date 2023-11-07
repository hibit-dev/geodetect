<p align="center"><img src="https://raw.githubusercontent.com/hibit-dev/geodetect/master/images/preview.png" alt="Automatically detect user's geo data based on their IP address"></p>

# GeoDetect: IP-based country detection
GeoDetect is a framework-agnostic PHP package that allows to effortlessly extract valuable country information from IP addresses. Powered by a robust and up-to-date IP geolocation database, the package provides accurate results and ensures reliable performance. By Integrating GeoDetect into your PHP applications developers can easily implement geolocation functionality without the hassle of building and maintaining their own IP geolocation database.

## Installation
Install GeoDetect using `composer require`:

```bash
composer require hibit-dev/geodetect
```

## Usage
Once installed, include the GeoDetect package in your class:

```php
use Hibit\GeoDetect;
```

Instantiate the class or use the dependency injection:

```php
$geoDetect = new GeoDetect();
```

Retrieve country record providing user's IP address:

```php
$country = $geoDetect->getCountry('XXX.XXX.XXX.XXX');
```

Finally, use available helpers to retrieve the required country information:

```php
$country->getGeonameId();
$country->getIsoCode();
$country->getName();
$country->isInEuropeanUnion();
```

### Self-hosted database

The package utilizes MaxMind's database in the background, which is regularly updated to ensure the accuracy of the data. However, you also have the option to use a self-hosted database by specifying the location of the DB file:

```php
$country = $geoDetect->setCountriesDatabase('location_to_db_file')
                     ->getCountry('XXX.XXX.XXX.XXX');
```
> The package includes [MaxMind](https://www.maxmind.com)'s database of 2023-11-03

## Documentation
You'll find instructions and full documentation on [HiBit](https://www.hibit.dev/posts/105/geodetect-php-package-for-ip-based-country-detection). It includes detailed info on how to wire and use the module.

## Security
If you discover any security related issues, please email security@hibit.dev instead of using the issue tracker.

## About HiBit
HiBit is a platform made by and for enthusiasts of the IT world. [On our website](https://www.hibit.dev) you can read and comment on technical articles, tutorials, news ... and everything that may interest you in the computing world.

## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
