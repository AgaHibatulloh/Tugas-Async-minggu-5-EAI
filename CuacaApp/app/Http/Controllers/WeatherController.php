<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        $weatherData = Weather::all();
        return view('index', ['weatherData' => $weatherData]);
    }

    public function store(Request $request)
    {
        $city = $request->city;
        $apiKey = env('OPENWEATHER_API_KEY');
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        $response = Http::get($apiUrl);
        if ($response->failed()) {
            return redirect()->back()->with('error', 'Gagal mengambil data cuaca');
        }

        $data = $response->json();

        Weather::create([
            'city' => $city,
            'temperature' => $data['main']['temp'],
            'feels_like' => $data['main']['feels_like'],
            'temp_min' => $data['main']['temp_min'],
            'temp_max' => $data['main']['temp_max'],
            'pressure' => $data['main']['pressure'],
            'humidity' => $data['main']['humidity'],
            'wind_speed' => $data['wind']['speed'],
            'wind_deg' => $data['wind']['deg'],
            'clouds' => $data['clouds']['all'],
            'visibility' => $data['visibility'],
            'weather' => ucfirst($data['weather'][0]['description']),
            'icon' => $data['weather'][0]['icon'],
            'country' => $data['sys']['country'],
            'sunrise' => date('H:i:s', $data['sys']['sunrise']),
            'sunset' => date('H:i:s', $data['sys']['sunset']),
        ]);

        return redirect()->route('weather.index')->with('success', 'Data cuaca berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $weather = Weather::findOrFail($id);
        $weather->update(['city' => $request->city]);

        return redirect()->route('weather.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Weather::destroy($id);
        return redirect()->route('weather.index')->with('success', 'Data berhasil dihapus!');
    }
}
