<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\One;
class SixteenController extends Controller
{
    public function getSupremeCourtChart()
    {
        // Category List Mapping (যদি Blade-এ প্রয়োজন হয়)
        $category_lists = [
            '1' => 'Category 1',
            '2' => 'Category 2',
        ];

        // Table Data (Supreme Court Status logic অনুযায়ী)
        $data_sixteen = One::where('supreme_court_title', 1)
            ->whereIn('supreme_court_status', [1, 2])
            ->get();

        // Status Counts
        $status1_count = One::where('supreme_court_title', 1)->where('supreme_court_status', 1)->count();
        $status2_count = One::where('supreme_court_title', 1)->where('supreme_court_status', 2)->count();

        // Grand Total Calculation
        $grand_total = $status1_count + $status2_count;

        // Percentage Calculation (Division by zero হ্যান্ডেল করা হয়েছে)
        $status1_percentage = $grand_total > 0 ? round(($status1_count / $grand_total) * 100, 2) : 0;
        $status2_percentage = $grand_total > 0 ? round(($status2_count / $grand_total) * 100, 2) : 0;

        return view('reports.question_sixteen', compact(
            'data_sixteen',
            'category_lists',
            'status1_count',
            'status2_count',
            'grand_total',
            'status1_percentage',
            'status2_percentage'
        ));
    }
}