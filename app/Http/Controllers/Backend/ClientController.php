<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    use FileSaver;
    public function index() {
        $this->data['clients'] = Client::all();
        return view('backend.client.index', $this->data);
    }
    public function create() {
        return view('backend.client.create');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image',
        ]);
        $client = Client::create([
            'name' => $request->name,
            'logo' => '',
            'status' => ($request->status) ? true : false,
        ]);

        // logo
        $this->upload_file($request->logo, $client, 'logo', 'frontend/images/client');
        return redirect()->route('admin.clients.index')->with('success', 'Client Create Successfully');
    }
    public function edit(Client $client) {
        return view('backend.client.edit', compact('client'));
    }
    public function update(Request $request, Client $client) {
        // return view('backend.client.edit', compact('client'));
        $request->validate([
            'name' => 'required',
        ]);

        $client->update([
            'name' => $request->name,
            'status' => ($request->status) ? true : false,
        ]);
        if ($request->logo) {
            $this->upload_file($request->logo, $client, 'logo', 'frontend/images/client');
        }
        return redirect()->route('admin.clients.index')->with('success', 'Client Update Successfully');
    }
    public function delete(Client $client) {
        DB::transaction(function() use($client) {
            if (file_exists($client->logo)) {
                unlink($client->logo);
            }
            $client->delete();
        });
        return back()->with('success', 'Client Create Successfully');
    }
}
