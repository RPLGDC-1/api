<?php

namespace App\Http\Controllers;

use App\Models\PaymentLog;
use Illuminate\Http\Request;

class PaymentLogController extends Controller
{
    public function index()
    {
        $data['logs'] = PaymentLog::latest()->get();
        return view('admin.payment.index', $data);
    }
}
