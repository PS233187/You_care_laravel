<?php
namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\BadResponseException;
use App\Models\Product;

class ExternalApiService
{
    protected $client;
    protected $accessToken;

    public function __construct()
    {
        $this->client = new Client();
        $this->accessToken = '64|Hi26R7RbP8qGJa5AGNvE91YLaa29P5KBxTnd0l2J';

    }

    public function fetchDataFromApi()
    {
        try {
            $response = $this->client->request('GET','https://kuin.summaict.nl/api/product',[
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                    'Accept' => 'application/json', // Adjust content type as needed
                ],
                'verify' => false, // Disable SSL verification
                //'verify' => '/path/to/cacert.pem', // Or provide path to CA bundle file
            ]);

        $data = json_decode($response->getBody(), true);

        foreach ($data as $product) {
            Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
                'color' => $product['color'],
                'height_cm' => $product['height_cm'],
                'width_cm' => $product['width_cm'],
                'depth_cm' => $product['depth_cm'],
                'weight_gr' => $product['weight_gr'],
            ]);
        }

            // Process the data and save it to your database
            // ...
        } catch (ClientException $e) {
            // Handle any exceptions (e.g., connection errors)
            // Log or throw an error as needed
            return 'Error fetching data from API' + $e->getMessage();
        }

        catch (GuzzleException $e)
        {
            return 'Error fetching data from API' + $e->getMessage();
        }
    }
}
