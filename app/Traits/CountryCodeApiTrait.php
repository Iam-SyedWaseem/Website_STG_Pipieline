<?php

namespace App\Traits;
use Illuminate\Support\Facades\Http;


trait CountryCodeApiTrait
{
    protected $apiUrl = 'https://restcountries.com/v3.1';


    /**
     * Fetch all country codes and names.
     *
     * @return array
     */
    public function getAllCountries()
    {
        $response = Http::get("{$this->apiUrl}/all");

       // $response = Http::get($this->apiUrl);

        // Check for a successful response
        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }

    /**
     * Fetch a specific country by its alpha-2 code.
     *
     * @param string $code
     * @return array
     */
    public function getCountryByCode($code)
    {
        $response = Http::get("{$this->apiUrl}/alpha/{$code}");

        // Check for a successful response
        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }
}
