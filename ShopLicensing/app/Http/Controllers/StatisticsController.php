<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function getStats()
    {
        $weekLicenses = DB::table('shoplicenses')
            ->whereDate('created_at', '>=', now()->subWeek())
            ->count();

        $monthLicenses = DB::table('shoplicenses')
            ->whereMonth('created_at', now()->month)
            ->count();

        $yearLicenses = DB::table('shoplicenses')
            ->whereYear('created_at', now()->year)
            ->count();

        // Prepare data for pie chart
        $labels = ['This Week', 'This Month', 'This Year'];
        $data = [$weekLicenses, $monthLicenses, $yearLicenses];

        // Prepare data for bar graph
        $barLabels = ['Week', 'Month', 'Year'];
        $barData = [$weekLicenses, $monthLicenses, $yearLicenses];

        return response()->json([
            'pieChartData' => [
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => 'Licenses',
                        'data' => $data,
                        'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56'],
                    ],
                ],
            ],
            'barChartData' => [
                'labels' => $barLabels,
                'datasets' => [
                    [
                        'label' => 'Licenses',
                        'data' => $barData,
                        'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56'],
                    ],
                ],
            ],
        ]);
    }
}
