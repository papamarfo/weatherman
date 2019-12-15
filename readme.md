# Weatherman

[![Total Downloads][ico-downloads]][link-downloads]

A laravel wrapper for OpenWeather "city only" api

## Installation

You can install this package via composer using this command:

```bash
$ composer require manford/weatherman
```

The `Manford\Weatherman\WeathermanServiceProvider` is auto-discovered and registered by default.

If you want to register it yourself, add the ServiceProvider in config/app.php:
```php
'providers' => [
    /*
     * Package Service Providers...
     */
    Manford\Weatherman\WeathermanServiceProvider::class,
]
```

The `Weather` facade is also auto-discovered.

If you want to add it manually, add the Facade in config/app.php:

```php
'aliases' => [
    ...
    'Weather' => Manford\Weatherman\Facades\Weatherman::class,
]
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Manford\Weatherman\WeathermanServiceProvider"
```

This is the contents of the published config file located in `config/weatherman.php`.

```php
return [
    'base_url' => env('OPEN_WEATHER_URL'),

    'app_id' => env('OPEN_WEATHER_ID')
];
```

Add and update your .env file with these.

Visit [OpenWeather](https://home.openweathermap.org/api_keys) to get your ID.

```
OPEN_WEATHER_URL=https://api.openweathermap.org/data/2.5/weather
OPEN_WEATHER_ID=
```

## Usage
In your controller:

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Manford\Weatherman\Facades\Weatherman as Weather;

class PageController extends Controller
{
    public function index()
    {
    	$city = Weather::city('accra');

    	return view('welcome', compact('city'));
    }
}
```

Include this view where you need it:

```bash
<div class="card-body">
    <h2>{{ $city->name }} Weather Status</h2>
    <div class="time">
        <div>{{ date("l g:i a", time()) }}</div>
        <div>{{ date("jS F, Y", time()) }}</div>
        <div>{{ ucwords($city->weather[0]->description) }}</div>
    </div>
    <div class="weather-forecast">
        <img src="http://openweathermap.org/img/w/{{ $city->weather[0]->icon }}.png"
            class="weather-icon" /> <?php echo $city->main->temp_max; ?>°C
        <span class="min-temperature">
            {{ $city->main->temp_min }}°C
        </span>
    </div>
    <div class="time">
        <div>Humidity: {{ $city->main->humidity }} %</div>
        <div>Wind: {{ $city->wind->speed }} km/h</div>
    </div>
</div>
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email benjaminmanford@gmail.com instead of using the issue tracker.

## Credits

- [Benjamin Manford][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/manford/weatherman.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/manford/weatherman.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/manford/weatherman/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/manford/weatherman
[link-downloads]: https://packagist.org/packages/manford/weatherman
[link-travis]: https://travis-ci.org/manford/weatherman
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/manford
[link-contributors]: ../../contributors