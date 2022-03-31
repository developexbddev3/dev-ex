<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service;
use App\Traits\Icons;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    use Icons;
    public function packages(Service $service) {
        $this->data['service'] = $service;
        $this->data['all_icons'] = $this->all_icons();
        // dd($service->packages());
        // $this->data['packages'] = $service->packages();
        return view('backend.service.package', $this->data);
    }
    public function edit_packages(Package $package) {
        // dd($package);
        // $this->data['service'] = $service;
        $this->data['all_icons'] = $this->all_icons();
        // dd($service->packages());
        $this->data['package'] = $package;
        return view('backend.service.edit_package', $this->data);
    }
    public function store_packages(Request $request, Service $service) {
        $request->validate([
            'name' => 'required|string',
            'icon' => 'string|required',
            'description' => 'string|required',
        ]);
        $data = [
            'service_id' => $service->id,
            'name' => $request->name,
            'icon' => $request->icon,
            'description' => $request->description,
            'status' => ($request->status == 'on') ? 1 : 0,
        ];
        Package::create($data);
        return redirect()->route('admin.service.packages', $service)->with('success', 'Package Created Successfully');
    }
    public function update_packages(Request $request, Package $package) {
        $request->validate([
            'name' => 'required|string',
            'icon' => 'string|required',
            'description' => 'string|required',
        ]);
        
        $data = [
            'name' => $request->name,
            'icon' => $request->icon,
            'description' => $request->description,
            'status' => ($request->status == 'on') ? 1 : 0,
        ];
        $package->update($data);
        return redirect()->route('admin.service.packages', $package->service_id)->with('success', 'Package Updated Successfully');
    }
    public function delete_packages(Package $package) {
        $id = $package->service_id;
        $package->delete();
        return redirect()->route('admin.service.packages', $id)->with('success', 'Package Updated Successfully');
    }
}
