<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Contacts\Contact;
use App\Models\Expense;
use App\Models\Investment;
use App\Models\InvoiceDetail;
use App\Models\Patient;
use App\Models\Transaction;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountingDashboardController extends Controller
{
    public function index()
    {
        $todays_date = date('Y-m-d');

        // //investment sum
        $total_invest = Investment::sum('amount');
        $total_withdraw = Withdraw::sum('amount');
        // $daily_patient = Patient::whereDate('created_at', $todays_date)->get()->count('id');
        $lastMonthDate = Carbon::today()->subDays(30);
        $cash =Cash::where('name', 'cash')->first()->amount;
        
        $lastMonth_patient = Patient::whereBetween('created_at', [$lastMonthDate, $todays_date." 23:59:00"])->get()->count('id');

        // //investment sum
        $total_expenes =Expense::sum('amount');
        
        $today_expenes =Expense::whereDate('created_at', $todays_date)->get()->sum('amount');

        $lastMonth_expenes =Expense::whereBetween('created_at',[$lastMonthDate, $todays_date." 23:59:00"])->get()->sum('amount');

        $daily_payment =Transaction::whereDate('created_at', $todays_date)->get()->where('transaction_type', '!=', 'Commission')->sum('amount');


        // //total_contact
        $total_contact = Contact::count('id');
        $total_doctor = Contact::where('contact_type', 'Doctor')->count('id');
        $total_employee = Contact::where('contact_type', 'Employee')->count('id');

        // return view('dashboard');
        return view('accounting.dashboard',compact(
            'total_invest',
            'cash',
            'total_withdraw',
            'total_expenes',
            'today_expenes',
            'lastMonth_expenes',
            'daily_payment',
            'total_contact',
            'total_doctor',
            'total_employee',
        ));
    }
}
