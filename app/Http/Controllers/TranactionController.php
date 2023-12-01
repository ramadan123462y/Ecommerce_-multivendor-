<?php

namespace App\Http\Controllers;

use App\Models\Transation;
use Illuminate\Http\Request;

class TranactionController extends Controller
{
    public function index()
    {



        $transactions = Transation::paginate(7);
        return view('Admin.Transaction_payments.stripe', compact('transactions'));
    }
}
