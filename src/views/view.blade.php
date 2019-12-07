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