<?php

namespace Manford\Weatherman;

use GuzzleHttp\Client;
use Exception;

class Weatherman
{
	/**
	 * Get weather by city
	 */
    public function city($city)
    {
    	$client = new Client();
        $base_url = 'api.openweathermap.org/data/2.5/weather';
        $app_id = config('weatherman.app_id');
        	
    	try
		{
			$response = $client->request('GET', $base_url.'?q='.$city.'&APPID='.$app_id);
		}
		catch (Exception $e)
		{
			logger()->error($e->getMessage());

            return [];
		}

		return $this->responseHandler($response->getBody()->getContents());
    }

	/**
	 * Response handler
	 */
	public function responseHandler($response)
	{
		if ($response)
		{
			return json_decode($response);
		}
		
		return [];
	}
}