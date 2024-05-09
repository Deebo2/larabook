<?php

use App\Models\Announcement;
use App\Models\Order;
use App\Models\User;
use GuzzleHttp\Pool;
use Illuminate\Http\Client\Pool as ClientPool;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Decoders\FilePathImageDecoder;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/chart',function(){
    return view('chart');

});
Route::get('/stats',function(){
    return view('stats');
});


Route::get('/drag-drop', function () {
    return view('drag-drop');
});
Route::get('/http-client', function () {
    // $responseGithub = Http::get('https://api.github.com/users/drehimself/repos?sort=created&per_page=10');

    // $responseWeather = Http::get('https://api.openweathermap.org/data/2.5/weather?q=Toronto&units=metric&appid='.config('services.openWeatherMap.appId'));

    // $responseMovies = Http::withToken(config('services.tmdb.bearerToken'))->get('https://api.themoviedb.org/3/movie/popular');

    // $responseMovies = Http::movies()->get('/movie/popular');

    $responses = Http::pool(fn (ClientPool $pool) => [
        $pool->as('github')->get('https://api.github.com/users/drehimself/repos?sort=created&per_page=10'),
        $pool->as('weather')->get('https://api.openweathermap.org/data/2.5/weather?q=Toronto&units=metric&appid='.config('services.openWeatherMap.appId')),
        $pool->as('movies')->withToken(config('services.tmdb.bearerToken'))->get('https://api.themoviedb.org/3/movie/popular'),
    ]);

    return view('http-client', [
        'repos' => $responses['github']->json(),
        'weather' => $responses['weather']->json(),
        'movies' => $responses['movies']->json(),
    ]);
});
