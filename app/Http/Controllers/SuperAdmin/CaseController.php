<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CaseModel;
use App\Models\SituationPreventionYesNo;
use App\Models\QuestionTitle;
use App\Models\Distric;
use App\Models\ThiryOne;
use App\Models\Thirty;
use App\Models\One;
use App\Models\Two;
use App\Models\OneB;
use App\Models\Three;
use App\Models\Four;
use App\Models\Five;
use App\Models\Six;
use App\Models\ThirteenA;
use App\Models\ThirteenB;
use App\Models\ThirteenC;
use App\Models\ThirteenD;
use App\Models\Ten;
use App\Models\Eleven;
use App\Models\Fifteen;
use App\Models\Sixteen;
use App\Models\Eighteen;
use App\Models\Nineteen;
use App\Models\Twenty;
use App\Models\TwentyThree;
use App\Models\TwentyEight;
use App\Models\FiftyThree;
use App\Models\FiftyFour;
use App\Models\FiftyFive;
use App\Models\FiftySeven;
use App\Models\FiftyNine;
use App\Models\Sixty;
use App\Models\SixtyThree;
use App\Models\Seven;
use App\Models\Eight;
use App\Models\Fifty;
use App\Models\FiftyOne;
use App\Models\FiftyTwo;
use App\Models\FortyFive;
use App\Models\FortyFour;
use App\Models\FortyNine;
use App\Models\FortySeven;
use App\Models\FourA;
use App\Models\FourB;
use App\Models\Fourteen;
use App\Models\Nine;
use App\Models\Seventeen;
use App\Models\Twelve;
use App\Models\TwelveB;
use App\Models\TwelveC;
use App\Models\TwelveD;
use App\Models\TwentyFour;
use App\Models\TwentyOne;
use App\Models\TwentyTwo;
use App\Models\Twentya;
use App\Models\Twentyb;
use App\Models\FortySix;
use App\Models\ThirtyThree;

//new database design
use DB;
use Illuminate\Support\Facades\Session as FacadesSession;

use Spatie\Permission\Models\Role;
use Session;
use Barryvdh\DomPDF\Facade\Pdf;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
class CaseController extends Controller
{


    public function create()
    {

        $data['header_title'] = 'Create Data ';

        $questiontitles = QuestionTitle::orderBy('id')->get();
        //return response()->json($questiontitles);
        $districs = Distric::all();
        //dd($questiontitles);
        //dd($questiontitles);
        //return response()->json($questiontitles);

        //dd($questiontitles); 
        


        

     

        //dd($question6);
        return view('superadmin.case.create', $data, compact('questiontitles', 'districs'));
    }

