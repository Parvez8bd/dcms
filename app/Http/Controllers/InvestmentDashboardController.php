<?php

namespace App\Http\Controllers;

use App\Models\Contacts\Contact;
use App\Models\Investment;
use App\Models\InvestmentDetails;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Patient;
use App\Models\ProfitDistribution;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvestmentDashboardController extends Controller
{
    public function index()
    {
        $todays_date = date('Y-m-d');

        // //investment sum
        $total_patient = Patient::count('id');
        $daily_patient = Patient::whereDate('created_at', $todays_date)->get()->count('id');
        $lastMonthDate = Carbon::today()->subDays(30);
        
        $lastMonth_patient = Patient::whereBetween('created_at', [$lastMonthDate, $todays_date." 23:59:00"])->get()->count('id');

        // //investment sum
        $total_report =InvoiceDetail::count('id');
        
        $today_report =InvoiceDetail::whereDate('created_at', $todays_date)->get()->count('id');

        $lastMonth_report =InvoiceDetail::whereBetween('created_at',[$lastMonthDate, $todays_date." 23:59:00"])->get()->count('id');

        $daily_payment =Transaction::whereDate('created_at', $todays_date)->get()->where('transaction_type', '!=', 'Commission')->sum('amount');


        // //total_contact
        $total_contact = Contact::count('id');
        $total_doctor = Contact::where('contact_type', 'Doctor')->count('id');
        $total_employee = Contact::where('contact_type', 'Employee')->count('id');

        // return view('dashboard');
        return view('dashboard',compact(
            'total_patient',
            'daily_patient',
            'lastMonth_patient',
            'total_report',
            'today_report',
            'lastMonth_report',
            'daily_payment',
            'total_contact',
            'total_doctor',
            'total_employee',
        ));
    }
}
