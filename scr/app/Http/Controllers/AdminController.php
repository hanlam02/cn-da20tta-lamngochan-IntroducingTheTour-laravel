<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Categorybooktour;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
         $defaultEmail = 'admin@example.com';
        $defaultPassword = 'admin123';

    
        $inputEmail = $request->input('email');
        $inputPassword = $request->input('password');

        
        if ($inputEmail === $defaultEmail && $inputPassword === $defaultPassword) {
           
            return redirect()->route('admin.index');
        }

       
    }

    public function index()
    {
        $tourCount = Category::count();
        $totalCount = Categorybooktour::sum('total');
        $tourCounts = Categorybooktour::select('id_tour', \DB::raw('COUNT(*) as count'))
            ->groupBy('id_tour')
            ->get();
         return view('admin.index', compact('tourCount', 'totalCount', 'tourCounts'));
    }

   
    public function monthlyRevenueChart()
    {
        $selectedMonth = Carbon::now()->format('Y-m'); // Tháng hiện tại
        $dailyRevenue = $this->calculateDailyRevenue($selectedMonth);

        return view('monthly-revenue-chart', compact('dailyRevenue', 'selectedMonth'));
    }

    protected function calculateDailyRevenue($selectedMonth)
    {
        $startDate = Carbon::parse($selectedMonth)->startOfMonth();
        $endDate = Carbon::parse($selectedMonth)->endOfMonth();

        $dailyRevenue = Categorybooktour::selectRaw('DATE(created_at) as date, SUM(total) as revenue')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->get();
        return $dailyRevenue;
    }
}