    public function Store(Request $request)
    {





        $question = new CaseModel();
        $question->user_id = Auth()->user()->id;
        $question->caseid = $request->caseid;
        $question->save();

        $case_id = $question->id;
        $yes_no = new SituationPreventionYesNo();
        $yes_no->case_id = $case_id;

        $yes_no->is_involved_directly_trafficking_2q = $request->is_involved_directly_trafficking_2q;
        $yes_no->others_involved_directly_trafficking_2q = $request->others_involved_directly_trafficking_2q;
        $yes_no->is_forced_labor_q3 = $request->is_forced_labor_q3;
        $yes_no->others_forced_labor_q3 = $request->others_forced_labor_q3;
        $yes_no->is_crime_justice_q4 = $request->is_crime_justice_q4;
        $yes_no->others_crime_justice_q4 = $request->others_crime_justice_q4;



        $yes_no->is_formal_written_procedures_15q = $request->is_formal_written_procedures_15q;
        $yes_no->others_formal_written_procedures_15q = $request->others_formal_written_procedures_15q;
        $yes_no->is_victim_identification_protocol_16q = $request->is_victim_identification_protocol_16q;
        $yes_no->others_victim_identification_protocol_16q = $request->others_victim_identification_protocol_16q;
        $yes_no->is_trafficking_among_risk_population_18q = $request->is_trafficking_among_risk_population_18q;
        $yes_no->others_trafficking_among_risk_population_18q = $request->others_trafficking_among_risk_population_18q;
        $yes_no->is_sex_trafficking_forced_labor_country_19q = $request->is_sex_trafficking_forced_labor_country_19q;
        $yes_no->others_sex_trafficking_forced_labor_country_19q = $request->others_sex_trafficking_forced_labor_country_19q;
        $yes_no->is_trafficking_victims_services_20q = $request->is_trafficking_victims_services_20q;
        $yes_no->others_trafficking_victims_services_20q = $request->others_trafficking_victims_services_20q;
        $yes_no->is_complicit_official_q23 = $request->is_complicit_official_q23;
        $yes_no->others_complicit_official_q23 = $request->others_complicit_official_q23;
        
        
        $yes_no->is_speak_law_enforcement_23q = $request->is_speak_law_enforcement_23q;
        $yes_no->others_speak_law_enforcement_23q = $request->others_speak_law_enforcement_23q;
        $yes_no->is_victim_centered_approach_28q = $request->is_victim_centered_approach_28q;
        $yes_no->others_victim_centered_approach_28q = $request->others_victim_centered_approach_28q;
        $yes_no->is_vots_received_assistance_53q = $request->is_vots_received_assistance_53q;
        $yes_no->others_vots_received_assistance_53q = $request->others_vots_received_assistance_53q;
        $yes_no->is_ministry_agency_organization_54q = $request->is_ministry_agency_organization_54q;
        $yes_no->others_ministry_agency_organization_54q = $request->others_ministry_agency_organization_54q;
        $yes_no->is_ministry_agency_organization_ctc_55q = $request->is_ministry_agency_organization_ctc_55q;
        $yes_no->others_ministry_agency_organization_ctc_55q = $request->others_ministry_agency_organization_ctc_55q;
        $yes_no->is_devote_implementation_q57 = $request->is_devote_implementation_q57;
        $yes_no->is_governments_on_trafficking_q60 = $request->is_governments_on_trafficking_q60;
       
        $yes_no->is_official_allocation_review_q8 = $request->is_official_allocation_review_q8;
        $yes_no->other_official_allocation_review_q8 = $request->other_official_allocation_review_q8;
        $yes_no->is_adequately_jurisdicticon_q9 = $request->is_adequately_jurisdicticon_q9;
        $yes_no->other_adequately_jurisdition_q9 = $request->other_adequately_jurisdition_q9;
        $yes_no->is_government_conduct_awareness_activities_q46 = $request->is_government_conduct_awareness_activities_q46;
        $yes_no->other_government_conduct_awareness_activities_q46 = $request->other_government_conduct_awareness_activities_q46;
        $yes_no->is_describe_government_operated_q20 = $request->is_describe_government_operated_q20;
        $yes_no->other_describe_government_operated_q20 = $request->other_describe_government_operated_q20;


        //new question solved

        $yes_no->is_supreme_court_q1 = $request->is_supreme_court_q1;
        $yes_no->others_supreme_court_q1 = $request->others_supreme_court_q1;
        $yes_no->is_supreme_court_q4 = $request->is_supreme_court_q4;
        $yes_no->others_supreme_court_q4 = $request->others_supreme_court_q4;

        $yes_no->is_complicit_official_q5 = $request->is_complicit_official_q5;
        $yes_no->others_complicit_official_q5 = $request->others_complicit_official_q5;
        $yes_no->is_unit_court_q6 = $request->is_unit_court_q6;
        $yes_no->others_unit_court_q6 = $request->others_unit_court_q6;
        $yes_no->is_exclusively_dedicated_trafficking_q7 = $request->is_exclusively_dedicated_trafficking_q7;
        $yes_no->other_exclusively_dedicated_trafficking_q7 = $request->other_exclusively_dedicated_trafficking_q7;
        $yes_no->is_involved_directly_trafficking_8q = $request->is_involved_directly_trafficking_8q;
        $yes_no->other_involved_directly_trafficking_8q = $request->other_involved_directly_trafficking_8q;
        $yes_no->is_exclusively_trafficking_q9 = $request->is_exclusively_trafficking_q9;
        $yes_no->other_exclusively_trafficking_q9 = $request->other_exclusively_trafficking_q9;
        $yes_no->is_exclusively_trafficking_q10 = $request->is_exclusively_trafficking_q10;
        $yes_no->other_exclusively_trafficking_q10 = $request->other_exclusively_trafficking_q10;

        $yes_no->is_commercial_sex_demands_q51 = $request->is_commercial_sex_demands_q51;
        $yes_no->other_commercial_sex_demands_q51 = $request->other_commercial_sex_demands_q51;
        $yes_no->is_government_prosecute_deport_q52 = $request->is_government_prosecute_deport_q52;
        $yes_no->other_government_prosecute_deport_q52 = $request->other_government_prosecute_deport_q52;

        $yes_no->is_country_diplomats_allegedly_q54 = $request->is_country_diplomats_allegedly_q54;
        $yes_no->other_country_diplomats_allegedly_q54 = $request->other_country_diplomats_allegedly_q54;

        $yes_no->is_government_provide_trafficking_q55 = $request->is_government_provide_trafficking_q55;
        $yes_no->other_government_provide_trafficking_q55 = $request->other_government_provide_trafficking_q55;



        $yes_no->is_exploitative_treatment_q50 = $request->is_exploitative_treatment_q50;
        $yes_no->other_exploitative_treatment_q50 = $request->other_exploitative_treatment_q50;
        $yes_no->is_awareness_campaigns_research_projects_q44 = $request->is_awareness_campaigns_research_projects_q44;
        $yes_no->other_awareness_campaigns_research_projects_q44 = $request->other_awareness_campaigns_research_projects_q44;

        $yes_no->is_national_plan_trafficking_q45 = $request->is_national_plan_trafficking_q45;
        $yes_no->other_national_plan_trafficking_q45 = $request->other_national_plan_trafficking_q45;


        $yes_no->is_government_change_regulated_q47 = $request->is_government_change_regulated_q47;
        $yes_no->other_government_change_regulated_q47 = $request->other_government_change_regulated_q47;

        $yes_no->is_government_agreements_transparent_q49 = $request->is_government_agreements_transparent_q49;
        $yes_no->other_government_agreements_transparent_q49 = $request->other_government_agreements_transparent_q49;

        $yes_no->is_government_agreements_transparent_q11 = $request->is_government_agreements_transparent_q11;
        $yes_no->other_government_agreements_transparent_q11 = $request->other_government_agreements_transparent_q11;

        $yes_no->is_report_country_narrative_protection_q17 = $request->is_report_country_narrative_protection_q17;
        $yes_no->other_report_country_narrative_protection_q17 = $request->other_report_country_narrative_protection_q17;

        $yes_no->is_specialized_trafficking_victims_q24 = $request->is_specialized_trafficking_victims_q24;
        $yes_no->other_specialized_trafficking_victims_q24 = $request->other_specialized_trafficking_victims_q24;

        $yes_no->is_government_cooperate_foreign_counterparts_q12 = $request->is_government_cooperate_foreign_counterparts_q12;
        $yes_no->other_government_cooperate_foreign_counterparts_q12 = $request->other_government_cooperate_foreign_counterparts_q12;
        $yes_no->is_government_cooperate_foreign_counterparts_q13 = $request->is_government_cooperate_foreign_counterparts_q13;
        $yes_no->other_government_cooperate_foreign_counterparts_q13 = $request->other_government_cooperate_foreign_counterparts_q13;

        $yes_no->is_complicit_official_q33 = $request->is_complicit_official_q33;
        $yes_no->no_details_q33 = $request->no_details_q33;
        $yes_no->others_complicit_official_q33 = $request->others_complicit_official_q33;
        $yes_no->is_citizen_victims_abroad_q31 = $request->is_citizen_victims_abroad_q31;
        $yes_no->other_citizen_victims_abroad_q31 = $request->other_citizen_victims_abroad_q31;


        $yes_no->is_foreign_victims_q30 = $request->is_foreign_victims_q30;
        $yes_no->other_foreign_victims_q30 = $request->other_foreign_victims_q30;
        $yes_no->is_government_transparent_q2 = $request->is_government_transparent_q2;
        $yes_no->other_government_transparent_q2 = $request->other_government_transparent_q2;
        $yes_no->created_by = Auth()->user()->id;
        $yes_no->save();


        // question1
        if ($request->is_supreme_court_q1 != 0) {

            $supreme_court_title = $request->input('supreme_court_title', []);
            $supreme_court_status = $request->input('supreme_court_status', []);

            $images = [];
            if ($request->hasFile('supreme_court_image')) {
                foreach ($request->file('supreme_court_image') as $index => $image) {
                    $ext = $image->extension();
                    $final_name = 'supreme_court_image_' . time() . '_' . $index . '.' . $ext;
                    $image->move(public_path('uploads/supreme_court_image'), $final_name);
                    $images[] = 'uploads/supreme_court_image/' . $final_name;
                }
            }

            $case_id = $question->id;

            $bulkInsertData = [];
            $maxCount = max(
                count($supreme_court_title),
                count($supreme_court_status),
                count($images)
            );

            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'supreme_court_title' => $supreme_court_title[$i] ?? null,
                    'supreme_court_status' => $supreme_court_status[$i] ?? null,
                    'supreme_court_image' => $images[$i] ?? null,
                ];
            }

            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                One::insert($bulkInsertData);   // first insert

            }
        }
        $supreme_court_title_two = $request->input('supreme_court_title_two', []);
        $supreme_court_status_two = $request->input('supreme_court_status_two', []);

        $images = [];
        if ($request->hasFile('supreme_court_image_two')) {
            foreach ($request->file('supreme_court_image_two') as $index => $image) {
                $ext = $image->extension();
                $final_name = 'supreme_court_image_two_' . time() . '_' . $index . '.' . $ext;
                $image->move(public_path('uploads/supreme_court_image_two'), $final_name);
                $images[] = 'uploads/supreme_court_image_two/' . $final_name;
            }
        }

        $case_id = $question->id;

        $bulkInsertData = [];
        $maxCount = max(
            count($supreme_court_title_two),
            count($supreme_court_status_two),
            count($images)
        );

        for ($i = 0; $i < $maxCount; $i++) {
            $bulkInsertData[] = [
                'case_id' => $case_id,
                'supreme_court_title_two' => $supreme_court_title_two[$i] ?? null,
                'supreme_court_status_two' => $supreme_court_status_two[$i] ?? null,
                'supreme_court_image_two' => $images[$i] ?? null,
            ];
        }

        if (!empty($bulkInsertData)) {
            //return response()->json($bulkInsertData);
            OneB::insert($bulkInsertData);   // first insert

        }

        //question2

        if ($request->is_government_transparent_q2 != 0) {
    $government_nationality_q2 = $request->input('government_nationality_q2', []);
    $government_sector_q2 = $request->input('government_sector_q2', []);
    $government_total_q2 = $request->input('government_total_q2', []);
    $case_id = $question->id;
    
    $bulkInsertData = [];
    $maxCount = max(
        count($government_nationality_q2),
        count($government_sector_q2),
        count($government_total_q2)
    );

    for ($i = 0; $i < $maxCount; $i++) {
        $nationality = $government_nationality_q2[$i] ?? null;
        $sector = $government_sector_q2[$i] ?? null;
        $total = $government_total_q2[$i] ?? null;

        // সমাধান: শুধুমাত্র তখনই ডাটাবেজে ইনসার্ট হবে যদি ন্যাশনালিটি এবং সেক্টর দুটোই আইডি (সংখ্যা) হয়।
        // এর ফলে অন্য যেকোনো কোশ্চেনের টেক্সট ডেটা (যেমন: Online Scam, Facebook ইত্যাদি) নিজে থেকেই ফিল্টার হয়ে বাদ পড়ে যাবে।
        if (is_numeric($nationality) && is_numeric($sector)) {
            $bulkInsertData[] = [
                'case_id' => $case_id,
                'government_nationality_q2' => $nationality,
                'government_sector_q2' => $sector,
                'government_total_q2' => is_numeric($total) ? $total : 0, // টোটাল খালি বা নাল থাকলে ডিফল্ট ০ বসবে
            ];
        }
    }

    if (!empty($bulkInsertData)) {
        //return response()->json($bulkInsertData);
        Two::insert($bulkInsertData);
    }
}

        // question4
        if ($request->is_supreme_court_q4 != 0) {

            $supreme_court_title_q4 = $request->input('supreme_court_title_q4', []);
            $supreme_court_status_q4 = $request->input('supreme_court_status_q4', []);

            $images = [];
            if ($request->hasFile('supreme_court_image_q4')) {
                foreach ($request->file('supreme_court_image_q4') as $index => $image) {
                    $ext = $image->extension();
                    $final_name = 'supreme_court_image_q4_' . time() . '_' . $index . '.' . $ext;
                    $image->move(public_path('uploads/supreme_court_image_q4'), $final_name);
                    $images[] = 'uploads/supreme_court_image_q4/' . $final_name;
                }
            }

            $case_id = $question->id;

            $bulkInsertData = [];
            $maxCount = max(
                count($supreme_court_title_q4),
                count($supreme_court_status_q4),
                count($images)
            );

            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'supreme_court_title_q4' => $supreme_court_title_q4[$i] ?? null,
                    'supreme_court_status_q4' => $supreme_court_status_q4[$i] ?? null,
                    'supreme_court_image_q4' => $images[$i] ?? null,
                ];
            }

            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                FourA::insert($bulkInsertData);   // first insert

            }
        }
        $supreme_court_title_two_q4 = $request->input('supreme_court_title_two_q4', []);
        $supreme_court_status_two_q4 = $request->input('supreme_court_status_two_q4', []);

        $images = [];
        if ($request->hasFile('supreme_court_image_two_q4')) {
            foreach ($request->file('supreme_court_image_two_q4') as $index => $image) {
                $ext = $image->extension();
                $final_name = 'supreme_court_image_two_q4_' . time() . '_' . $index . '.' . $ext;
                $image->move(public_path('uploads/supreme_court_image_two_q4'), $final_name);
                $images[] = 'uploads/supreme_court_image_two_q4/' . $final_name;
            }
        }

        $case_id = $question->id;

        $bulkInsertData = [];
        $maxCount = max(
            count($supreme_court_title_two_q4),
            count($supreme_court_status_two_q4),
            count($images)
        );

        for ($i = 0; $i < $maxCount; $i++) {
            $bulkInsertData[] = [
                'case_id' => $case_id,
                'supreme_court_title_two_q4' => $supreme_court_title_two_q4[$i] ?? null,
                'supreme_court_status_two_q4' => $supreme_court_status_two_q4[$i] ?? null,
                'supreme_court_image_two_q4' => $images[$i] ?? null,
            ];
        }

        if (!empty($bulkInsertData)) {
            //return response()->json($bulkInsertData);
            FourB::insert($bulkInsertData);   // first insert

        }






        //question5
        if ($request->is_complicit_official_q5 != 0) {
            $case_id = $question->id;
            $question5 = new Five();
            $question5->case_id = $case_id;
            $question5->involved_directly_trafficking_title_q5 = $request->involved_directly_trafficking_title_q5;
            $question5->save();
        }

        //question33
        if ($request->is_complicit_official_q33 != 0) {
            $case_id = $question->id;
            $question33 = new ThirtyThree();
            $question33->case_id = $case_id;
            $question33->involved_directly_trafficking_title_q33 = $request->involved_directly_trafficking_title_q33;
            //return response()->json($question33);
            $question33->save();
        }
        
          //question23
        if ($request->is_complicit_official_q23 != 0) {
            $case_id = $question->id;
            $question23 = new TwentyThree();
            $question23->case_id = $case_id;
            $question23->involved_directly_trafficking_title_q23 = $request->involved_directly_trafficking_title_q23;
            $question23->save();
        }




        //question6
        $request->validate([
            'labor_men_q6.*' => 'nullable|numeric',
            'labor_women_q6.*' => 'nullable|numeric',
            'labor_total_q6.*' => 'nullable|numeric',

        ], [
            'labor_men_q6.*.numeric' => 'Please enter numeric data only.',
            'labor_women_q6.*.numeric' => 'Please enter numeric data only.',
            'labor_total_q6.*.numeric' => 'Please enter numeric data only.',

        ]);
        if ($request->is_unit_court_q6 != 0) {
            $labor_title_q6 = $request->input('labor_title_q6', []);
            $labor_men_q6 = $request->input('labor_men_q6', []);
            $labor_women_q6 = $request->input('labor_women_q6', []);
            $labor_total_q6 = $request->input('labor_total_q6', []);
            $labor_response_q6 = $request->input('labor_response_q6', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($labor_title_q6),
                count($labor_men_q6),
                count($labor_women_q6),
                count($labor_total_q6),
                count($labor_response_q6),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'labor_title_q6' => $labor_title_q6[$i] ?? null,
                    'labor_men_q6' => $labor_men_q6[$i] ?? null,
                    'labor_women_q6' => $labor_women_q6[$i] ?? null,
                    'labor_total_q6' => $labor_total_q6[$i] ?? null,
                    'labor_response_q6' => $labor_response_q6[$i] ?? null,

                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                Six::insert($bulkInsertData);
            }
        }

        //question7
        $request->validate([
            'justice_men_q7.*' => 'nullable|numeric',
            'justice_women_q7.*' => 'nullable|numeric',
            'justice_total_q7.*' => 'nullable|numeric',

        ], [
            'justice_men_q7.*.numeric' => 'Please enter numeric data only.',
            'justice_women_q7.*.numeric' => 'Please enter numeric data only.',
            'justice_total_q7.*.numeric' => 'Please enter numeric data only.',

        ]);
        if ($request->is_exclusively_dedicated_trafficking_q7 != 0) {
            $justice_title_q7 = $request->input('justice_title_q7', []);
            $justice_men_q7 = $request->input('justice_men_q7', []);
            $justice_women_q7 = $request->input('justice_women_q7', []);
            $justice_total_q7 = $request->input('justice_total_q7', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($justice_title_q7),
                count($justice_men_q7),
                count($justice_women_q7),
                count($justice_total_q7),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'justice_title_q7' => $justice_title_q7[$i] ?? null,
                    'justice_men_q7' => $justice_men_q7[$i] ?? null,
                    'justice_women_q7' => $justice_women_q7[$i] ?? null,
                    'justice_total_q7' => $justice_total_q7[$i] ?? null,

                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                Seven::insert($bulkInsertData);
            }
        }

        //  question8
        $request->validate([
            'official_investigation_q8.*' => 'nullable|numeric',
            'official_prosecution_q8.*' => 'nullable|numeric',
            'official_conviction_q8.*' => 'nullable|numeric',
            'official_administrative_q8.*' => 'nullable|numeric',
        ], [
            'official_investigation_q8.*.numeric' => 'Please enter numeric data only.',
            'official_prosecution_q8.*.numeric' => 'Please enter numeric data only.',
            'official_conviction_q8.*.numeric' => 'Please enter numeric data only.',
            'official_administrative_q8.*.numeric' => 'Please enter numeric data only.',

        ]);
        if ($request->is_involved_directly_trafficking_8q != 0) {
            $official_title_q8 = $request->input('official_title_q8', []);
            $official_investigation_q8 = $request->input('official_investigation_q8', []);
            $official_prosecution_q8 = $request->input('official_prosecution_q8', []);
            $official_conviction_q8 = $request->input('official_conviction_q8', []);
            $official_administrative_q8 = $request->input('official_administrative_q8', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($official_title_q8),
                count($official_investigation_q8),
                count($official_prosecution_q8),
                count($official_conviction_q8),
                count($official_administrative_q8),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'official_title_q8' => $official_title_q8[$i] ?? null,
                    'official_investigation_q8' => $official_investigation_q8[$i] ?? null,
                    'official_prosecution_q8' => $official_prosecution_q8[$i] ?? null,
                    'official_conviction_q8' => $official_conviction_q8[$i] ?? null,
                    'official_administrative_q8' => $official_administrative_q8[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {

                //return response()->json($bulkInsertData);
                Eight::insert($bulkInsertData);
            }
        }


        //question9
        if ($request->is_exclusively_trafficking_q9 != 0) {
            $court_title_q9 = $request->input('court_title_q9', []);
            $court_type_q9 = $request->input('court_type_q9', []);
            $court_description_q9 = $request->input('court_description_q9', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($court_title_q9),
                count($court_type_q9),
                count($court_description_q9),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'court_title_q9' => $court_title_q9[$i] ?? null,
                    'court_type_q9' => $court_type_q9[$i] ?? null,
                    'court_description_q9' => $court_description_q9[$i] ?? null,

                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                Nine::insert($bulkInsertData);
            }
        }

        //question10
        if ($request->is_exclusively_trafficking_q10 != 0) {
            $court_title_q10 = $request->input('court_title_q10', []);
            $court_type_q10 = $request->input('court_type_q10', []);
            $court_description_q10 = $request->input('court_description_q10', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($court_title_q10),
                count($court_type_q10),
                count($court_description_q10),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'court_title_q10' => $court_title_q10[$i] ?? null,
                    'court_type_q10' => $court_type_q10[$i] ?? null,
                    'court_description_q10' => $court_description_q10[$i] ?? null,

                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                Ten::insert($bulkInsertData);
            }
        }

        //question11
        $request->validate([
            'government_agreements_transparent_total_q11.*' => 'nullable|numeric',
        ], [
            'government_agreements_transparent_total_q11.*.numeric' => 'Please enter numeric data only.',

        ]);
        if ($request->is_government_agreements_transparent_q11 != 0) {
            $government_agreements_transparent_country_q11 = $request->input('government_agreements_transparent_country_q11', []);
            $government_agreements_transparent_status_q11 = $request->input('government_agreements_transparent_status_q11', []);
            $government_agreements_transparent_total_q11 = $request->input('government_agreements_transparent_total_q11', []);

            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($government_agreements_transparent_country_q11),
                count($government_agreements_transparent_status_q11),
                count($government_agreements_transparent_total_q11),


            );

            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_agreements_transparent_country_q11' => $government_agreements_transparent_country_q11[$i] ?? null,
                    'government_agreements_transparent_status_q11' => $government_agreements_transparent_status_q11[$i] ?? null,
                    'government_agreements_transparent_total_q11' => $government_agreements_transparent_total_q11[$i] ?? null,

                ];
            }

            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                Eleven::insert($bulkInsertData);
            }
        }

        //  question12
        $request->validate([
            'government_cooperate_foreign_counterparts_sex_trafficking_q12.*' => 'nullable|numeric',
            'government_cooperate_foreign_counterparts_labour_trafficking_q12.*' => 'nullable|numeric',
            'government_cooperate_foreign_counterparts_other_trafficking_q12.*' => 'nullable|numeric',
            'government_cooperate_foreign_counterparts_total_trafficking_q12.*' => 'nullable|numeric',
        ], [
            'government_cooperate_foreign_counterparts_sex_trafficking_q12.*.numeric' => 'Please enter numeric data only.',
            'government_cooperate_foreign_counterparts_labour_trafficking_q12.*.numeric' => 'Please enter numeric data only.',
            ' government_cooperate_foreign_counterparts_other_trafficking_q12.*.numeric' => 'Please enter numeric data only.',
            'government_cooperate_foreign_counterparts_total_trafficking_q12.*.numeric' => 'Please enter numeric data only.',

        ]);
        if ($request->is_government_cooperate_foreign_counterparts_q12 != 0) {
            $government_cooperate_foreign_counterparts_country_q12 = $request->input('government_cooperate_foreign_counterparts_country_q12', []);
            $government_cooperate_foreign_counterparts_sex_trafficking_q12 = $request->input('government_cooperate_foreign_counterparts_sex_trafficking_q12', []);
            $government_cooperate_foreign_counterparts_labour_trafficking_q12 = $request->input('government_cooperate_foreign_counterparts_labour_trafficking_q12', []);
            $government_cooperate_foreign_counterparts_other_trafficking_q12 = $request->input('government_cooperate_foreign_counterparts_other_trafficking_q12', []);
            $government_cooperate_foreign_counterparts_total_trafficking_q12 = $request->input('government_cooperate_foreign_counterparts_total_trafficking_q12', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($government_cooperate_foreign_counterparts_country_q12),
                count($government_cooperate_foreign_counterparts_sex_trafficking_q12),
                count($government_cooperate_foreign_counterparts_labour_trafficking_q12),
                count($government_cooperate_foreign_counterparts_other_trafficking_q12),
                count($government_cooperate_foreign_counterparts_total_trafficking_q12),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_cooperate_foreign_counterparts_country_q12' => $government_cooperate_foreign_counterparts_country_q12[$i] ?? null,
                    'government_cooperate_foreign_counterparts_sex_trafficking_q12' => $government_cooperate_foreign_counterparts_sex_trafficking_q12[$i] ?? null,
                    'government_cooperate_foreign_counterparts_labour_trafficking_q12' => $government_cooperate_foreign_counterparts_labour_trafficking_q12[$i] ?? null,
                    'government_cooperate_foreign_counterparts_other_trafficking_q12' => $government_cooperate_foreign_counterparts_other_trafficking_q12[$i] ?? null,
                    'government_cooperate_foreign_counterparts_total_trafficking_q12' => $government_cooperate_foreign_counterparts_total_trafficking_q12[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {

                //return response()->json($bulkInsertData);
                Twelve::insert($bulkInsertData);
            }
            //twelveb
            $government_country_q12b = $request->input('government_country_q12b', []);
            $government_sex_trafficking_q12b = $request->input('government_sex_trafficking_q12b', []);
            $government_labour_trafficking_q12b = $request->input('government_labour_trafficking_q12b', []);
            $government_other_trafficking_q12b = $request->input('government_other_trafficking_q12b', []);
            $government_total_trafficking_q12b = $request->input('government_total_trafficking_q12b', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($government_country_q12b),
                count($government_sex_trafficking_q12b),
                count($government_labour_trafficking_q12b),
                count($government_other_trafficking_q12b),
                count($government_total_trafficking_q12b),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_country_q12b' => $government_country_q12b[$i] ?? null,
                    'government_sex_trafficking_q12b' => $government_sex_trafficking_q12b[$i] ?? null,
                    'government_labour_trafficking_q12b' => $government_labour_trafficking_q12b[$i] ?? null,
                    'government_other_trafficking_q12b' => $government_other_trafficking_q12b[$i] ?? null,
                    'government_total_trafficking_q12b' => $government_total_trafficking_q12b[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {

                //return response()->json($bulkInsertData);
                TwelveB::insert($bulkInsertData);
            }
            //twelvec
            $government_country_q12c = $request->input('government_country_q12c', []);
            $government_sex_trafficking_q12c = $request->input('government_sex_trafficking_q12c', []);
            $government_labour_trafficking_q12c= $request->input('government_labour_trafficking_q12c', []);
            $government_other_trafficking_q12c = $request->input('government_other_trafficking_q12c', []);
            $government_total_trafficking_q12c = $request->input('government_total_trafficking_q12c', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($government_country_q12c),
                count($government_sex_trafficking_q12c),
                count($government_labour_trafficking_q12c),
                count($government_other_trafficking_q12c),
                count($government_total_trafficking_q12c),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_country_q12c' => $government_country_q12c[$i] ?? null,
                    'government_sex_trafficking_q12c' => $government_sex_trafficking_q12c[$i] ?? null,
                    'government_labour_trafficking_q12c' => $government_labour_trafficking_q12c[$i] ?? null,
                    'government_other_trafficking_q12c' => $government_other_trafficking_q12c[$i] ?? null,
                    'government_total_trafficking_q12c' => $government_total_trafficking_q12c[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {

                //return response()->json($bulkInsertData);
                TwelveC::insert($bulkInsertData);
            }

            //twelved
            $government_country_q12d = $request->input('government_country_q12d', []);
            $government_sex_trafficking_q12d = $request->input('government_sex_trafficking_q12d', []);
            $government_labour_trafficking_q12d= $request->input('government_labour_trafficking_q12d', []);
            $government_other_trafficking_q12d = $request->input('government_other_trafficking_q12d', []);
            $government_total_trafficking_q12d = $request->input('government_total_trafficking_q12d', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($government_country_q12d),
                count($government_sex_trafficking_q12d),
                count($government_labour_trafficking_q12d),
                count($government_other_trafficking_q12d),
                count($government_total_trafficking_q12d),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_country_q12d' => $government_country_q12d[$i] ?? null,
                    'government_sex_trafficking_q12d' => $government_sex_trafficking_q12d[$i] ?? null,
                    'government_labour_trafficking_q12d' => $government_labour_trafficking_q12d[$i] ?? null,
                    'government_other_trafficking_q12d' => $government_other_trafficking_q12d[$i] ?? null,
                    'government_total_trafficking_q12d' => $government_total_trafficking_q12d[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {

                //return response()->json($bulkInsertData);
                TwelveD::insert($bulkInsertData);
            }
        }
        
        
        //question13
        if ($request->is_government_cooperate_foreign_counterparts_q13 != 0) {
            //a
            $government_country_q13a = $request->input('government_country_q13a', []);
            $government_sex_q13a = $request->input('government_sex_q13a', []);
            $government_labour_q13a = $request->input('government_labour_q13a', []);
            $government_other_q13a = $request->input('government_other_q13a', []);
            $government_total_q13a = $request->input('government_total_q13a', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($government_country_q13a),
                count($government_sex_q13a),
                count($government_labour_q13a),
                count($government_other_q13a),
                count($government_total_q13a),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_country_q13a' => $government_country_q13a[$i] ?? null,
                    'government_sex_q13a' => $government_sex_q13a[$i] ?? null,
                    'government_labour_q13a' => $government_labour_q13a[$i] ?? null,
                    'government_other_q13a' => $government_other_q13a[$i] ?? null,
                    'government_total_q13a' => $government_total_q13a[$i] ?? null,

                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                ThirteenA::insert($bulkInsertData);
            }
            //b
            $government_country_q13b = $request->input('government_country_q13b', []);
            $government_sex_q13b = $request->input('government_sex_q13b', []);
            $government_labour_q13b = $request->input('government_labour_q13b', []);
            $government_other_q13b = $request->input('government_other_q13b', []);
            $government_total_q13b = $request->input('government_total_q13b', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($government_country_q13b),
                count($government_sex_q13b),
                count($government_labour_q13b),
                count($government_other_q13b),
                count($government_total_q13b),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_country_q13b' => $government_country_q13b[$i] ?? null,
                    'government_sex_q13b' => $government_sex_q13b[$i] ?? null,
                    'government_labour_q13b' => $government_labour_q13b[$i] ?? null,
                    'government_other_q13b' => $government_other_q13b[$i] ?? null,
                    'government_total_q13b' => $government_total_q13b[$i] ?? null,

                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                ThirteenB::insert($bulkInsertData);
            }

            //c

            $government_country_q13c = $request->input('government_country_q13c', []);
            $government_sex_q13c = $request->input('government_sex_q13c', []);
            $government_labour_q13c = $request->input('government_labour_q13c', []);
            $government_other_q13c = $request->input('government_other_q13c', []);
            $government_total_q13c = $request->input('government_total_q13c', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($government_country_q13c),
                count($government_sex_q13c),
                count($government_labour_q13c),
                count($government_other_q13c),
                count($government_total_q13c),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_country_q13c' => $government_country_q13c[$i] ?? null,
                    'government_sex_q13c' => $government_sex_q13c[$i] ?? null,
                    'government_labour_q13c' => $government_labour_q13c[$i] ?? null,
                    'government_other_q13c' => $government_other_q13c[$i] ?? null,
                    'government_total_q13c' => $government_total_q13c[$i] ?? null,

                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                ThirteenC::insert($bulkInsertData);
            }
            //d

            $government_country_q13d = $request->input('government_country_q13d', []);
            $government_sex_q13d = $request->input('government_sex_q13d', []);
            $government_labour_q13d = $request->input('government_labour_q13d', []);
            $government_other_q13d = $request->input('government_other_q13d', []);
            $government_total_q13d = $request->input('government_total_q13d', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($government_country_q13d),
                count($government_sex_q13d),
                count($government_labour_q13d),
                count($government_other_q13d),
                count($government_total_q13d),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_country_q13d' => $government_country_q13d[$i] ?? null,
                    'government_sex_q13d' => $government_sex_q13d[$i] ?? null,
                    'government_labour_q13d' => $government_labour_q13d[$i] ?? null,
                    'government_other_q13d' => $government_other_q13d[$i] ?? null,
                    'government_total_q13d' => $government_total_q13d[$i] ?? null,

                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                ThirteenD::insert($bulkInsertData);
            }
        }

        //question14
        if ($request->is_government_devote_implement_q14 != 0) {
            $original_approach_q14 = $request->input('original_approach_q14', []);
            $description_change_q14 = $request->input('description_change_q14', []);
            $images = [];
            if ($request->hasFile('document_upload_q14')) {
                foreach ($request->file('document_upload_q14') as $index => $image) {
                    $ext = $image->extension();
                    $final_name = 'document_upload_q14_' . time() . '_' . $index . '.' . $ext;
                    $image->move(public_path('uploads/document_upload_q14'), $final_name);
                    $images[] = 'uploads/document_upload_q14/' . $final_name;
                }
            }
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(count($original_approach_q14), count($description_change_q14), count($images));

            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'original_approach_q14' => $original_approach_q14[$i] ?? null, // Use null coalescing operator to handle missing indices
                    'description_change_q14' => $description_change_q14[$i] ?? null,
                    'document_upload_q14' => $images[$i] ?? null,

                ];
            }

            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                Fourteen::insert($bulkInsertData);
            }
        }





        //question16
        if ($request->is_victim_identification_protocol_16q != 0) {
            $main_document = $request->input('main_document', []);
            $description_change = $request->input('description_change', []);


            $images = [];
            if ($request->hasFile('document_image_q16')) {
                foreach ($request->file('document_image_q16') as $index => $image) {
                    $ext = $image->extension();
                    $final_name = 'document_image_q16_' . time() . '_' . $index . '.' . $ext;
                    $image->move(public_path('uploads/document_image_q16'), $final_name);
                    $images[] = 'uploads/document_image_q16/' . $final_name;
                }
            }

            $case_id = $question->id;

            $bulkInsertData = [];
            $maxCount = max(count($main_document), count($description_change), count($images));

            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'main_document' => $main_document[$i] ?? null,
                    'description_change' => $description_change[$i] ?? null,
                    'document_image_q16' => $images[$i] ?? null,
                ];
            }



            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                Sixteen::insert($bulkInsertData);
            }
        }


        //question17
        $request->validate([
            'report_country_narrative_protection_men_q17.*' => 'nullable|numeric',
            'report_country_narrative_protection_women_q17.*' => 'nullable|numeric',
            'report_country_narrative_protection_tg_q17.*' => 'nullable|numeric',
            'report_country_narrative_protection_total_q17.*' => 'nullable|numeric',
        ], [
            'report_country_narrative_protection_men_q17.*.numeric' => 'Please enter numeric data only.',
            'report_country_narrative_protection_women_q17.*.numeric' => 'Please enter numeric data only.',
            'report_country_narrative_protection_tg_q17.*.numeric' => 'Please enter numeric data only.',
            'report_country_narrative_protection_total_q17.*.numeric' => 'Please enter numeric data only.',

        ]);
        if ($request->is_report_country_narrative_protection_q17 != 0) {
            $report_country_narrative_protection_title_q17 = $request->input('report_country_narrative_protection_title_q17', []);
            $report_country_narrative_protection_description_q17 = $request->input('report_country_narrative_protection_description_q17', []);
            $report_country_narrative_protection_men_q17 = $request->input('report_country_narrative_protection_men_q17', []);
            $report_country_narrative_protection_women_q17 = $request->input('report_country_narrative_protection_women_q17', []);
            $report_country_narrative_protection_tg_q17 = $request->input('report_country_narrative_protection_tg_q17', []);
            $report_country_narrative_protection_total_q17 = $request->input('report_country_narrative_protection_total_q17', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($report_country_narrative_protection_title_q17),
                count($report_country_narrative_protection_description_q17),
                count($report_country_narrative_protection_men_q17),
                count($report_country_narrative_protection_women_q17),
                count($report_country_narrative_protection_tg_q17),
                count($report_country_narrative_protection_total_q17),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'report_country_narrative_protection_title_q17' => $report_country_narrative_protection_title_q17[$i] ?? null,
                    'report_country_narrative_protection_description_q17' => $report_country_narrative_protection_description_q17[$i] ?? null,
                    'report_country_narrative_protection_men_q17' => $report_country_narrative_protection_men_q17[$i] ?? null,
                    'report_country_narrative_protection_women_q17' => $report_country_narrative_protection_women_q17[$i] ?? null,
                    'report_country_narrative_protection_tg_q17' => $report_country_narrative_protection_tg_q17[$i] ?? null,
                    'report_country_narrative_protection_total_q17' => $report_country_narrative_protection_total_q17[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                Seventeen::insert($bulkInsertData);
            }
        }


        // question 18

        if ($request->is_trafficking_among_risk_population_18q != 0) {
            $type_vot = $request->input('type_vot', []);
            $type_vot_other = $request->input('type_vot_other', []);
            $men_18 = $request->input('men_18', []);
            $women_18 = $request->input('women_18', []);
            $third_gender_18 = $request->input('third_gender_18', []);
            $total_18 = $request->input('total_18', []);
            $protection_measures_taken = $request->input('protection_measures_taken', []);
            $preventive_measures_taken = $request->input('preventive_measures_taken', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($type_vot),
                count($type_vot_other),
                count($men_18),
                count($women_18),
                count($third_gender_18),
                count($total_18),
                count($protection_measures_taken),
                count($preventive_measures_taken),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'type_vot' => $type_vot[$i] ?? null,
                    'type_vot_other' => $type_vot_other[$i] ?? null,
                    'men_18' => $men_18[$i] ?? null,
                    'women_18' => $women_18[$i] ?? null,
                    'third_gender_18' => $third_gender_18[$i] ?? null,
                    'total_18' => $total_18[$i] ?? null,
                    'protection_measures_taken' => $protection_measures_taken[$i] ?? null,
                    'preventive_measures_taken' => $preventive_measures_taken[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                Eighteen::insert($bulkInsertData);
            }
        }


        //  question 19 
        if ($request->is_sex_trafficking_forced_labor_country_19q != 0) {
            $type_vot = $request->input('type_vot', []);
            $type_vot_other = $request->input('type_vot_other', []);
            $men_19 = $request->input('men_19', []);
            $women_19 = $request->input('women_19', []);
            $third_gender_19 = $request->input('third_gender_19', []);
            $total_19 = $request->input('total_19', []);
            $protection_measures_taken = $request->input('protection_measures_taken', []);
            $preventive_measures_taken = $request->input('preventive_measures_taken', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($type_vot),
                count($type_vot_other),
                count($men_19),
                count($women_19),
                count($third_gender_19),
                count($total_19),
                count($protection_measures_taken),
                count($preventive_measures_taken),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'type_vot' => $type_vot[$i] ?? null,
                    'type_vot_other' => $type_vot_other[$i] ?? null,
                    'men_19' => $men_19[$i] ?? null,
                    'women_19' => $women_19[$i] ?? null,
                    'third_gender_19' => $third_gender_19[$i] ?? null,
                    'total_19' => $total_19[$i] ?? null,
                    'protection_measures_taken' => $protection_measures_taken[$i] ?? null,
                    'preventive_measures_taken' => $preventive_measures_taken[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {
                // return response()->json($bulkInsertData);
                Nineteen::insert($bulkInsertData);
            }
        }
        
        
        //  question20 
        if ($request->is_describe_government_operated_q20 != 0) {
            //a
            $internal_traffick_type_of_hotlines_q20 = $request->input('internal_traffick_type_of_hotlines_q20', []);
            $internal_hotlines_number_q20 = $request->input('internal_hotlines_number_q20', []);
            $internal_traffick_men_q20 = $request->input('internal_traffick_men_q20', []);
            $internal_traffick_women_q20 = $request->input('internal_traffick_women_q20', []);
            $internal_traffick_third_gender_q20 = $request->input('internal_traffick_third_gender_q20', []);
            $internal_traffick_boys_q20 = $request->input('internal_traffick_boys_q20', []);
            $internal_traffick_girls_q20 = $request->input('internal_traffick_girls_q20', []);
            $internal_traffick_total_q20 = $request->input('internal_traffick_total_q20', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($internal_traffick_type_of_hotlines_q20),
                count($internal_hotlines_number_q20),
                count($internal_traffick_men_q20),
                count($internal_traffick_women_q20),
                count($internal_traffick_third_gender_q20),
                count($internal_traffick_boys_q20),
                count($internal_traffick_girls_q20),
                count($internal_traffick_total_q20),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'internal_traffick_type_of_hotlines_q20' => $internal_traffick_type_of_hotlines_q20[$i] ?? null,
                    'internal_hotlines_number_q20' => $internal_hotlines_number_q20[$i] ?? null,
                    'internal_traffick_men_q20' => $internal_traffick_men_q20[$i] ?? null,
                    'internal_traffick_women_q20' => $internal_traffick_women_q20[$i] ?? null,
                    'internal_traffick_third_gender_q20' => $internal_traffick_third_gender_q20[$i] ?? null,
                    'internal_traffick_boys_q20' => $internal_traffick_boys_q20[$i] ?? null,
                    'internal_traffick_girls_q20' => $internal_traffick_girls_q20[$i] ?? null,
                    'internal_traffick_total_q20' => $internal_traffick_total_q20[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {
                // return response()->json($bulkInsertData);
                Twentya::insert($bulkInsertData);
            }

            //b

            $international_traffick_type_of_hotlines_q20 = $request->input('international_traffick_type_of_hotlines_q20', []);
            $international_hotlines_number_q20 = $request->input('international_hotlines_number_q20', []);
            $international_traffick_men_q20 = $request->input('international_traffick_men_q20', []);
            $international_traffick_women_q20 = $request->input('international_traffick_women_q20', []);
            $international_traffick_third_gender_q20 = $request->input('international_traffick_third_gender_q20', []);
            $international_traffick_boys_q20 = $request->input('international_traffick_boys_q20', []);
            $international_traffick_girls_q20 = $request->input('international_traffick_girls_q20', []);
            $international_traffick_total_q20 = $request->input('international_traffick_total_q20', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($international_traffick_type_of_hotlines_q20),
                count($international_hotlines_number_q20),
                count($international_traffick_men_q20),
                count($international_traffick_women_q20),
                count($international_traffick_third_gender_q20),
                count($international_traffick_boys_q20),
                count($international_traffick_girls_q20),
                count($international_traffick_total_q20),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'international_traffick_type_of_hotlines_q20' => $international_traffick_type_of_hotlines_q20[$i] ?? null,
                    'international_hotlines_number_q20' => $international_hotlines_number_q20[$i] ?? null,
                    'international_traffick_men_q20' => $international_traffick_men_q20[$i] ?? null,
                    'international_traffick_women_q20' => $international_traffick_women_q20[$i] ?? null,
                    'international_traffick_third_gender_q20' => $international_traffick_third_gender_q20[$i] ?? null,
                    'international_traffick_boys_q20' => $international_traffick_boys_q20[$i] ?? null,
                    'international_traffick_girls_q20' => $international_traffick_girls_q20[$i] ?? null,
                    'international_traffick_total_q20' => $international_traffick_total_q20[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {
                // return response()->json($bulkInsertData);
                Twentyb::insert($bulkInsertData);
            }
        }




        //question21
        $request->validate([
            'capacity_men_q21.*' => 'nullable|numeric',
            'capacity_women_q21.*' => 'nullable|numeric',
            'capacity_total_q21.*' => 'nullable|numeric',
        ], [
            'capacity_men_q21.*.numeric' => 'Please enter numeric data only.',
            'capacity_women_q21.*.numeric' => 'Please enter numeric data only.',
            'capacity_total_q21.*.numeric' => 'Please enter numeric data only.',

        ]);

        if ($request->is_crime_justice_q21 != 0) {
            $name_q21 = $request->input('name_q21', []);
            $operator_q21 = $request->input('operator_q21', []);
            $capacity_men_q21 = $request->input('capacity_men_q21', []);
            $capacity_women_q21 = $request->input('capacity_women_q21', []);
            $capacity_total_q21 = $request->input('capacity_total_q21', []);
            $is_specialized_q21 = $request->input('is_specialized_q21', []);
            $eligible_victims_q21 = $request->input('eligible_victims_q21', []);
            $note_q21 = $request->input('note_q21', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($name_q21),
                count($operator_q21),
                count($capacity_men_q21),
                count($capacity_women_q21),
                count($capacity_total_q21),
                count($is_specialized_q21),
                count($eligible_victims_q21),
                count($note_q21),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'name_q21' => $name_q21[$i] ?? null,
                    'operator_q21' => $operator_q21[$i] ?? null,
                    'capacity_men_q21' => $capacity_men_q21[$i] ?? null,
                    'capacity_women_q21' => $capacity_women_q21[$i] ?? null,
                    'capacity_total_q21' => $capacity_total_q21[$i] ?? null,
                    'is_specialized_q21' => $is_specialized_q21[$i] ?? null,
                    'eligible_victims_q21' => $eligible_victims_q21[$i] ?? null,
                    'note_q21' => $note_q21[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                TwentyOne::insert($bulkInsertData);
            }
        }

        //question22
        $request->validate([
            'capacity_men_q22.*' => 'nullable|numeric',
            'capacity_women_q22.*' => 'nullable|numeric',
            'capacity_total_q22.*' => 'nullable|numeric',
        ], [
            'capacity_men_q22.*.numeric' => 'Please enter numeric data only.',
            'capacity_women_q22.*.numeric' => 'Please enter numeric data only.',
            'capacity_total_q22.*.numeric' => 'Please enter numeric data only.',

        ]);

        if ($request->is_crime_justice_q22 != 0) {
            $name_q22 = $request->input('name_q22', []);
            $operator_q22 = $request->input('operator_q22', []);
            $capacity_men_q22 = $request->input('capacity_men_q22', []);
            $capacity_women_q22 = $request->input('capacity_women_q22', []);
            $capacity_total_q22 = $request->input('capacity_total_q22', []);
            $is_specialized_q22 = $request->input('is_specialized_q22', []);
            $eligible_victims_q22 = $request->input('eligible_victims_q22', []);
            $note_q22 = $request->input('note_q22', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($name_q22),
                count($operator_q22),
                count($capacity_men_q22),
                count($capacity_women_q22),
                count($capacity_total_q22),
                count($is_specialized_q22),
                count($eligible_victims_q22),
                count($note_q22),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'name_q22' => $name_q22[$i] ?? null,
                    'operator_q22' => $operator_q22[$i] ?? null,
                    'capacity_men_q22' => $capacity_men_q22[$i] ?? null,
                    'capacity_women_q22' => $capacity_women_q22[$i] ?? null,
                    'capacity_total_q22' => $capacity_total_q22[$i] ?? null,
                    'is_specialized_q22' => $is_specialized_q22[$i] ?? null,
                    'eligible_victims_q22' => $eligible_victims_q22[$i] ?? null,
                    'note_q22' => $note_q22[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                TwentyTwo::insert($bulkInsertData);
            }
        }

        

         $request->validate([
            'specialized_trafficking_victims_men_q24.*' => 'nullable|numeric',
            'specialized_trafficking_victims_women_q24.*' => 'nullable|numeric',
            'specialized_trafficking_victims_tg_q24.*' => 'nullable|numeric',
            'specialized_trafficking_victims_boy_q24.*' => 'nullable|numeric',
            'specialized_trafficking_victims_girl_q24.*' => 'nullable|numeric',
            'specialized_trafficking_victims_total_q24.*' => 'nullable|numeric',
        ], [
            'specialized_trafficking_victims_men_q24.*.numeric' => 'Please enter numeric data only.',
            'specialized_trafficking_victims_women_q24.*.numeric' => 'Please enter numeric data only.',
            'specialized_trafficking_victims_tg_q24.*.numeric' => 'Please enter numeric data only.',
            'specialized_trafficking_victims_boy_q24.*.numeric' => 'Please enter numeric data only.',
            'specialized_trafficking_victims_girl_q24.*.numeric' => 'Please enter numeric data only.',
            'specialized_trafficking_victims_total_q24.*.numeric' => 'Please enter numeric data only.',

        ]);

        if ($request->is_specialized_trafficking_victims_q24 != 0) {
            $specialized_trafficking_victims_protection_q24 = $request->input('specialized_trafficking_victims_protection_q24', []);
            $specialized_trafficking_victims_quality_q24 = $request->input('specialized_trafficking_victims_quality_q24', []);
            $specialized_trafficking_victims_men_q24 = $request->input('specialized_trafficking_victims_men_q24', []);
            $specialized_trafficking_victims_women_q24 = $request->input('specialized_trafficking_victims_women_q24', []);
            $specialized_trafficking_victims_tg_q24 = $request->input('specialized_trafficking_victims_tg_q24', []);
            $specialized_trafficking_victims_boy_q24 = $request->input('specialized_trafficking_victims_boy_q24', []);
            $specialized_trafficking_victims_girl_q24 = $request->input('specialized_trafficking_victims_girl_q24', []);
            $specialized_trafficking_victims_total_q24 = $request->input('specialized_trafficking_victims_total_q24', []);

            // রিকোয়েস্ট থেকে লোকেশন অ্যারেটি নেওয়া হচ্ছে
            $locations = $request->input('specialized_trafficking_victims_location_q24', []);

            $case_id = $question->id;
            $bulkInsertData = [];

            $maxCount = max(
                count($specialized_trafficking_victims_protection_q24),
                count($specialized_trafficking_victims_quality_q24)
            );

            // ইনডেক্সিং গ্যাপ এড়াতে সমস্ত ইনপুট অ্যারেকে সিরিয়াল অ্যারেতে রূপান্তর
            $protection = array_values($specialized_trafficking_victims_protection_q24);
            $quality    = array_values($specialized_trafficking_victims_quality_q24);
            $men        = array_values($specialized_trafficking_victims_men_q24);
            $women      = array_values($specialized_trafficking_victims_women_q24);
            $tg         = array_values($specialized_trafficking_victims_tg_q24);
            $boy        = array_values($specialized_trafficking_victims_boy_q24);
            $girl       = array_values($specialized_trafficking_victims_girl_q24);
            $total      = array_values($specialized_trafficking_victims_total_q24);
            $locs       = array_values($locations); // লোকেশন রিসেট

            for ($i = 0; $i < $maxCount; $i++) {
                // বর্তমান সিরিয়ালের লোকেশন অ্যারেটি রিড করা
                $current_location = isset($locs[$i]) ? $locs[$i] : [];

                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'specialized_trafficking_victims_protection_q24' => $protection[$i] ?? null,
                    'specialized_trafficking_victims_quality_q24' => $quality[$i] ?? null,
                    'specialized_trafficking_victims_men_q24' => $men[$i] ?? null,
                    'specialized_trafficking_victims_women_q24' => $women[$i] ?? null,
                    'specialized_trafficking_victims_tg_q24' => $tg[$i] ?? null,
                    'specialized_trafficking_victims_boy_q24' => $boy[$i] ?? null,
                    'specialized_trafficking_victims_girl_q24' => $girl[$i] ?? null,
                    'specialized_trafficking_victims_total_q24' => $total[$i] ?? null,
                    // এখানে এটি সুন্দরভাবে মাল্টিপল ডেটা সেভ করবে, যেমন: ["Dhaka","Chattogram"]
                    'specialized_trafficking_victims_location_q24' => json_encode($current_location),
                ];
            }

            if (!empty($bulkInsertData)) {
               // return response()->json($bulkInsertData);
                TwentyFour::insert($bulkInsertData);
            }
        }

        //question30
        $request->validate([
            'citizen_victims_men_q30.*' => 'nullable|numeric',
            'citizen_victims_women_q30.*' => 'nullable|numeric',
            'citizen_victims_tg_q30.*' => 'nullable|numeric',
            'citizen_victims_boy_q30.*' => 'nullable|numeric',
            'citizen_victims_girl_q30.*' => 'nullable|numeric',
            'citizen_victims_total_q30.*' => 'nullable|numeric',
        ], [
            'citizen_victims_men_q30.*.numeric' => 'Please enter numeric data only.',
            'citizen_victims_women_q30.*.numeric' => 'Please enter numeric data only.',
            'citizen_victims_tg_q30.*.numeric' => 'Please enter numeric data only.',
            'citizen_victims_boy_q30.*.numeric' => 'Please enter numeric data only.',
            'citizen_victims_girl_q30.*.numeric' => 'Please enter numeric data only.',
            'citizen_victims_total_q30.*.numeric' => 'Please enter numeric data only.',

        ]);

          if ($request->is_foreign_victims_q30 != 0) {
            $citizen_victims_services_q30 = $request->input('citizen_victims_services_q30', []);
            $citizen_victims_quality_q30 = $request->input('citizen_victims_quality_q30', []);
            $citizen_victims_men_q30 = $request->input('citizen_victims_men_q30', []);
            $citizen_victims_women_q30 = $request->input('citizen_victims_women_q30', []);
            $citizen_victims_tg_q30 = $request->input('citizen_victims_tg_q30', []);
            $citizen_victims_boy_q30 = $request->input('citizen_victims_boy_q30', []);
            $citizen_victims_girl_q30 = $request->input('citizen_victims_girl_q30', []);
            $citizen_victims_total_q30 = $request->input('citizen_victims_total_q30', []);

            // রিকোয়েস্ট থেকে লোকেশন অ্যারেটি নেওয়া হচ্ছে
            $locations = $request->input('citizen_victims_country_q30', []);

            $case_id = $question->id;
            $bulkInsertData = [];

            $maxCount = max(
                count($citizen_victims_services_q30),
                count($citizen_victims_quality_q30)
            );

            // ইনডেক্সিং গ্যাপ এড়াতে সমস্ত ইনপুট অ্যারেকে সিরিয়াল অ্যারেতে রূপান্তর
            $protection = array_values($citizen_victims_services_q30);
            $quality    = array_values($citizen_victims_quality_q30);
            $men        = array_values($citizen_victims_men_q30);
            $women      = array_values($citizen_victims_women_q30);
            $tg         = array_values($citizen_victims_tg_q30);
            $boy        = array_values($citizen_victims_boy_q30);
            $girl       = array_values($citizen_victims_girl_q30);
            $total      = array_values($citizen_victims_total_q30);
            $locs       = array_values($locations); // লোকেশন রিসেট

            for ($i = 0; $i < $maxCount; $i++) {
                // বর্তমান সিরিয়ালের লোকেশন অ্যারেটি রিড করা
                $current_location = isset($locs[$i]) ? $locs[$i] : [];

                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'citizen_victims_services_q30' => $protection[$i] ?? null,
                    'citizen_victims_quality_q30' => $quality[$i] ?? null,
                    'citizen_victims_men_q30' => $men[$i] ?? null,
                    'citizen_victims_women_q30' => $women[$i] ?? null,
                    'citizen_victims_tg_q30' => $tg[$i] ?? null,
                    'citizen_victims_boy_q30' => $boy[$i] ?? null,
                    'citizen_victims_girl_q30' => $girl[$i] ?? null,
                    'citizen_victims_total_q30' => $total[$i] ?? null,
                    // এখানে এটি সুন্দরভাবে মাল্টিপল ডেটা সেভ করবে, যেমন: ["Dhaka","Chattogram"]
                    'citizen_victims_country_q30' => json_encode($current_location),
                ];
            }

            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                Thirty::insert($bulkInsertData);
            }
        }


        
        //question46
        if ($request->is_government_conduct_awareness_activities_q46 != 0) {
            $q46_type_activity = $request->input('q46_type_activity', []);
            $q46_comm_m = $request->input('q46_comm_m', []);
            $q46_comm_w = $request->input('q46_comm_w', []);
            $q46_comm_tg = $request->input('q46_comm_tg', []);
            $q46_comm_b = $request->input('q46_comm_b', []);
            $q46_comm_g = $request->input('q46_comm_g', []);
            $q46_comm_t = $request->input('q46_comm_t', []);
            $q46_org_go = $request->input('q46_org_go', []);
            $q46_org_ngo = $request->input('q46_org_ngo', []);
            $q46_org_ingo = $request->input('q46_org_ingo', []);
            $q46_org_un = $request->input('q46_org_un', []);
            $q46_org_ctc = $request->input('q46_org_ctc', []);
            $q46_org_others = $request->input('q46_org_others', []);
            $q46_total_m = $request->input('q46_total_m', []);
            $q46_total_f = $request->input('q46_total_f', []);
            $q46_total_t = $request->input('q46_total_t', []);


            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($q46_type_activity),
                count($q46_comm_m),
                count($q46_comm_w),
                count($q46_comm_tg),
                count($q46_comm_b),
                count($q46_comm_g),
                count($q46_comm_t),
                count($q46_org_go),
                count($q46_org_ngo),
                count($q46_org_ingo),
                count($q46_org_un),
                count($q46_org_ctc),
                count($q46_org_others),
                count($q46_total_m),
                count($q46_total_f),
                count($q46_total_t)
            );

            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'q46_type_activity' => $q46_type_activity[$i] ?? null,
                    'q46_comm_m' => $q46_comm_m[$i] ?? null,
                    'q46_comm_w' => $q46_comm_w[$i] ?? null,
                    'q46_comm_tg' => $q46_comm_tg[$i] ?? null,
                    'q46_comm_b' => $q46_comm_b[$i] ?? null,
                    'q46_comm_g' => $q46_comm_g[$i] ?? null,
                    'q46_comm_t' => $q46_comm_t[$i] ?? null,
                    'q46_org_go' => $q46_org_go[$i] ?? null,
                    'q46_org_ngo' => $q46_org_ngo[$i] ?? null,
                    'q46_org_ingo' => $q46_org_ingo[$i] ?? null,
                    'q46_org_un' => $q46_org_un[$i] ?? null,
                    'q46_org_ctc' => $q46_org_ctc[$i] ?? null,
                    'q46_org_others' => $q46_org_others[$i] ?? null,
                    'q46_total_m' => $q46_total_m[$i] ?? null,
                    'q46_total_f' => $q46_total_f[$i] ?? null,
                    'q46_total_t' => $q46_total_t[$i] ?? null,


                ];
            }

            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                FortySix::insert($bulkInsertData);
            }
        }


        //question50
        if ($request->is_exploitative_treatment_q50 != 0) {
            $exploitative_treatment_title_q50 = $request->input('exploitative_treatment_title_q50', []);

            $images = [];
            if ($request->hasFile('document_upload_q50')) {
                foreach ($request->file('document_upload_q50') as $index => $image) {
                    $ext = $image->extension();
                    $final_name = 'document_upload_q50_' . time() . '_' . $index . '.' . $ext;
                    $image->move(public_path('uploads/document_upload_q50'), $final_name);
                    $images[] = 'uploads/document_upload_q50/' . $final_name;
                }
            }

            $case_id = $question->id;

            $bulkInsertData = [];
            $maxCount = max(count($exploitative_treatment_title_q50),  count($images));

            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'exploitative_treatment_title_q50' => $exploitative_treatment_title_q50[$i] ?? null,
                    'document_upload_q50' => $images[$i] ?? null,
                ];
            }

            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                Fifty::insert($bulkInsertData);
            }
        }



        //question51
        if ($request->is_commercial_sex_demands_q51 != 0) {
            $commercial_title_q51 = $request->input('commercial_title_q51', []);
            $commercial_status_q51 = $request->input('commercial_status_q51', []);


            $images = [];
            if ($request->hasFile('document_upload_q51')) {
                foreach ($request->file('document_upload_q51') as $index => $image) {
                    $ext = $image->extension();
                    $final_name = 'document_upload_q51_' . time() . '_' . $index . '.' . $ext;
                    $image->move(public_path('uploads/document_upload_q51'), $final_name);
                    $images[] = 'uploads/document_upload_q51/' . $final_name;
                }
            }

            $case_id = $question->id;

            $bulkInsertData = [];
            $maxCount = max(count($commercial_title_q51), count($commercial_status_q51), count($images));

            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'commercial_title_q51' => $commercial_title_q51[$i] ?? null,
                    'commercial_status_q51' => $commercial_status_q51[$i] ?? null,
                    'document_upload_q51' => $images[$i] ?? null,
                ];
            }



            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                FiftyOne::insert($bulkInsertData);
            }
        }

        //question52
        if ($request->is_government_prosecute_deport_q52 != 0) {
            $prosecute_title_q52 = $request->input('prosecute_title_q52', []);
            $prosecute_status_q52 = $request->input('prosecute_status_q52', []);
            $images = [];
            if ($request->hasFile('document_upload_q52')) {
                foreach ($request->file('document_upload_q52') as $index => $image) {
                    $ext = $image->extension();
                    $final_name = 'document_upload_q52_' . time() . '_' . $index . '.' . $ext;
                    $image->move(public_path('uploads/document_upload_q52'), $final_name);
                    $images[] = 'uploads/document_upload_q52/' . $final_name;
                }
            }
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(count($prosecute_title_q52), count($prosecute_status_q52), count($images));

            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'prosecute_title_q52' => $prosecute_title_q52[$i] ?? null,
                    'prosecute_status_q52' => $prosecute_status_q52[$i] ?? null,
                    'document_upload_q52' => $images[$i] ?? null,
                ];
            }

            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                FiftyTwo::insert($bulkInsertData);
            }
        }


        // question53
        $request->validate([
            'government_men_q53.*' => 'nullable|numeric',
            'government_women_q53.*' => 'nullable|numeric',
            'government_tg_q53.*' => 'nullable|numeric',
            'government_total_q53.*' => 'nullable|numeric',
        ], [
            'government_men_q53.*.numeric' => 'Please enter numeric data only.',
            'government_women_q53.*.numeric' => 'Please enter numeric data only.',
            'government_tg_q53.*.numeric' => 'Please enter numeric data only.',
            'government_total_q53.*.numeric' => 'Please enter numeric data only.',


        ]);

        if ($request->is_government_train_diplomat_q53 != 0) {
            $government_title_q53 = $request->input('government_title_q53', []);
            $government_men_q53 = $request->input('government_men_q53', []);
            $government_women_q53 = $request->input('government_women_q53', []);
            $government_tg_q53 = $request->input('government_tg_q53', []);
            $government_total_q53 = $request->input('government_total_q53', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($government_title_q53),
                count($government_men_q53),
                count($government_women_q53),
                count($government_tg_q53),
                count($government_total_q53),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_title_q53' => $government_title_q53[$i] ?? null,
                    'government_men_q53' => $government_men_q53[$i] ?? null,
                    'government_women_q53' => $government_women_q53[$i] ?? null,
                    'government_tg_q53' => $government_tg_q53[$i] ?? null,
                    'government_total_q53' => $government_total_q53[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                FiftyThree::insert($bulkInsertData);
            }
        }


        //question54
        $request->validate([
            'country_diplomat_men_q54.*' => 'nullable|numeric',
            'country_diplomat_women_q54.*' => 'nullable|numeric',
            'country_diplomat_tg_q54.*' => 'nullable|numeric',
            'country_diplomat_total_q54.*' => 'nullable|numeric',
        ], [
            'country_diplomat_men_q54.*.numeric' => 'Please enter numeric data only.',
            'country_diplomat_women_q54.*.numeric' => 'Please enter numeric data only.',
            'country_diplomat_tg_q54.*.numeric' => 'Please enter numeric data only.',
            'country_diplomat_total_q54.*.numeric' => 'Please enter numeric data only.',


        ]);

        if ($request->is_country_diplomats_allegedly_q54 != 0) {
            $country_diplomat_name_q54 = $request->input('country_diplomat_name_q54', []);
            $country_diplomat_description_q54 = $request->input('country_diplomat_description_q54', []);
            $country_diplomat_men_q54 = $request->input('country_diplomat_men_q54', []);
            $country_diplomat_women_q54 = $request->input('country_diplomat_women_q54', []);
            $country_diplomat_tg_q54 = $request->input('country_diplomat_tg_q54', []);
            $country_diplomat_total_q54 = $request->input('country_diplomat_total_q54', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($country_diplomat_name_q54),
                count($country_diplomat_description_q54),
                count($country_diplomat_men_q54),
                count($country_diplomat_women_q54),
                count($country_diplomat_tg_q54),
                count($country_diplomat_total_q54),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'country_diplomat_name_q54' => $country_diplomat_name_q54[$i] ?? null,
                    'country_diplomat_description_q54' => $country_diplomat_description_q54[$i] ?? null,
                    'country_diplomat_men_q54' => $country_diplomat_men_q54[$i] ?? null,
                    'country_diplomat_women_q54' => $country_diplomat_women_q54[$i] ?? null,
                    'country_diplomat_tg_q54' => $country_diplomat_tg_q54[$i] ?? null,
                    'country_diplomat_total_q54' => $country_diplomat_total_q54[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                FiftyFour::insert($bulkInsertData);
            }
        }


        //question 55
        $request->validate([
            'government_provide_men_q55.*' => 'nullable|numeric',
            'government_provide_women_q55.*' => 'nullable|numeric',
            'government_provide_tg_q55.*' => 'nullable|numeric',
            'government_provide_total_q55.*' => 'nullable|numeric',
        ], [
            'government_provide_men_q55.*.numeric' => 'Please enter numeric data only.',
            'government_provide_women_q55.*.numeric' => 'Please enter numeric data only.',
            'government_provide_tg_q55.*.numeric' => 'Please enter numeric data only.',
            'government_provide_total_q55.*.numeric' => 'Please enter numeric data only.',


        ]);
        if ($request->is_government_provide_trafficking_q55 != 0) {
            $government_provide_name_q55 = $request->input('government_provide_name_q55', []);
            $government_provide_description_q55 = $request->input('government_provide_description_q55', []);
            $government_provide_men_q55 = $request->input('government_provide_men_q55', []);
            $government_provide_women_q55 = $request->input('government_provide_women_q55', []);
            $government_provide_tg_q55 = $request->input('government_provide_tg_q55', []);
            $government_provide_total_q55 = $request->input('government_provide_total_q55', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($government_provide_name_q55),
                count($government_provide_description_q55),
                count($government_provide_men_q55),
                count($government_provide_women_q55),
                count($government_provide_tg_q55),
                count($government_provide_total_q55),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_provide_name_q55' => $government_provide_name_q55[$i] ?? null,
                    'government_provide_description_q55' => $government_provide_description_q55[$i] ?? null,
                    'government_provide_men_q55' => $government_provide_men_q55[$i] ?? null,
                    'government_provide_women_q55' => $government_provide_women_q55[$i] ?? null,
                    'government_provide_tg_q55' => $government_provide_tg_q55[$i] ?? null,
                    'government_provide_total_q55' => $government_provide_total_q55[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                FiftyFive::insert($bulkInsertData);
            }
        }

//question31
        $request->validate([
            'citizen_victims_abroad_men_q31.*' => 'nullable|numeric',
            'citizen_victims_abroad_women_q31.*' => 'nullable|numeric',
            'citizen_victims_abroad_tg_q31.*' => 'nullable|numeric',
            'citizen_victims_abroad_boy_q31.*' => 'nullable|numeric',
            'citizen_victims_abroad_girl_q31.*' => 'nullable|numeric',
            'citizen_victims_abroad_total_q31.*' => 'nullable|numeric',
        ], [
            'citizen_victims_abroad_men_q31.*.numeric' => 'Please enter numeric data only.',
            'citizen_victims_abroad_women_q31.*.numeric' => 'Please enter numeric data only.',
            'citizen_victims_abroad_tg_q31.*.numeric' => 'Please enter numeric data only.',
            'citizen_victims_abroad_boy_q31.*.numeric' => 'Please enter numeric data only.',
            'citizen_victims_abroad_girl_q31.*.numeric' => 'Please enter numeric data only.',
            'citizen_victims_abroad_total_q31.*.numeric' => 'Please enter numeric data only.',


        ]);
        if ($request->is_citizen_victims_abroad_q31 != 0) {
            $citizen_victims_abroad_name_q31 = $request->input('citizen_victims_abroad_name_q31', []);
            $citizen_victims_abroad_status_q31 = $request->input('citizen_victims_abroad_status_q31', []);
            $citizen_victims_abroad_men_q31 = $request->input('citizen_victims_abroad_men_q31', []);
            $citizen_victims_abroad_women_q31 = $request->input('citizen_victims_abroad_women_q31', []);
            $citizen_victims_abroad_tg_q31 = $request->input('citizen_victims_abroad_tg_q31', []);
            $citizen_victims_abroad_boy_q31 = $request->input('citizen_victims_abroad_boy_q31', []);
            $citizen_victims_abroad_girl_q31 = $request->input('citizen_victims_abroad_girl_q31', []);
            $citizen_victims_abroad_total_q31 = $request->input('citizen_victims_abroad_total_q31', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(
                count($citizen_victims_abroad_name_q31),
                count($citizen_victims_abroad_status_q31),
                count($citizen_victims_abroad_men_q31),
                count($citizen_victims_abroad_women_q31),
                count($citizen_victims_abroad_tg_q31),
                count($citizen_victims_abroad_boy_q31),
                count($citizen_victims_abroad_girl_q31),
                count($citizen_victims_abroad_total_q31),
            );
            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'citizen_victims_abroad_name_q31' => $citizen_victims_abroad_name_q31[$i] ?? null,
                    'citizen_victims_abroad_status_q31' => $citizen_victims_abroad_status_q31[$i] ?? null,
                    'citizen_victims_abroad_men_q31' => $citizen_victims_abroad_men_q31[$i] ?? null,
                    'citizen_victims_abroad_women_q31' => $citizen_victims_abroad_women_q31[$i] ?? null,
                    'citizen_victims_abroad_tg_q31' => $citizen_victims_abroad_tg_q31[$i] ?? null,
                    'citizen_victims_abroad_boy_q31' => $citizen_victims_abroad_boy_q31[$i] ?? null,
                    'citizen_victims_abroad_girl_q31' => $citizen_victims_abroad_girl_q31[$i] ?? null,
                    'citizen_victims_abroad_total_q31' => $citizen_victims_abroad_total_q31[$i] ?? null,
                ];
            }
            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                ThiryOne::insert($bulkInsertData);
            }
        }




        //question44
        if ($request->is_awareness_campaigns_research_projects_q44 != 0) {
            $awareness_campaigns_research_projects_title_q44 = $request->input('awareness_campaigns_research_projects_title_q44', []);
            $awareness_campaigns_research_projects_status_q44 = $request->input('awareness_campaigns_research_projects_status_q44', []);
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(count($awareness_campaigns_research_projects_title_q44), count($awareness_campaigns_research_projects_status_q44));

            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'awareness_campaigns_research_projects_title_q44' => $awareness_campaigns_research_projects_title_q44[$i] ?? null,
                    'awareness_campaigns_research_projects_status_q44' => $awareness_campaigns_research_projects_status_q44[$i] ?? null,

                ];
            }


            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                FortyFour::insert($bulkInsertData);
            }
        }

        //question45
        if ($request->is_national_plan_trafficking_q45 != 0) {
            $case_id = $question->id;
            $question45 = new FortyFive();
            $question45->case_id = $case_id;
            $question45->national_plan_trafficking_q45_title_q45 = $request->national_plan_trafficking_q45_title_q45;
            $question45->national_plan_trafficking_q45_description_q45 = $request->national_plan_trafficking_q45_description_q45;
            if ($request->hasFile('document_upload_q45')) {
                $ext = $request->file('document_upload_q45')->extension();
                $final_name = 'document_upload_q45_' . time() . '.' . $ext;
                $request->file('document_upload_q45')->move(public_path('uploads/'), $final_name);
                $question45->document_upload_q45 = $final_name;
            }

            //return response()->json($question45);
            $question45->save();
        }

        //question47
        if ($request->is_government_change_regulated_q47 != 0) {
            $government_change_regulated_title_q47 = $request->input('government_change_regulated_title_q47', []);
            $government_change_regulated_status_q47 = $request->input('government_change_regulated_status_q47', []);

            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(count($government_change_regulated_title_q47), count($government_change_regulated_status_q47));

            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_change_regulated_title_q47' => $government_change_regulated_title_q47[$i] ?? null,
                    'government_change_regulated_status_q47' => $government_change_regulated_status_q47[$i] ?? null,

                ];
            }

            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                FortySeven::insert($bulkInsertData);
            }
        }

        //question49
        if ($request->is_government_agreements_transparent_q49 != 0) {
            $government_agreements_transparent_country_q49 = $request->input('government_agreements_transparent_country_q49', []);
            $government_agreements_transparent_status_q49 = $request->input('government_agreements_transparent_status_q49', []);
            $images = [];
            if ($request->hasFile('document_upload_q49')) {
                foreach ($request->file('document_upload_q49') as $index => $image) {
                    $ext = $image->extension();
                    $final_name = 'document_upload_q49_' . time() . '_' . $index . '.' . $ext;
                    $image->move(public_path('uploads/document_upload_q49'), $final_name);
                    $images[] = 'uploads/document_upload_q49/' . $final_name;
                }
            }
            $case_id = $question->id;
            $bulkInsertData = [];
            $maxCount = max(count($government_agreements_transparent_country_q49), count($government_agreements_transparent_status_q49), count($images));

            for ($i = 0; $i < $maxCount; $i++) {
                $bulkInsertData[] = [
                    'case_id' => $case_id,
                    'government_agreements_transparent_country_q49' => $government_agreements_transparent_country_q49[$i] ?? null,
                    'government_agreements_transparent_status_q49' => $government_agreements_transparent_status_q49[$i] ?? null,
                    'document_upload_q49' => $images[$i] ?? null,
                ];
            }

            if (!empty($bulkInsertData)) {
                //return response()->json($bulkInsertData);
                FortyNine::insert($bulkInsertData);
            }
        }













        //Session Clear

        //Session::forget(['question1','question2','question3','question4','question5','question6']);

        $notification = array(
            'messege' => ' Question Added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function ListCase()
    {


        $userId = Auth::id();
        $userType = Auth::user()->user_type;

        if ($userType == "Super Admin") {
            $cases = CaseModel::latest()->get();
        } else {
            $cases = CaseModel::where('user_id', $userId)->latest()->get();
        }

        return view('superadmin.case.list', compact('cases'));
    }


    // case view
    public function View($id)
    {

        $questiontitles = QuestionTitle::orderBy('id')->get();


        $userId = Auth::id();
        $userType = Auth::user()->user_type;
        $relationships = [
            'one',
            'oneb',
            'two',
            'three',
            'four',
            'five',
            'six',
            'seven',
            'eight',
            'nine',
            'ten',
            'fifteen',
            'sixteen',
            'eighteen',
            'nineteen',
            'twentythree',
            'twentyeight',
            'twentyone',
            'twentytwo',
            'fifty',
            'fiftyone',
            'fiftytwo',
            'fiftythree',
            'fiftyfour',
            'fiftyfive',
            'fortyfour',
            'fortyfive',
            'fortyseven',
            'fortynine',
            'eleven',
            'fourteen',
            'seventeen',
            'twentyfour',
            'foura',
            'fourb',
            'twelve',
            'twelveb',
            'twelvec',
            'twelved',
            'twentya',
            'twentyb',
            'fortysix',
            'thirteena',
            'thirteenb',
            'thirteenc',
            'thirteend',
            'yes_no_other',
            'thirtythree',
            'thirtyone',
            'thirty'


        ];

        if ($userType == "Super Admin" || $userType == 2) {
            // For user_type 1 and 2, get the case without additional constraints
            $case = CaseModel::with($relationships)->find($id);
        } else {
            // For other user types, ensure the case belongs to the logged-in user
            $case = CaseModel::with($relationships)
                ->where('user_id', $userId)
                ->where('id', $id)
                ->first();
        }
        //         echo "<pre>";
        //    print_r($case);
        // echo "</pre>"; 
        
        


          //return response()->json($case);
        return view('superadmin.case.view', compact('case', 'questiontitles'));
    }

    public function PdfView($id)
    {
        $questiontitles = QuestionTitle::orderBy('id')->get();

        $userId = Auth::id();
        $userType = Auth::user()->user_type;

        $relationships = [
            'one',
            'oneb',
            'two',
            'three',
            'four',
            'five',
            'six',
            'seven',
            'eight',
            'nine',
            'ten',
            'fifteen',
            'sixteen',
            'eighteen',
            'nineteen',
            'twentythree',
            'twentyeight',
            'fiftyseven',
            'sixty',
            'sixty_three',
            'twentyone',
            'twentytwo',
            'fifty',
            'fiftyone',
            'fiftytwo',
            'fiftythree',
            'fiftyfour',
            'fiftyfive',
            'fortyfour',
            'fortyfive',
            'fortyseven',
            'fortynine',
            'eleven',
            'fourteen',
            'seventeen',
            'twentyfour',
            'foura',
            'fourb',
            'twelve',
            'twentya',
            'twentyb',
            'fortysix',
        ];

        if ($userType == "Super Admin" || $userType == 2) {
            $case = CaseModel::with($relationships)->find($id);
        } else {
            $case = CaseModel::with($relationships)
                ->where('user_id', $userId)
                ->where('id', $id)
                ->first();
        }

        $labels = [
            'a' => 'New Investigations',
            'b' => 'New Prosecutions',
            'c' => 'New Repatriations',
            'd' => 'New Extraditions',
        ];

        $twelveGrouped = collect($case->twelve ?? [])
            ->groupBy('government_cooperate_foreign_counterparts_country_q12')
            ->map(function ($items) {
                return $items->take(3);
            });

        // ЁЯСЙ ржПржЦрж╛ржирзЗ view -> pdf
        $pdf = Pdf::loadView('superadmin.case.pdfview', compact(
            'case',
            'questiontitles',
            'twelveGrouped',
            'labels'
        ));

        return $pdf->stream('case.pdf'); // download ржЪрж╛ржЗрж▓рзЗ download() use ржХрж░рзЛ
    }
    
    
            public function generateCSV($id)
    {
        $case = CaseModel::with([
            'one',
            'oneb',
            'two',
            'three',
            'four',
            'five',
            'six',
            'seven',
            'eight',
            'nine',
            'ten',
            'fifteen',
            'sixteen',
            'eighteen',
            'nineteen',
            'twentya',
            'twentyb',
            'twentythree',
            'twentyeight',
            'fortysix',
            'fifty',
            'fiftyone',
            'fiftytwo',
            'fiftythree',
            'fiftyfive',
            'fortyfour',
            'fortyfive',
            'fortyseven',
            'fortynine',
            'eleven',
            'fourteen',
            'seventeen',
            'twentyfour',
            'foura',
            'fourb',
            'twelve',
            'fiftyfour',
            'thirteena',
            'thirteenb',
            'thirteenc',
            'thirteend',
            'yes_no_other'
        ])->find($id);

        if (!$case) {
            return response()->json(['message' => 'Case not found'], 404);
        }

        $fileName = "case_details_{$id}.csv";
        $headers = array(
            "Content-type" => "text/csv; charset=utf-8", 
            "Content-Disposition" => "attachment; filename=\"$fileName\"", // ডাবল কোট দেওয়া নিরাপদ
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $callback = function () use ($case) {
            $file = fopen('php://output', 'w');

            // Excel-এ বাংলা বা স্পেশাল ক্যারেক্টার ঠিকঠাক দেখানোর জন্য BOM যোগ করা হলো
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));


            //5
            fputcsv($file, ['5.SECTION Five QUESTION REPORT', '', '', '', '']);
            fputcsv($file, ['Title']);

            if ($case->five && $case->five->isNotEmpty()) {
                foreach ($case->five as $five) {
                    fputcsv($file, [
                        $five->involved_directly_trafficking_title_q5
                    ]);
                }
            }
            //5

            //6
            fputcsv($file, ['SECTION Six DATA REPORT', '', '', '', '']);
            fputcsv($file, ['Title', 'Men', 'Women', 'Total', 'Response']);

            if ($case->six && $case->six->isNotEmpty()) {
                foreach ($case->six as $six) {
                    fputcsv($file, [
                        $six->labor_title_q6,
                        $six->labor_men_q6,
                        $six->labor_women_q6,
                        $six->labor_total_q6,
                        $six->labor_response_q6
                    ]);
                }
            }
            //6

            //7
            fputcsv($file, ['SECTION SEVEN DATA REPORT', '', '', '', '']);
            fputcsv($file, ['Title ', 'Men', 'Women', 'Total']);

            if ($case->seven && $case->seven->isNotEmpty()) {
                foreach ($case->seven as $seven) {
                    fputcsv($file, [
                        $seven->justice_title_q7,
                        $seven->justice_men_q7,
                        $seven->justice_women_q7,
                        $seven->justice_total_q7
                    ]);
                }
            }
            //7

            //8
            fputcsv($file, ['SECTION EIGHT DATA REPORT', '', '', '', '']);
            fputcsv($file, ['Ministry/Department Municipality body ', 'Investigation (numbwer)', 'Prosecution (number)', 'Conviction or Sentencing (number)', 'Administrative Measures (numbwer)']);

            if ($case->eight && $case->eight->isNotEmpty()) {
                foreach ($case->eight as $eight) {
                    fputcsv($file, [
                        $eight->official_title_q8,
                        $eight->official_investigation_q8,
                        $eight->official_prosecution_q8,
                        $eight->official_conviction_q8,
                        $eight->official_administrative_q8
                    ]);
                }
            }
            //8
            //12
            fputcsv($file, ['SECTION TWELVE DATA REPORT', '', '', '', '']);
            fputcsv($file, ['Country/Region/International Law Enforcement Organization', 'Sex Trafficking', 'Labour Trafficking', 'Other/Unspecific Trafficking', 'Total']);

            if ($case->twelve && $case->twelve->isNotEmpty()) {
                foreach ($case->twelve as $twelve) {
                    fputcsv($file, [
                        $twelve->government_cooperate_foreign_counterparts_country_q12,
                        $twelve->government_cooperate_foreign_counterparts_sex_trafficking_q12,
                        $twelve->government_cooperate_foreign_counterparts_labour_trafficking_q1,
                        $twelve->government_cooperate_foreign_counterparts_other_trafficking_q12,
                        $twelve->government_cooperate_foreign_counterparts_total_trafficking_q12
                    ]);
                }
            }
            //12

            //13
            fputcsv($file, ['SECTION THIRTEEN DATA REPORT', '', '', '', '']);
            fputcsv($file, ['Country/Region/International Law Enforcement Organization', 'Sex Trafficking', 'Labour Trafficking', 'Other/Unspecific Trafficking', 'Total']);

            if ($case->thirteena && $case->thirteena->isNotEmpty()) {
                foreach ($case->thirteena as $thirteena) {
                    fputcsv($file, [
                        $thirteena->government_country_q13a,
                        $thirteena->government_sex_q13a,
                        $thirteena->government_labour_q13a,
                        $thirteena->government_other_q13a,
                        $thirteena->government_total_q13a
                    ]);
                }
            }
            if ($case->thirteenb && $case->thirteenb->isNotEmpty()) {
                foreach ($case->thirteenb as $thirteenb) {
                    fputcsv($file, [
                        $thirteenb->government_country_q13b,
                        $thirteenb->government_sex_q13b,
                        $thirteenb->government_labour_q13b,
                        $thirteenb->government_other_q13b,
                        $thirteenb->government_total_q13b
                    ]);
                }
            }
            if ($case->thirteenc && $case->thirteenc->isNotEmpty()) {
                foreach ($case->thirteenc as $thirteenc) {
                    fputcsv($file, [
                        $thirteenc->government_country_q13c,
                        $thirteenc->government_sex_q13c,
                        $thirteenc->government_labour_q13c,
                        $thirteenc->government_other_q13c,
                        $thirteenc->government_total_q13c
                    ]);
                }
            }
            if ($case->thirteend && $case->thirteend->isNotEmpty()) {
                foreach ($case->thirteend as $thirteend) {
                    fputcsv($file, [
                        $thirteend->government_country_q13d,
                        $thirteend->government_sex_q13d,
                        $thirteend->government_labour_q13d,
                        $thirteend->government_other_q13d,
                        $thirteend->government_total_q13d
                    ]);
                }
            }

            //13



            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }


    public function generateWord($id)
{
    
    $case = CaseModel::with(['six', 'seven'])->find($id);

    if (!$case) {
        return response()->json(['message' => 'Case not found'], 404);
    }


    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $section = $phpWord->addSection();

   
    $section->addTitle('Case Details Report', 1);
    $section->addTextBreak(1);

    $section->addText("Case ID: " . ($case->caseid ?? $case->id), ['bold' => true, 'size' => 14]);
    $section->addText("User ID: " . $case->user_id, ['size' => 12]);
    $section->addTextBreak(1);

  
    $tableStyle = [
        'borderSize'  => 6, 
        'borderColor' => 'CCCCCC', 
        'cellMargin'  => 80
    ];

    // ==========================================
    // ৪. Relation Six (Labor Table)
    // ==========================================
    $section->addText("--- Labor Specification (Relation Six) ---", ['bold' => true, 'color' => '990000']);
    $section->addTextBreak(1);

    if ($case->six && count($case->six) > 0) {
        $tableSix = $section->addTable($tableStyle);
        
        $tableSix->addRow();
        $tableSix->addCell(2000)->addText('Labor Title', ['bold' => true]);
        $tableSix->addCell(1500)->addText('Men', ['bold' => true]);
        $tableSix->addCell(1500)->addText('Women', ['bold' => true]);
        $tableSix->addCell(1500)->addText('Total', ['bold' => true]);
        $tableSix->addCell(2500)->addText('Response', ['bold' => true]);

        foreach ($case->six as $six) {
            $tableSix->addRow();
            
            $title = is_object($six) ? ($six->labor_title_q6 ?? '') : ($six['labor_title_q6'] ?? '');
            $men   = is_object($six) ? ($six->labor_men_q6 ?? '') : ($six['labor_men_q6'] ?? '');
            $women = is_object($six) ? ($six->labor_women_q6 ?? '') : ($six['labor_women_q6'] ?? '');
            $total = is_object($six) ? ($six->labor_total_q6 ?? '') : ($six['labor_total_q6'] ?? '');
            $resp  = is_object($six) ? ($six->labor_response_q6 ?? '') : ($six['labor_response_q6'] ?? '');

            $tableSix->addCell(2000)->addText($title);
            $tableSix->addCell(1500)->addText($men);
            $tableSix->addCell(1500)->addText($women);
            $tableSix->addCell(1500)->addText($total);
            $tableSix->addCell(2500)->addText($resp);
        }
    } else {
        $section->addText("No labor data available.", ['italic' => true]);
    }
    
    $section->addTextBreak(2);

    // ==========================================
    // ৫. Relation Seven (Justice Table)
    // ==========================================
    $section->addText("--- Justice Specification (Relation Seven) ---", ['bold' => true, 'color' => '000099']);
    $section->addTextBreak(1);

    if ($case->seven && count($case->seven) > 0) {
        $tableSeven = $section->addTable($tableStyle);
        
        $tableSeven->addRow();
        $tableSeven->addCell(4000)->addText('Justice Title', ['bold' => true]);
        $tableSeven->addCell(4500)->addText('Justice Men', ['bold' => true]);

        foreach ($case->seven as $seven) {
            $tableSeven->addRow();
            
            $jTitle = is_object($seven) ? ($seven->justice_title_q7 ?? '') : ($seven['justice_title_q7'] ?? '');
            $jResp  = is_object($seven) ? ($seven->justice_men_q7 ?? '') : ($seven['justice_men_q7'] ?? '');

            $tableSeven->addCell(4000)->addText($jTitle);
            $tableSeven->addCell(4500)->addText($jResp); 
        }
    } else {
        $section->addText("No justice data available.", ['italic' => true]);
    }


    $fileName = "case_details_" . $id . ".docx";
   
    $tempPath = storage_path('app/public/' . $fileName);

    $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    
  
    $objectWriter->save($tempPath);

    
    return response()->download($tempPath, $fileName)->deleteFileAfterSend(true);
}



    public function CaseDelete($id)
    {
        $case = CaseModel::find($id);
        
    if (!$case) {
        return redirect()->back()->with([
            'messege' => 'Case not found!',
            'alert-type' => 'error'
        ]);
    }

    $case->is_delete = 1;
    $case->save();
        $notification = array(
            'messege' => ' Case Delete Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('superadmin.case.list')->with($notification);
    }
    public function GettingQuestion60Data()
    {
        $question60 = json_decode(Session::get('question60'));
        $data = (isset($question60)) ? $question60 : null;
        return response()->json($data);
    }

    public function TempSaveQuestion(Request $request)
    {

        //Recieving data by array from text input
        $question_no = $request->input('question_no');
        if ($question_no == "1") {
            $q1_data = $request->input('question1');
            $question1_data = (isset($q1_data) && !empty($q1_data)) ? $q1_data : '';
            $request->session()->put('question1', json_encode($question1_data));
            return true;
        } else if ($question_no == "46") {
            $q_46_data = $request->input('question46');
            $question46_data = (isset($q_46_data) && !empty($q_46_data)) ? $q_46_data : [];
            //    echo (json_encode($question46_data));die();
            $request->session()->put('question46', json_encode($question46_data));
            return true;
        } else if ($question_no == "2") {
            $q2_data = $request->input('q2_data');
            $question2_data = (isset($q2_data) && !empty($q2_data)) ? $q2_data : '';
            $request->session()->put('question2', json_encode($question2_data));
            return true;
        } else if ($question_no == "3") {
            $q3_data = $request->input('question3');
            $question3_data = (isset($q3_data) && !empty($q3_data)) ? $q3_data : '';
            $request->session()->put('question3', json_encode($question3_data));
            return true;
        } else if ($question_no == "4") {
            $q4_data = $request->input('question4');
            $question4_data = (isset($q4_data) && !empty($q4_data)) ? $q4_data : '';
            $request->session()->put('question4', json_encode($question4_data));
            return true;
        } else if ($question_no == "5") {
            $q5_data = $request->input('q5_data'); // тЬЕ correct key

            $question5_data = (!empty($q5_data)) ? $q5_data : '';

            $request->session()->put('question5', json_encode($question5_data));

            return true;
        }
        // else if ($question_no == "5") {
        //     $q5_data = $request->input('question5');
        //     $question5_data = (isset($q5_data) && !empty($q5_data)) ? $q5_data : '';
        //     $request->session()->put('question5', json_encode($question5_data));
        //     return true;
        // }
        else if ($question_no == "6") {
            $q6_data = $request->input('q6_data');
            $question6_data = (isset($q6_data) && !empty($q6_data)) ? $q6_data : '';
            $request->session()->put('question6', json_encode($question6_data));
            return true;
        } else if ($question_no == "7") {
            $q7_data = $request->input('q7_data');
            $question7_data = (isset($q7_data) && !empty($q7_data)) ? $q7_data : '';
            $request->session()->put('question7', json_encode($question7_data));
            return true;
        } else if ($question_no == "8") {

            $data = $request->input('question8'); // ржкрзБрж░рзЛ object

            $question8_data = (!empty($data)) ? $data : '';

            $request->session()->put('question8', json_encode($question8_data));

            return true;
        }

        // else if ($question_no == "8") {
        //     $q8_data = $request->input('q8_data');
        //     $question8_data = (isset($q8_data) && !empty($q8_data)) ? $q8_data : '';

        //     $request->session()->put('question8', json_encode($question8_data));
        //     return true;
        // }
        else if ($question_no == "9") {
            $q9_data = $request->input('question9');
            $question9_data = (isset($q9_data) && !empty($q9_data)) ? $q9_data : '';

            $request->session()->put('question9', json_encode($question9_data));
            return true;
        } else if ($question_no == "10") {
            $q10_data = $request->input('question10');
            //array object generating 
            $q10_new_data = (isset($q10_data) && !empty($q10_data)) ? $q10_data : [];
            $request->session()->put('question10', json_encode($q10_new_data));
            return true;
        } else if ($question_no == "11") {
            $q11_data = $request->input('question11');
            //array object generating 
            $q11_json_data = (isset($q11_data) && $q11_data != null) ? $q11_data : [];
            $request->session()->put('question11', json_encode($q11_json_data));
            return true;
        } else if ($question_no == "12") {
            $q12_data = $request->input('question12');
            //array object generating 
            $q12_new_data = (isset($q12_data) && !empty($q12_data)) ? $q12_data : [];
            $request->session()->put('question12', json_encode($q12_new_data));
            return true;
        } else if ($question_no == "13") {
            $q13_data = $request->input('question13');
            //array object generating 
            $q13_new_data = (isset($q13_data) && !empty($q13_data)) ? $q13_data : [];
            $request->session()->put('question13', json_encode($q13_new_data));
            return true;
        } else if ($question_no == "14") {
            $q14_data = $request->input('question14');
            //array object generating 
            $q14_new_data = (isset($q14_data) && !empty($q14_data)) ? $q14_data : [];
            $request->session()->put('question14', json_encode($q14_new_data));
            return true;
        } else if ($question_no == "15") {
            $q15_data = $request->input('question15');
            //array object generating 
            $q15_json_data = (isset($q15_data) && $q15_data != null) ? $q15_data : [];
            $request->session()->put('question15', json_encode($q15_json_data));
            return true;
        } else if ($question_no == "16") {
            $q16_data = $request->input('question16');
            //array object generating 
            $q16_json_data = (isset($q16_data) && $q16_data != null) ? $q16_data : [];
            $request->session()->put('question16', json_encode($q16_json_data));
            return true;
        } else if ($question_no == "17") {
            $q17_data = $request->input('question17');
            //array object generating 
            $q17_json_data = (isset($q17_data) && $q17_data != null) ? $q17_data : [];
            $request->session()->put('question17', json_encode($q17_json_data));
            return true;
        } else if ($question_no == "18") {
            $q18_data = $request->input('question18');
            //array object generating 
            $q18_json_data = (isset($q18_data) && $q18_data != null) ? $q18_data : [];
            $request->session()->put('question18', json_encode($q18_json_data));
            return true;
        } else if ($question_no == "19") {
            $q19_data = $request->input('question19');
            //array object generating 
            $q19_json_data = (isset($q19_data) && $q19_data != null) ? $q19_data : [];
            $request->session()->put('question19', json_encode($q19_json_data));
            return true;
        }

        return false;
    }

    public function TempSaveQuestion20To40(Request $request)
    {
        //Recieving data by array from text input
        $question_no = $request->input('question_no');
        if ($question_no == "29") {
            $q29_data = $request->input('q29_data');
            //array object generating 
            $q29_new_data = (isset($q29_data) && $q29_data != null) ? $q29_data : '';
            $request->session()->put('question29', json_encode($q29_new_data));
            return true;
        } else if ($question_no == "20") {
            $q20_data = $request->input('question20');
            //array object generating 
            $q20_json_data = (isset($q20_data) && $q20_data != null) ? $q20_data : [];
            $request->session()->put('question20', json_encode($q20_json_data));
            return true;
        }

        return false;
    }

    public function TempSaveQuestion40To60(Request $request)
    {
        //Recieving data by array from text input
        $question_no = $request->input('question_no');
        if ($question_no == "21") {
            $q21_data = $request->input('question21');
            //array object generating 
            $q21_json_data = (isset($q21_data) && $q21_data != null) ? $q21_data : [];
            $request->session()->put('question21', json_encode($q21_json_data));
            return true;
        } else if ($question_no == "22") {
            $q22_data = $request->input('question22');
            //array object generating 
            $q22_json_data = (isset($q22_data) && $q22_data != null) ? $q22_data : [];
            $request->session()->put('question22', json_encode($q22_json_data));
            return true;
        } else if ($question_no == "23") {
            $q23_data = $request->input('question23');
            //array object generating 
            $q23_json_data = (isset($q23_data) && $q23_data != null) ? $q23_data : [];
            $request->session()->put('question23', json_encode($q23_json_data));
            return true;
        } else if ($question_no == "24") {
            $q24_data = $request->input('question24');
            //array object generating 
            $q24_json_data = (isset($q24_data) && $q24_data != null) ? $q24_data : [];
            $request->session()->put('question24', json_encode($q24_json_data));
            return true;
        } else if ($question_no == "25") {
            $q25_data = $request->input('question25');
            //array object generating 
            $q25_json_data = (isset($q25_data) && $q25_data != null) ? $q25_data : [];
            $request->session()->put('question25', json_encode($q25_json_data));
            return true;
        } else if ($question_no == "26") {
            $q26_data = $request->input('question26');
            //array object generating 
            $q26_json_data = (isset($q26_data) && $q26_data != null) ? $q26_data : [];
            $request->session()->put('question26', json_encode($q26_json_data));
            return true;
        } else if ($question_no == "27") {
            $q27_data = $request->input('question27');
            //array object generating 
            $q27_json_data = (isset($q27_data) && $q27_data != null) ? $q27_data : [];
            $request->session()->put('question27', json_encode($q27_json_data));
            return true;
        } else if ($question_no == "28") {
            $q28_data = $request->input('question28');
            //array object generating 
            $q28_json_data = (isset($q28_data) && $q28_data != null) ? $q28_data : [];
            $request->session()->put('question28', json_encode($q28_json_data));
            return true;
        } else if ($question_no == "30") {
            $q30_data = $request->input('question30');
            //array object generating 
            $q30_json_data = (isset($q30_data) && $q30_data != null) ? $q30_data : [];
            $request->session()->put('question30', json_encode($q30_json_data));
            return true;
        } else if ($question_no == "31A") {
            $q31_data_one = $request->input('question31A');
            //array object generating 
            $q31_json_data_one = (isset($q31_data_one) && $q31_data_one != null) ? $q31_data_one : [];
            $request->session()->put('question31A', json_encode($q31_json_data_one));
            return true;
        } else if ($question_no == "31B") {
            $q31_data_two = $request->input('question31B');
            //array object generating 
            $q31_json_data_two = (isset($q31_data_two) && $q31_data_two != null) ? $q31_data_two : [];
            $request->session()->put('question31B', json_encode($q31_json_data_two));
            return true;
        } else if ($question_no == "32") {
            $q32_data = $request->input('question32');
            //array object generating 
            $q32_json_data = (isset($q32_data) && $q32_data != null) ? $q32_data : [];
            $request->session()->put('question32', json_encode($q32_json_data));
            return true;
        } else if ($question_no == "33") {
            $q33_data = $request->input('question33');
            //array object generating 
            $q33_json_data = (isset($q33_data) && $q33_data != null) ? $q33_data : [];
            $request->session()->put('question33', json_encode($q33_json_data));
            return true;
        } else if ($question_no == "34") {
            $q34_data = $request->input('question34');
            //array object generating 
            $q34_json_data = (isset($q34_data) && $q34_data != null) ? $q34_data : [];
            $request->session()->put('question34', json_encode($q34_json_data));
            return true;
        } else if ($question_no == "35") {
            $q35_data = $request->input('question35');
            //array object generating 
            $q35_json_data = (isset($q35_data) && $q35_data != null) ? $q35_data : [];
            $request->session()->put('question35', json_encode($q35_json_data));
            return true;
        } else if ($question_no == "36") {
            $q36_data = $request->input('question36');
            //array object generating 
            $q36_json_data = (isset($q36_data) && $q36_data != null) ? $q36_data : [];
            $request->session()->put('question36', json_encode($q36_json_data));
            return true;
        } else if ($question_no == "37") {
            $q37_data = $request->input('question37');
            //array object generating 
            $q37_json_data = (isset($q37_data) && $q37_data != null) ? $q37_data : [];
            $request->session()->put('question37', json_encode($q37_json_data));
            return true;
        } else if ($question_no == "38") {
            $q38_data = $request->input('question38');
            //array object generating 
            $q38_new_data = (isset($q38_data) && !empty($q38_data)) ? $q38_data : [];
            $request->session()->put('question38', json_encode($q38_new_data));
            return true;
        } else if ($question_no == "39") {
            $q39_data = $request->input('question39');
            //array object generating 
            $q39_json_data = (isset($q39_data) && $q39_data != null) ? $q39_data : [];
            $request->session()->put('question39', json_encode($q39_json_data));
            return true;
        } else if ($question_no == "40") {
            $q40_data = $request->input('question40');
            //array object generating 
            $q40_json_data = (isset($q40_data) && $q40_data != null) ? $q40_data : [];
            $request->session()->put('question40', json_encode($q40_json_data));
            return true;
        } else if ($question_no == "41") {
            $q41_data = $request->input('question41');
            //array object generating 
            $q41_new_data = (isset($q41_data) && !empty($q41_data)) ? $q41_data : [];
            $request->session()->put('question41', json_encode($q41_new_data));
            return true;
        } else if ($question_no == "42A") {
            $q42_data_one = $request->input('question42A');

            //array object generating 
            $q42_new_data_one = (isset($q42_data_one) && !empty($q42_data_one)) ? $q42_data_one : [];
            $request->session()->put('question42A', json_encode($q42_new_data_one));
            return true;
        } else if ($question_no == "42B") {
            $q42_data_two = $request->input('question42B');

            //array object generating 
            $q42_new_data_two = (isset($q42_data_two) && !empty($q42_data_two)) ? $q42_data_two : [];
            $request->session()->put('question42B', json_encode($q42_new_data_two));
            return true;
        } else if ($question_no == "42C") {
            $q42_data_three = $request->input('question42C');

            //array object generating 
            $q42_new_data_three = (isset($q42_data_three) && !empty($q42_data_three)) ? $q42_data_three : [];
            $request->session()->put('question42C', json_encode($q42_new_data_three));
            return true;
        } else if ($question_no == "43") {
            $q43_data = $request->input('question43');
            //array object generating 
            $q43_new_data = (isset($q43_data) && !empty($q43_data)) ? $q43_data : [];
            $request->session()->put('question43', json_encode($q43_new_data));
            return true;
        } else if ($question_no == "44") {
            $q44_data = $request->input('question44');
            //array object generating 
            $q44_new_data = (isset($q44_data) && !empty($q44_data)) ? $q44_data : [];
            $request->session()->put('question44', json_encode($q44_new_data));
            return true;
        } else if ($question_no == "45") {
            $q45_data = $request->input('question45');
            //array object generating 
            $q45_json_data = (isset($q45_data) && $q45_data != null) ? $q45_data : [];
            $request->session()->put('question45', json_encode($q45_json_data));
            return true;
        } else if ($question_no == "47") {
            $q47_data = $request->input('question47');
            //array object generating 
            $q47_new_data = (isset($q47_data) && !empty($q47_data)) ? $q47_data : [];
            $request->session()->put('question47', json_encode($q47_new_data));
            return true;
        } else if ($question_no == "48") {
            $q48_data = $request->input('question48');
            //array object generating 
            $q48_new_data = (isset($q48_data) && !empty($q48_data)) ? $q48_data : [];
            $request->session()->put('question48', json_encode($q48_new_data));
            return true;
        } else if ($question_no == "49") {
            $q49_data = $request->input('question49');
            //array object generating 
            $q49_new_data = (isset($q49_data) && !empty($q49_data)) ? $q49_data : [];
            $request->session()->put('question49', json_encode($q49_new_data));
            return true;
        } else if ($question_no == "53") {
            $q53_data = $request->input('question53');
            //array object generating 
            $q53_json_data = (isset($q53_data) && $q53_data != null) ? $q53_data : [];
            $request->session()->put('question53', json_encode($q53_json_data));
            return true;
        } else if ($question_no == "54") {
            $q54_data = $request->input('question54');
            //array object generating 
            $q54_json_data = (isset($q54_data) && $q54_data != null) ? $q54_data : [];
            $request->session()->put('question54', json_encode($q54_json_data));
            return true;
        } else if ($question_no == "55") {
            $q55_data = $request->input('question55');
            //array object generating 
            $q55_json_data = (isset($q55_data) && $q55_data != null) ? $q55_data : [];
            $request->session()->put('question55', json_encode($q55_json_data));
            return true;
        } else if ($question_no == "56") {
            $q56_data = $request->input('question56');
            //array object generating 
            $q56_json_data = (isset($q56_data) && $q56_data != null) ? $q56_data : [];
            $request->session()->put('question56', json_encode($q56_json_data));
            return true;
        } else if ($question_no == "59") {
            $q59_data = $request->input('q59_data');
            //array object generating 
            $q59_new_data = (isset($q59_data) && $q59_data != null) ? $q59_data : [];
            $request->session()->put('question59', json_encode($q59_new_data));
            return true;
        } else if ($question_no == "60") {
            $q60_data = $request->input('q60_data');
            //array object generating 
            $q60_new_data = (isset($q60_data) && $q60_data != null) ? $q60_data : [];
            $request->session()->put('question60', json_encode($q60_new_data));
            return true;
        } else if ($question_no == "58") {
            $q58_data = $request->input('q58_data');
            //array object generating 
            $q58_json_data = (isset($q58_data) && $q58_data != null) ? $q58_data : [];
            $request->session()->put('question58', json_encode($q58_json_data));
            return true;
        } else if ($question_no == "57") {
            $q57_data = $request->input('q57_data');
            //array object generating 
            $q57_json_data = (isset($q57_data) && $q57_data != null) ? $q57_data : [];
            $request->session()->put('question57', json_encode($q57_json_data));
            return true;
        } else if ($question_no == "60") {
            $q60_data = $request->input('q60_data');
            //array object generating 
            $q60_json_data = (isset($q60_data) && $q60_data != null) ? $q60_data : '';
            $request->session()->put('question60', json_encode($q60_json_data));
            return true;
        } else if ($question_no == "50") {
            $q50_data = $request->input('q50_data');
            $question50_data = (isset($q50_data) && !empty($q50_data)) ? $q50_data : '';
            $request->session()->put('question50', json_encode($question50_data));
            return true;
        } else if ($question_no == "51") {
            $q51_data = $request->input('q51_data');
            //array object generating 
            $q51_json_data = (isset($q51_data) && $q51_data != null) ? $q51_data : '';
            $request->session()->put('question51', json_encode($q51_json_data));
            return true;
        } else if ($question_no == "52") {
            $q52_data = $request->input('q52_data');
            //array object generating 
            $q52_json_data = (isset($q52_data) && $q52_data != null) ? $q52_data : '';
            $request->session()->put('question52', json_encode($q52_json_data));
            return true;
        }

        return false;
    }
}