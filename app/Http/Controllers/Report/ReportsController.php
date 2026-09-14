<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionTitle;
use App\Models\One;
use App\Models\Two;
use App\Models\Three;
class ReportsController extends Controller
{
    public function ReportSummary()
    {
        $questiontitles = QuestionTitle::orderBy('id')->get();

        $status1_count = One::where('supreme_court_title', 1)->where('supreme_court_status', 1)->count();
        $status2_count = One::where('supreme_court_title', 1)->where('supreme_court_status', 2)->count();
        $grand_total = $status1_count + $status2_count;

        $status1_percentage = $grand_total > 0 ? round(($status1_count / $grand_total) * 100, 2) : 0;
        $status2_percentage = $grand_total > 0 ? round(($status2_count / $grand_total) * 100, 2) : 0;

        $data_sixteen = One::where('supreme_court_title', 1)->whereIn('supreme_court_status', [1, 2])->get();

        
        // 2. 
        $q2_cond1_total = Two::where('government_nationality_q2', 1)
                            ->where('government_sector_q2', 2)
                            ->sum('government_total_q2');

        // ২. Cuban National (2) + Medical Workers (2)
        $q2_cond2_total = Two::where('government_nationality_q2', 2)
                            ->where('government_sector_q2', 2)
                            ->sum('government_total_q2');

        // ৩. North Korean National (3) + Private Sector (10)
        $q2_cond3_total = Two::where('government_nationality_q2', 3)
                            ->where('government_sector_q2', 10)
                            ->sum('government_total_q2');

        // Grand Total Calculation
        $q2_grand_total = $q2_cond1_total + $q2_cond2_total + $q2_cond3_total;

        // Percentage Calculation (Question 1-এর মতো)
        $q2_cond1_percentage = $q2_grand_total > 0 ? round(($q2_cond1_total / $q2_grand_total) * 100, 2) : 0;
        $q2_cond2_percentage = $q2_grand_total > 0 ? round(($q2_cond2_total / $q2_grand_total) * 100, 2) : 0;
        $q2_cond3_percentage = $q2_grand_total > 0 ? round(($q2_cond3_total / $q2_grand_total) * 100, 2) : 0;

        // Detailed Table Data Filter
        $q2_data = Two::where(function($query) {
                        $query->where('government_nationality_q2', 1)->where('government_sector_q2', 2);
                    })
                    ->orWhere(function($query) {
                        $query->where('government_nationality_q2', 2)->where('government_sector_q2', 2);
                    })
                    ->orWhere(function($query) {
                        $query->where('government_nationality_q2', 3)->where('government_sector_q2', 10);
                    })
                    ->get();

         //3
         $q3_cond1_total = Three::where('purpose_q3', 1)->where('technology_q3', 1)->count();
    $q3_cond2_total = Three::where('purpose_q3', 2)->where('technology_q3', 2)->count();
    $q3_cond3_total = Three::where('purpose_q3', 3)->where('technology_q3', 3)->count();
    $q3_cond4_total = Three::where('purpose_q3', 4)->where('technology_q3', 4)->count();
    $q3_cond5_total = Three::where('purpose_q3', 5)->where('technology_q3', 5)->count();
    $q3_cond6_total = Three::where('purpose_q3', 6)->where('technology_q3', 6)->count();

    // Grand Total
    $q3_grand_total = $q3_cond1_total + $q3_cond2_total + $q3_cond3_total + $q3_cond4_total + $q3_cond5_total + $q3_cond6_total;

    // Percentage Calculation
    $q3_cond1_percentage = $q3_grand_total > 0 ? round(($q3_cond1_total / $q3_grand_total) * 100, 2) : 0;
    $q3_cond2_percentage = $q3_grand_total > 0 ? round(($q3_cond2_total / $q3_grand_total) * 100, 2) : 0;
    $q3_cond3_percentage = $q3_grand_total > 0 ? round(($q3_cond3_total / $q3_grand_total) * 100, 2) : 0;
    $q3_cond4_percentage = $q3_grand_total > 0 ? round(($q3_cond4_total / $q3_grand_total) * 100, 2) : 0;
    $q3_cond5_percentage = $q3_grand_total > 0 ? round(($q3_cond5_total / $q3_grand_total) * 100, 2) : 0;
    $q3_cond6_percentage = $q3_grand_total > 0 ? round(($q3_cond6_total / $q3_grand_total) * 100, 2) : 0;

    // Table এর জন্য Filtered Data Fetching
    $q3_data = Three::where(function($query) {
                    $query->where('purpose_q3', 1)->where('technology_q3', 1);
                })
                ->orWhere(function($query) { $query->where('purpose_q3', 2)->where('technology_q3', 2); })
                ->orWhere(function($query) { $query->where('purpose_q3', 3)->where('technology_q3', 3); })
                ->orWhere(function($query) { $query->where('purpose_q3', 4)->where('technology_q3', 4); })
                ->orWhere(function($query) { $query->where('purpose_q3', 5)->where('technology_q3', 5); })
                ->orWhere(function($query) { $query->where('purpose_q3', 6)->where('technology_q3', 6); })
                ->get();           
        
        
        return view('reports.list', compact(
            'questiontitles',
            'data_sixteen',
            'status1_count',
            'status2_count',
            'grand_total',
            'status1_percentage',
            'status2_percentage',
            // Question 2 Variables
            'q2_data',
            'q2_cond1_total',
            'q2_cond2_total',
            'q2_cond3_total',
            'q2_cond1_percentage',
            'q2_cond2_percentage',
            'q2_cond3_percentage',
            'q2_grand_total',
            //3
            'q3_data',
           'q3_cond1_total', 
           'q3_cond2_total', 
           'q3_cond3_total', 
           'q3_cond4_total',
           'q3_cond5_total',
           'q3_cond6_total',
           'q3_cond1_percentage',
           'q3_cond2_percentage', 
           'q3_cond3_percentage', 
           'q3_cond4_percentage', 
           'q3_cond5_percentage', 
           'q3_cond6_percentage',
          'q3_grand_total'
        
        ));
    }
}