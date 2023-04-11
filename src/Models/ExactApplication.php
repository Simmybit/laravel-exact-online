<?php

namespace Simmybit\LaravelExactOnline\Models;

use Illuminate\Database\Eloquent\Model;

class ExactApplication extends Model
{
    protected $hidden = [
        'client_id',
        'client_secret',
        'webhook_secret',
        'exact_accessToken',
        'exact_refreshToken',
        'exact_tokenExpires',
        'exact_authorisationCode'
    ];
}
