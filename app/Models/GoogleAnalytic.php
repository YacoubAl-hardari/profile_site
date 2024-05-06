<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoogleAnalytic extends Model
{
    use HasFactory;

    protected $table = 'google_analytics';
    protected $fillable = [
            'google_analytics_id',
            'type',
            'project_id',
            'private_key_id',
            'private_key',
            'client_email',
            'client_id',
            'auth_uri',
            'token_uri',
            'auth_provider_x509_cert_url',
            'client_x509_cert_url',
            'universe_domain'
    ];

}
