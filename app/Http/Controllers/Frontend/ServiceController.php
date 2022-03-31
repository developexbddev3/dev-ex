<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $this->data['services'] = Service::with('packages')->where('status', 1)->get();
        return view('frontend.pages.services', $this->data);
    }
}
