<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function getuser()
    {

        // Create a new Guzzle client instance
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "localhost:5000/users";

        try {
            // Make a GET request to the OpenWeather API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            return view('user', [
                'user' => $data
            ]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }
    public function postuser(Request $request)
    {
       
        // Create a new Guzzle client instance
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "localhost:5000/users/register";

        // try {
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => $request->input('password'),
            'profession' => $request->input('profession'),
        ];

        // POST request using the created object
        $response = $client->post($apiUrl, [
            'headers' => $headers,
            'json' => $data,
        ]);
         
            // Make a GET request to the OpenWeather API
            
            // Get the response body as an array
         dd($response);

            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            // Simulated response for successful or failed update
            if ($response) {
                return redirect()->route('posts.index')->with('success', 'Post  successfully!');
            } else {
                return redirect()->route('posts.index')->with('error', 'Failed to update post. Please try again.');
            }
        // } catch (\Exception $e) {
        //     // Handle any errors that occur during the API request
        //     return view('api_error', ['error' => $e->getMessage()]);
        // }
    }
}
