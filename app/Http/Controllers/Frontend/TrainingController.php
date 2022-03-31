<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function details(Training $training) {
        $this->data['training'] = $training;
        // $related = Training 
        return view('frontend.pages.training_details', $this->data);
    }
}
