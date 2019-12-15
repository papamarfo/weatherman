<?php

namespace Manford\Weatherman;

use GuzzleHttp\Client;
use Exception;

class Weatherman
{
	/**
	 * Create a new Constructor
	 */
	public function __construct()
	{
		$this->client = new Client();
		$this->app_id = config('weatherman.app_id');
		$this->base_url = config('weatherman.base_url');
	}

	/**
	 * Get weather by city
	 *
	 * @param $city
	 */
    public function city($city)
    {
    	try
		{
			$response = $this->client->request(
				'GET', $this->base_url.'?q='.$city.'&appid='.$this->app_id
			);
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
	 *
	 * @param $response
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