<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SixteenB;
class SixteenController extends Controller
{
    public function showQuestionSixteenReport()
{
    $data_sixteen = SixteenB::all(); 

    // ক্যাটাগরি লিস্ট অ্যারেই
    $category_lists = [
        1 => 'Social Worker',
        2 => 'Police',
        3 => 'BGB',
        4 => 'Coastguard',
        5 => 'VDP',
        6 => 'Rail Police',
        7 => 'Judiciary',
        8 => 'NGO',
        9 => 'Others'
    ];

    $total_men = $data_sixteen->sum('men_q16');
    $total_women = $data_sixteen->sum('women_q16');
    $grand_total = $data_sixteen->sum('total_q16');

    if ($grand_total == 0) {
        $grand_total = $total_men + $total_women;
    }

    $men_percentage = $grand_total > 0 ? round(($total_men / $grand_total) * 100, 2) : 0;
    $women_percentage = $grand_total > 0 ? round(($total_women / $grand_total) * 100, 2) : 0;

    return view('reports.question_sixteen', compact(
        'data_sixteen', 
        'category_lists',
        'total_men', 
        'total_women', 
        'grand_total', 
        'men_percentage', 
        'women_percentage'
    ));
}
}