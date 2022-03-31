<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Traits\FileSaver;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    use FileSaver;

    public function index()
    {
        $this->data['trainings'] = Training::with('category')->get();
        // $this->data['categories'] = Category::where('status', true)->get();

        return view('backend.training.index', $this->data);
    }

    public function create()
    {
        $this->data['categories'] = Category::where('status', true)->get();
        return view('backend.training.create', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'price' => 'required|integer',
            'short_description' => 'required|string',
            'description' => 'string|required',
        ]);

        $training = Training::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'thumbmail' => '',
            'price' => $request->price,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'status' => ($request->status) ? true : false,
        ]);

        if ($request->hasFile('thumbmail')) {
            $this->upload_file($request->thumbmail, $training, 'thumbmail', 'frontend/images/thumbmail');
        }

        // Category::create([
        //     'name' => $request->name,
        //     'slug' => Str::slug($request->name),
        //     'status' => ($request->status) ? true : false,
        // ]);
        return redirect()->route('admin.training.index')->with('success', 'Training Created Successfylly');
    }

    public function edit(Training $training)
    {
        $this->data['training'] = $training;
        $this->data['categories'] = Category::where('status', true)->get();
        return view('backend.training.edit', $this->data);
    }

    public function update(Request $request, Training $training)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'price' => 'required|integer',
            'short_description' => 'string|nullable',
            'description' => 'string|nullable',
        ]);

        DB::transaction(function() use($training, $request) {
            $training->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'price' => $request->price,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'status' => ($request->status) ? true : false,
            ]);
    
            if ($request->hasFile('thumbmail')) {
                $this->upload_file($request->thumbmail, $training, 'thumbmail', 'frontend/images/thumbmail');
            }
        });

        return redirect()->route('admin.training.index')->with('success', 'Training Created Successfylly');
    }

    public function delete(Training $training)
    {
        $training->delete();
        return redirect()->route('admin.training.index')->with('success', 'Training Deleted Successfylly');
    }
}
