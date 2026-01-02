<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Trip;
use App\Models\Service;
use App\Models\Expense;
use App\Models\FuelFillup;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoDashboardController extends Controller
{
    public function index()
    {
        $companyId = auth()->user()->company_id;

        // KPIs
        $totalVehicles = Vehicle::where('company_id', $companyId)->count();
        $activeVehicles = Vehicle::where('company_id', $companyId)->where('status', 'active')->count();
        $totalDrivers = Driver::where('company_id', $companyId)->count();
        $activeDrivers = Driver::where('company_id', $companyId)->where('status', 'active')->count();
        $totalTrips = Trip::where('company_id', $companyId)->count();
        $completedTrips = Trip::where('company_id', $companyId)->where('status', 'completed')->count();

        // Monthly data for charts
        $monthlyTrips = Trip::where('company_id', $companyId)
            ->selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $monthlyExpenses = Expense::where('company_id', $companyId)
            ->selectRaw('EXTRACT(MONTH FROM expense_date) as month, SUM(amount) as total')
            ->whereYear('expense_date', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $monthlyFuelCosts = FuelFillup::where('company_id', $companyId)
            ->selectRaw('EXTRACT(MONTH FROM fillup_date) as month, SUM(total_cost) as total')
            ->whereYear('fillup_date', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Vehicle utilization
        $vehicleUtilization = Trip::where('company_id', $companyId)
            ->with('vehicle')
            ->selectRaw('vehicle_id, COUNT(*) as trip_count, SUM(distance) as total_distance')
            ->whereNotNull('distance')
            ->groupBy('vehicle_id')
            ->orderBy('total_distance', 'desc')
            ->limit(10)
            ->get();

        // Recent issues
        $recentIssues = Issue::where('company_id', $companyId)
            ->with(['vehicle:id,make,model,license_plate'])
            ->latest()
            ->limit(5)
            ->get();

        // Upcoming services
        $upcomingServices = Service::where('company_id', $companyId)
            ->with(['vehicle:id,make,model,license_plate'])
            ->where('service_date', '>=', now())
            ->orderBy('service_date')
            ->limit(5)
            ->get();

        return view('dashboard.info', compact(
            'totalVehicles', 'activeVehicles', 'totalDrivers', 'activeDrivers',
            'totalTrips', 'completedTrips', 'monthlyTrips', 'monthlyExpenses',
            'monthlyFuelCosts', 'vehicleUtilization', 'recentIssues', 'upcomingServices'
        ));
    }

    public function getChartData(Request $request)
    {
        $companyId = auth()->user()->company_id;
        $period = $request->get('period', 'monthly');
        $year = $request->get('year', date('Y'));

        $data = [];

        switch ($period) {
            case 'monthly':
                $data['trips'] = Trip::where('company_id', $companyId)
                    ->selectRaw('EXTRACT(MONTH FROM created_at) as period, COUNT(*) as value')
                    ->whereYear('created_at', $year)
                    ->groupBy('period')
                    ->orderBy('period')
                    ->pluck('value', 'period')
                    ->toArray();

                $data['expenses'] = Expense::where('company_id', $companyId)
                    ->selectRaw('EXTRACT(MONTH FROM expense_date) as period, SUM(amount) as value')
                    ->whereYear('expense_date', $year)
                    ->groupBy('period')
                    ->orderBy('period')
                    ->pluck('value', 'period')
                    ->toArray();
                break;

            case 'weekly':
                $data['trips'] = Trip::where('company_id', $companyId)
                    ->selectRaw('EXTRACT(WEEK FROM created_at) as period, COUNT(*) as value')
                    ->whereYear('created_at', $year)
                    ->groupBy('period')
                    ->orderBy('period')
                    ->pluck('value', 'period')
                    ->toArray();
                break;
        }

        return response()->json($data);
    }
}
