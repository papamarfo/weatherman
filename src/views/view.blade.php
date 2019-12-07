<div class="card-body">
    <h2>{{ $data->name }} Weather Status</h2>
    <div class="time">
        <div>{{ date("l g:i a", time()) }}</div>
        <div>{{ date("jS F, Y", time()) }}</div>
        <div>{{ ucwords($data->weather[0]->description) }}</div>
    </div>
    <div class="weather-forecast">
        <img src="http://openweathermap.org/img/w/{{ $data->weather[0]->icon }}.png"
            class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C
        <span class="min-temperature">
            {{ $data->main->temp_min }}°C
        </span>
    </div>
    <div class="time">
        <div>Humidity: {{ $data->main->humidity }} %</div>
        <div>Wind: {{ $data->wind->speed }} km/h</div>
    </div>
</div>