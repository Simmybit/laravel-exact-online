<?php

namespace Simmybit\LaravelExactOnline\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Simmybit\LaravelExactOnline\LaravelExactOnline;

class LaravelExactOnlineController extends Controller
{
    /**
     * Connect Exact app
     *
     * @return Factory|View
     */
    public function appConnect()
    {
        return view('laravelexactonline::connect');
    }

    /**
     * Authorize to ExactOnline
     * Sends an oAuth request to the Exact App to get tokens
     */
    public function appAuthorize(): void
    {
        $connection = app()->make('Exact\Connection');
        $connection->redirectForAuthorization();
    }

    /**
     * Exact Callback
     * Saves the authorisation and refresh tokens
     *
     * @return Factory|View
     */
    public function appCallback()
    {
        // Called from exact.callback route
        // Has to be overloaded in exact applications mode

        $config = LaravelExactOnline::loadConfig();
        $config->exact_authorisationCode = request()->get('code');

        // Store first to avoid another redirect to exact online
        LaravelExactOnline::storeConfig($config);

        $connection = app()->make('Exact\Connection');

        $config->exact_accessToken = serialize($connection->getAccessToken());
        $config->exact_refreshToken = $connection->getRefreshToken();
        $config->exact_tokenExpires = $connection->getTokenExpires() - 60;

        LaravelExactOnline::storeConfig($config);

        return view('laravelexactonline::connected', ['connection' => $connection]);
    }
}
