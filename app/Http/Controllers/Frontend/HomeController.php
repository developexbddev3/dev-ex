<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\HeroSection;
use App\Models\Service;
use App\Models\Training;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $this->data['services'] = Service::with('packages')->where('status', 1)->get();
        $this->data['trainings'] = Training::where('status', true)->limit(5)->get();
        $this->data['clients'] = Client::all();
        $this->data['hero_data'] = HeroSection::first();
        return view('frontend.pages.home', $this->data);
    }
}
