<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Invoice;
use App\Payment;
use App\School;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $schools=School::all();
        $paymentsToday=Payment::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->sum('amount');

        $paymentsThisWeek=Payment::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');
        $paymentsLastWeek=Payment::whereBetween('created_at', [Carbon::now()->startOfWeek()->subWeek(), Carbon::now()->endOfWeek()->subWeek()])->sum('amount');
        $paymentsThisMonth=Payment::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('amount');
        $paymentsLastMonth=Payment::whereBetween('created_at', [Carbon::now()->startOfMonth()->subMonth(), Carbon::now()->endOfMonth()->subMonth()])->sum('amount');
        $paymentsThisYear=Payment::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('amount');

        $InvoicesToday=Invoice::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->sum('amount');
        $InvoicesThisWeek=Invoice::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');
        $InvoicesLastWeek=Invoice::whereBetween('created_at', [Carbon::now()->startOfWeek()->subWeek(), Carbon::now()->endOfWeek()->subWeek()])->sum('amount');
        $InvoicesThisMonth=Invoice::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('amount');
        $InvoicesLastMonth=Invoice::whereBetween('created_at', [Carbon::now()->startOfMonth()->subMonth(), Carbon::now()->endOfMonth()->subMonth()])->sum('amount');
        $InvoicesThisYear=Invoice::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('amount');


        return view('home', compact('paymentsToday', 'paymentsThisWeek', 'paymentsLastWeek', 'paymentsThisMonth', 'paymentsLastMonth', 'paymentsThisYear', 'InvoicesToday', 'InvoicesThisWeek', 'InvoicesLastWeek', 'InvoicesThisMonth', 'InvoicesLastMonth', 'InvoicesThisYear','schools'));
    }
}
