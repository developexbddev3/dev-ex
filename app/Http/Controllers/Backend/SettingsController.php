<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\SiteSetting;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use FileSaver;
    public function __construct() {
        $this->data['setting_active'] = 'active';
    }
    public function index() {
        $this->data['setting'] = SiteSetting::first();
        return view('backend.settings.index', $this->data);
    }
    public function update(SettingRequest $request) {
        $validated = $request->validated();
        $setting = SiteSetting::first();

        // 'header_logo' => 'image|nullable',
        // 'footer_logo' => 'image|nullable',
        // 'favicon' => 'image|nullable',
        if ($setting) {
            $setting->update($validated);
            if ($request->hasFile('header_logo')) {
                $request->validate(['header_logo' => 'image']);
                $this->upload_file($request->header_logo, $setting, 'header_logo', 'frontend/img/');
            }
            if ($request->hasFile('footer_logo')) {
                $request->validate(['footer_logo' => 'image']);
                $this->upload_file($request->footer_logo, $setting, 'footer_logo', 'frontend/img/');
            }
            if ($request->hasFile('favicon')) {
                $request->validate(['favicon' => 'image']);
                $this->upload_file($request->favicon, $setting, 'favicon', 'frontend/img/');
            }
        }
        // $setting
        return redirect()->back()->with('success', 'Settings Information updated successfully');
    }
}
