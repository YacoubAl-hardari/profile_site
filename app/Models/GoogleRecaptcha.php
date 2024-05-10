<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoogleRecaptcha extends Model
{
    use HasFactory;

    protected $table = 'google_recaptchas';
    protected $fillable = [
            'recaptcha_site_key',
            'recaptcha_secret_key',
            'recaptcha_version',
    ];

}
