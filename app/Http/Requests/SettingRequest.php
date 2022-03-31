<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'site_name' => 'string|nullable',
            'site_title' => 'string|nullable',
            'short_description' => 'string|nullable',
            'description' => 'string|nullable',
            'footer_description' => 'string|nullable',
            'mobile_number' => 'string|nullable',
            'imo_number' => 'string|nullable',
            'whatsapp_number' => 'string|nullable',
            'email' => 'email|nullable',
            // 'header_logo' => 'image|nullable',
            // 'footer_logo' => 'image|nullable',
            // 'favicon' => 'image|nullable',
            'address' => 'string|nullable',
            'keyword' => 'string|nullable',
            'app_link' => 'string|nullable',
            'facebook_link' => 'string|nullable',
            'twitter_link' => 'string|nullable',
            'skype_link' => 'string|nullable',
            'youtube_link' => 'string|nullable',
            'instagram_link' => 'string|nullable',
            'linkedin_link' => 'string|nullable',
            'google_map_location' => 'string|nullable',
        ];
    }
}
