<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExactApplication extends Model
{
    protected $hidden = [
        'client_id',
        'client_secret',
        'webhook_secret',
        'access_token',
        'refresh_token',
        'token_expires',
        'authorisation_code'
    ];
}
