<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorybooktour;
use Carbon\Carbon;
use App\Models\contact;
use App\Models\Category;
class Revenue extends Controller
{
    public function index(Request $request)
    {
        // $selectedDate = $request->input('selectedMonth', Carbon::now()->format('Y-m'));
        // $selectedDate = Carbon::parse($selectedDate)->startOfMonth();

        // $dailyRevenue = $this->calculateRevenueForDate($selectedDate);
        // $weeklyRevenue = $this->calculateRevenueForPeriod('week', $selectedDate);
        // $monthlyRevenue = $this->calculateRevenueForPeriod('month', $selectedDate);
        // $yearlyRevenue = $this->calculateRevenueForPeriod('year', $selectedDate);Y-m-d
       // return view('admin.category.revenue', compact('selectedDate', 'revenueData'));
       $selectedDate = $request->input('selectedDate', Carbon::now()->format('Y-m-d'));
       $selectedDate = Carbon::parse($selectedDate)->endOfDay();
       $listlh = contact::all();
            $listt = Category::all();
       $revenueData = $this->calculateRevenueForPeriod('day', $selectedDate);
       return view('admin.category.revenue', compact('selectedDate', 'revenueData','listlh', 'listt'));
       // return view('admin.category.revenue', compact('dailyRevenue', 'weeklyRevenue', 'monthlyRevenue', 'yearlyRevenue'));
       // return view('admin.category.revenue');
        
    }
    protected function calculateRevenueForPeriod($period, $date)
    {
        $startDate = $date->copy()->startOf($period);
        $endDate = $date->copy()->endOf($period);

        $totalRevenue = Categorybooktour::whereBetween('created_at', [$startDate, $endDate])
            ->sum('total');

        $bookTours = Categorybooktour::whereBetween('created_at', [$startDate, $endDate])
            ->get();

            $listlh = contact::all();
            $listt = Category::all();
          //  dd(compact('totalRevenue', 'bookTours'));
        return compact('totalRevenue', 'bookTours');
    }
}