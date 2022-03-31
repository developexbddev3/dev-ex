<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_title',
        'short_description',
        'description',
        'footer_description',
        'mobile_number',
        'imo_number',
        'whatsapp_number',
        'email',
        'header_logo',
        'footer_logo',
        'favicon',
        'address',
        'keyword',
        'app_link',
        'facebook_link',
        'twitter_link',
        'skype_link',
        'youtube_link',
        'instagram_link',
        'linkedin_link',
        'google_map_location',
    ];
}
