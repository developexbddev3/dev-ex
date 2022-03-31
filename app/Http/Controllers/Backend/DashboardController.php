<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        $this->data['dashboard_active'] = 'active';
    }
    public function index() {
        $this->data['today_visitor'] = Visitor::whereDay('created_at', date('d'))->get();
        $this->data['yesterday_visitor'] = Visitor::whereDate('created_at', Carbon::yesterday())->get();
        $this->data['unread_msg'] = Contact::where('is_read', 0)->count();
        $this->data['all_msg'] = Contact::all()->count();
        $this->data['active_services'] = Service::where('status', 1)->count();
        $this->data['total_services'] = Service::all()->count();
        return view('backend.dashboard.dashboard', $this->data);
    }
}
