<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service;
use App\Traits\FileSaver;
use App\Traits\Icons;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use Icons, FileSaver;
    public function __construct() {
        $this->data['service_active'] = 'menu-open';
    }
    public function index() {
        $this->data['service_all_active'] = 'active';
        $this->data['services'] = Service::all();
        return view('backend.service.index', $this->data);
    }
    public function create() {
        $this->data['service_add_active'] = 'active';
        return view('backend.service.create', $this->data);
    }
    public function publish(Service $service) {
        $service->update([
            'status' => true
        ]);
        return back()->with('success', 'Service published successfully');
    }
    public function unpublish(Service $service) {
        // dd($service);
        $service->update([
            'status' => false
        ]);
        return back()->with('success', 'Service unpublished successfully');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'feature_list' => 'nullable|array',
            'prices' => 'nullable|array',
            'image' => 'nullable|image',
        ]);
        $data = [
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'feature_list' => $request->feature_list,
            'prices' => $request->prices,
            // 'status' => ($request->status == 'on') ? 1 : 0,
            // 'image' => $request->image,
        ];
        // dd($data);
        $service = Service::create($data);
        if ($request->hasFile('image')) {
            $this->upload_file($request->image, $service, 'image', 'service/');
        }
        return redirect()->route('admin.service.index')->with('success', 'Service Created Successfully');
    }

    public function edit(Service $service) {
        $this->data['service'] = $service;
        return view('backend.service.edit', $this->data);
    }

    public function update(Request $request ,Service $service) {
        $request->validate([
            'title' => 'required|string',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'feature_list' => 'nullable|array',
            'prices' => 'nullable|array',
            'image' => 'nullable|image',
        ]);
        $data = [
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'feature_list' => $request->feature_list,
            'prices' => $request->prices,
            // 'status' => ($request->status == 'on') ? 1 : 0,
            // 'image' => $request->image,
        ];
        if ($request->hasFile('image')) {
            $this->upload_file($request->image, $service, 'image', 'service/');
        }
        $service->update($data);
        return redirect()->route('admin.service.index')->with('success', 'Service Updated Successfully');
    }

}
