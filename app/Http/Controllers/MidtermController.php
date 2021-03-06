<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\StudentProfile;
use App\Score;
use App\Grade;
use View;
use App\KLevel;

use App\SecondaryLevel;
use App\Subject;
use App\PrekScore;
use App\SecondaryScore;
use App\GradeProfile;
use App\AbsentRecord;
use App\SecondaryAbsent;
use App\PrekAbsent;
use App\DayPresent;
use App\Midterm;


class MidtermController extends Controller
{

public function __construct()
    {
         $this->middleware('auth:admin');
       // $this->middleware('auth:teacher');
        


        $this->grade = Grade::all();
        View::share('grade', $this->grade);

        $this->kgrade = KLevel::all();
        View::share('kgrade', $this->kgrade);



        $this->secondaryGrade = SecondaryLevel::orderBy('name', 'asc')->get();
        View::share('secondaryGrade', $this->secondaryGrade);

        $this->subject = Subject::all();
        View::share('subject', $this->subject);

        $this->gradeProfile = GradeProfile::orderBy('order', 'asc')->get();
        View::share('gradeProfile', $this->gradeProfile);


        $this->daypresent = DayPresent::all();
        View::share('daypresent', $this->daypresent);

        

    }

    public function midTermOption($student_id)
    {
       
        $call = new Midterm();
        return $call->calling($student_id);
        // $student = StudentProfile::find($student_id);
        // $grade = Grade::all();

        // return view('admin.student.mid_term.midTerm_menu')
        //     ->with(['students' => $student, 'grade' => $grade]);

    }    
    

    //midter print view for Prek

public function prekPrintView(Request $request, $student_id){

    $student = StudentProfile::find($student_id);

    $checked_id = $request->input('kgrade');
    $selectedDaypresent = $request->daypresent;
    
    $dayPresents = DayPresent::all();

    

 

    $kscore = PrekScore::where('student_profile_id', $student_id)
    ->whereIn('k_level_id', $checked_id)->get();

    //Personal Planning-Intellectual Development
    $PPI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'PPI']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // English Language Arts-Intellectual Development
    $ELAI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'ELAI']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // Khmer Language Arts-Intellectual Development
    $KLAI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'KLAI']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // Mathematics-Intellectual Development
    $MI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'MI']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // Social Studies-Intellectual Development
    $SSI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SSI']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // Science-Intellectual Development
    $SI = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SI']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // Fine Arts-Aesthetic and Artistic Development
    $FAA = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'FAA']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // PEP : Physical Education-Physical Development
    $PEP = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'PEP']] )
        ->whereIn('k_level_id', $checked_id)->get();

    // SRS : Physical Education-Physical Development
    $SRS = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SRS']] )
         ->whereIn('k_level_id', $checked_id)->get();

    //Absent report         
    //Quarter_1
    $nonCount_absent_Quarter_1 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_1')->where('absent_type', 'non-count')->count();
    //count tardy in quarter_1
    $countTardy_Quarter_1 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_1')->where('absent_type', 'Tardy')->count();
    

    $prek_quarter_1 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_1')->count();
    

    $absent_tardy_quarter_1 = 0;

    if($countTardy_Quarter_1 >= 3){
        $absent_tardy_quarter_1 = floor($countTardy_Quarter_1/3);
    }elseif($countTardy_Quarter_1<3){
        $absent_tardy_quarter_1;
    }

    $prek_absent_quarter_1 = abs((($prek_quarter_1-$countTardy_Quarter_1)+$absent_tardy_quarter_1)-$nonCount_absent_Quarter_1);



        $prek_daypresent_quarter_1 = PrekAbsent::where('student_profile_id', $student_id)
        ->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_1'] ])->first();

        if($prek_daypresent_quarter_1 == null){
            $total_daypresent_1 = 0;
        }else{
            $total_daypresent_1 = $prek_daypresent_quarter_1->quarter_day_present;
        }
            
    //Quarter_2
    $nonCount_absent_Quarter_2 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
        ->where('quarter_name','Quarter_2')->where('absent_type', 'non-count')->count();
        //count tardy in quarter_2
    $countTardy_Quarter_2 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_2')->where('absent_type', 'Tardy')->count();
    

    $prek_quarter_2 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_2')->count();
    

    $absent_tardy_quarter_2 = 0;

    if($countTardy_Quarter_2 >= 3){
        $absent_tardy_quarter_2 = floor($countTardy_Quarter_2/3);
    }elseif($countTardy_Quarter_2<3){
        $absent_tardy_quarter_2;
    }

    $prek_absent_quarter_2 = abs((($prek_quarter_2-$countTardy_Quarter_2)+$absent_tardy_quarter_2)-$nonCount_absent_Quarter_2);

        $prek_daypresent_quarter_2 = PrekAbsent::where('student_profile_id', $student_id)
        ->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_2'] ])->first();

        if($prek_daypresent_quarter_2 == null){
            $total_daypresent_2 = 0;
        }else{
            $total_daypresent_2 = $prek_daypresent_quarter_2->quarter_day_present;
        }

    //Quarter_3
    $nonCount_absent_Quarter_3 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
        ->where('quarter_name','Quarter_3')->where('absent_type', 'non-count')->count();    
    
    //count tardy in quarter_3
    $countTardy_Quarter_3 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_3')->where('absent_type', 'Tardy')->count();
    

    $prek_quarter_3 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_3')->count();
    

    $absent_tardy_quarter_3 = 0;

    if($countTardy_Quarter_3 >= 3){
        $absent_tardy_quarter_3 = floor($countTardy_Quarter_3/3);
    }elseif($countTardy_Quarter_3<3){
        $absent_tardy_quarter_3;
    }

    $prek_absent_quarter_3 = abs((($prek_quarter_3-$countTardy_Quarter_3)+$absent_tardy_quarter_3)-$nonCount_absent_Quarter_3);

        $prek_daypresent_quarter_3 = PrekAbsent::where('student_profile_id', $student_id)
        ->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_3'] ])->first();

        if($prek_daypresent_quarter_3 == null){
            $total_daypresent_3 = 0;
        }else{
            $total_daypresent_3 = $prek_daypresent_quarter_3->quarter_day_present;
        }

    //Quarter_4
    $nonCount_absent_Quarter_4 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
        ->where('quarter_name','Quarter_4')->where('absent_type', 'non-count')->count(); 

    //count tardy in quarter_4
    $countTardy_Quarter_4 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_4')->where('absent_type', 'Tardy')->count();
    

    $prek_quarter_4 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
    ->where('quarter_name','Quarter_4')->count();
    

    $absent_tardy_quarter_4 = 0;

    if($countTardy_Quarter_4 >= 3){
        $absent_tardy_quarter_4 = floor($countTardy_Quarter_4/3);
    }elseif($countTardy_Quarter_4<3){
        $absent_tardy_quarter_4;
    }

    $prek_absent_quarter_4 = abs((($prek_quarter_4-$countTardy_Quarter_4)+$absent_tardy_quarter_4)-$nonCount_absent_Quarter_4);

        $prek_daypresent_quarter_4 = PrekAbsent::where('student_profile_id', $student_id)
        ->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_4'] ])->first();

        if($prek_daypresent_quarter_4 == null){
            $total_daypresent_4 = 0;
        }else{
            $total_daypresent_4 = $prek_daypresent_quarter_4->quarter_day_present;
        }  

            return view('admin.student.mid_term.midterm_prek_printview')
                        ->with([

                'kscore'=>$kscore,
                'student'=>$student,
                'subject_code_PPI'=>$PPI,
                'subject_code_ELAI'=>$ELAI,
                'subject_code_KLAI'=>$KLAI,
                'subject_code_MI'=>$MI,
                'subject_code_SSI'=>$SSI,
                'subject_code_SI'=>$SI,
                'subject_code_FAA'=>$FAA,
                'subject_code_PEP'=>$PEP,
                'subject_code_SRS'=>$SRS,

                //selected daypresent
                'selectedDaypresent'=>$selectedDaypresent,
                'dayPresents'=>$dayPresents,

        //dayspresnt report

                //Quarter_1
                'total_daypresent_1'=>$total_daypresent_1,
                'prek_absent_quarter_1'=>$prek_absent_quarter_1,
                //Quarter_2
                'total_daypresent_2'=>$total_daypresent_2,
                'prek_absent_quarter_2'=>$prek_absent_quarter_2,

                //Quarter_3
                'total_daypresent_3'=>$total_daypresent_3,
                'prek_absent_quarter_3'=>$prek_absent_quarter_3,

                //Quarter_4
                'total_daypresent_4'=>$total_daypresent_4,
                'prek_absent_quarter_4'=>$prek_absent_quarter_4,

            ]);
            


        }

        //update midterm score for prek

    public function midtermUpdatePrekScore(Request $request)
    {

        
        PrekScore::find($request->pk)->update([$request->name => $request->value]);

        return response()->json(['success'=>'done']);
    } 
    
    
//print view for Grade K(midterm)

public function gradeKPrintView(Request $request, $student_id){

    $student = StudentProfile::find($student_id);

    $checked_id = $request->input('kgrade');

    $selectedDaypresent = $request->daypresent;
    
    $dayPresents = DayPresent::all();



    $kscore = PrekScore::where('student_profile_id', $student_id)
    ->whereIn('k_level_id', $checked_id)->get();

    //SD : Spiritual Development
    $SD = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SD']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // PD : Personal/Social Development
    $PD = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'PD']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // ART = Art
    $ART = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'ART']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // MUSIC: Music
    $MUSIC = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'MUSIC']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // DERWS: Demontrantes emergent reading and writing skills(English section)
    $DERWS = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'DERWS']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // EAWSS: Exhibits appropriate word study skills(English section)
    $EAWSS = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'EAWSS']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // DERWS_KH : Demontrantes emergent reading and writing skills (Khmer Section)
    $DERWS_KH = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'DERWS_KH']] )
        ->whereIn('k_level_id', $checked_id)->get();
    // EASWSS : Exhibits appropriate word study skills(Khmer section)
    $EAWSS_KH = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'EAWSS_KH']] )
        ->whereIn('k_level_id', $checked_id)->get();

    // MATH : Mathematics (Refer to tracking card)
    $MATH = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'MATH']] )
         ->whereIn('k_level_id', $checked_id)->get();

    // PEDH : Physical Educe do / Health(Refer to tracking card)
    $PEDH = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'PEDH']] )
         ->whereIn('k_level_id', $checked_id)->get();
    // SCIENCE : Science
    $SCIENCE = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SCIENCE']] )
         ->whereIn('k_level_id', $checked_id)->get(); 

    // SS : Social Science
    $SS = PrekScore::where([['student_profile_id', $student_id], ['subject_code', 'SS']] )
         ->whereIn('k_level_id', $checked_id)->get();
         
//Absent report         
//Quarter_1
$nonCount_absent_Quarter_1 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
->where('quarter_name','Quarter_1')->where('absent_type', 'non-count')->count();
//count tardy in quarter_1
$countTardy_Quarter_1 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
->where('quarter_name','Quarter_1')->where('absent_type', 'Tardy')->count();


$prek_quarter_1 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
->where('quarter_name','Quarter_1')->count();


$absent_tardy_quarter_1 = 0;

if($countTardy_Quarter_1 >= 3){
   $absent_tardy_quarter_1 = floor($countTardy_Quarter_1/3);
}elseif($countTardy_Quarter_1<3){
   $absent_tardy_quarter_1;
}

$prek_absent_quarter_1 = abs((($prek_quarter_1-$countTardy_Quarter_1)+$absent_tardy_quarter_1)-$nonCount_absent_Quarter_1);



$prek_daypresent_quarter_1 = PrekAbsent::where('student_profile_id', $student_id)
->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_1'] ])->first();

if($prek_daypresent_quarter_1 == null){
    $total_daypresent_1 = 0;
}else{
    $total_daypresent_1 = $prek_daypresent_quarter_1->quarter_day_present;
}
    
//Quarter_2
$nonCount_absent_Quarter_2 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
->where('quarter_name','Quarter_2')->where('absent_type', 'non-count')->count();
//count tardy in quarter_2
$countTardy_Quarter_2 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
->where('quarter_name','Quarter_2')->where('absent_type', 'Tardy')->count();


$prek_quarter_2 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
->where('quarter_name','Quarter_2')->count();


$absent_tardy_quarter_2 = 0;

if($countTardy_Quarter_2 >= 3){
   $absent_tardy_quarter_2 = floor($countTardy_Quarter_2/3);
}elseif($countTardy_Quarter_2<3){
   $absent_tardy_quarter_2;
}

$prek_absent_quarter_2 = abs((($prek_quarter_2-$countTardy_Quarter_2)+$absent_tardy_quarter_2)-$nonCount_absent_Quarter_2);

$prek_daypresent_quarter_2 = PrekAbsent::where('student_profile_id', $student_id)
->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_2'] ])->first();

if($prek_daypresent_quarter_2 == null){
    $total_daypresent_2 = 0;
}else{
    $total_daypresent_2 = $prek_daypresent_quarter_2->quarter_day_present;
}

//Quarter_3
$nonCount_absent_Quarter_3 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
->where('quarter_name','Quarter_3')->where('absent_type', 'non-count')->count();
 //count tardy in quarter_3
$countTardy_Quarter_3 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
->where('quarter_name','Quarter_3')->where('absent_type', 'Tardy')->count();


$prek_quarter_3 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
->where('quarter_name','Quarter_3')->count();


$absent_tardy_quarter_3 = 0;

if($countTardy_Quarter_3 >= 3){
   $absent_tardy_quarter_3 = floor($countTardy_Quarter_3/3);
}elseif($countTardy_Quarter_3<3){
   $absent_tardy_quarter_3;
}

$prek_absent_quarter_3 = abs((($prek_quarter_3-$countTardy_Quarter_3)+$absent_tardy_quarter_3)-$nonCount_absent_Quarter_3);

$prek_daypresent_quarter_3 = PrekAbsent::where('student_profile_id', $student_id)
->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_3'] ])->first();

if($prek_daypresent_quarter_3 == null){
    $total_daypresent_3 = 0;
}else{
    $total_daypresent_3 = $prek_daypresent_quarter_3->quarter_day_present;
}

//Quarter_4
$nonCount_absent_Quarter_4 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
->where('quarter_name','Quarter_4')->where('absent_type', 'non-count')->count();
 //count tardy in quarter_4
$countTardy_Quarter_4 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
->where('quarter_name','Quarter_4')->where('absent_type', 'Tardy')->count();


$prek_quarter_4 = PrekAbsent::where('student_profile_id', $student_id)->where('k_level_id', $checked_id)
->where('quarter_name','Quarter_4')->count();


$absent_tardy_quarter_4 = 0;

if($countTardy_Quarter_4 >= 3){
   $absent_tardy_quarter_4 = floor($countTardy_Quarter_4/3);
}elseif($countTardy_Quarter_4<3){
   $absent_tardy_quarter_4;
}

$prek_absent_quarter_4 = abs((($prek_quarter_4-$countTardy_Quarter_4)+$absent_tardy_quarter_4)-$nonCount_absent_Quarter_4);

$prek_daypresent_quarter_4 = PrekAbsent::where('student_profile_id', $student_id)
->where([ ['k_level_id', $checked_id],['quarter_name','Quarter_4'] ])->first();

if($prek_daypresent_quarter_4 == null){
    $total_daypresent_4 = 0;
}else{
    $total_daypresent_4 = $prek_daypresent_quarter_4->quarter_day_present;
}



    return view('admin.student.mid_term.midterm_gradeK_printview')
                ->with([

        'kscore'=>$kscore,
        'student'=>$student,
        'subject_code_SD'=>$SD,
        'subject_code_PD'=>$PD,
        'subject_code_ART'=>$ART,
        'subject_code_MUSIC'=>$MUSIC,
        'subject_code_DERWS'=>$DERWS,
        'subject_code_EAWSS'=>$EAWSS,
        'subject_code_DERWS_KH'=>$DERWS_KH,
        'subject_code_EAWSS_KH'=>$EAWSS_KH,
        'subject_code_MATH'=>$MATH,
        'subject_code_PEDH'=>$PEDH,
        'subject_code_SCIENCE'=>$SCIENCE,
        'subject_code_SS'=>$SS,

        //selected daypresent
        'selectedDaypresent'=>$selectedDaypresent,
        'dayPresents'=>$dayPresents,
                    
        //dayspresnt report

        //Quarter_1
        'total_daypresent_1'=>$total_daypresent_1,
        'prek_absent_quarter_1'=>$prek_absent_quarter_1,
        //Quarter_2
        'total_daypresent_2'=>$total_daypresent_2,
        'prek_absent_quarter_2'=>$prek_absent_quarter_2,

        //Quarter_3
        'total_daypresent_3'=>$total_daypresent_3,
        'prek_absent_quarter_3'=>$prek_absent_quarter_3,

        //Quarter_4
        'total_daypresent_4'=>$total_daypresent_4,
        'prek_absent_quarter_4'=>$prek_absent_quarter_4,

        ]);
    
    }

    //update gradeK score for midterm
    public function midtermUpdateGradeKScore(Request $request)
    {
       
        PrekScore::find($request->pk)->update([$request->name => $request->value]);

        return response()->json(['success'=>'done']);
    } 

    //midterm printview primary and secondary school (grade 1-8 midterm)
public function secondarySchoolPrintView(Request $request, $student_id){

        $student = StudentProfile::find($student_id);

        $checked_id = $request->input('secondaryGrade');

        $selectedDaypresent = $request->daypresent;
    
        $dayPresents = DayPresent::all();

    //Quarter_1
    $nonCount_absent_Quarter_1 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_1')->where('absent_type', 'non-count')->count();
    //count tardy in quarter_1
    $countTardy_Quarter_1 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_1')->where('absent_type', 'Tardy')->count();


    $secondaryschool_quarter_1 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_1')->count();


    $absent_tardy_quarter_1 = 0;

    if($countTardy_Quarter_1 >= 3){
    $absent_tardy_quarter_1 = floor($countTardy_Quarter_1/3);
    }elseif($countTardy_Quarter_1<3){
    $absent_tardy_quarter_1;
    }

    $secondaryschool_absent_quarter_1 = abs((($secondaryschool_quarter_1-$countTardy_Quarter_1)+$absent_tardy_quarter_1)-$nonCount_absent_Quarter_1);


    $secondaryschool_daypresent_quarter_1 = SecondaryAbsent::where('student_profile_id', $student_id)
    ->where([ ['secondary_level_id', $checked_id],['quarter_name','Quarter_1'] ])->first();

    if($secondaryschool_daypresent_quarter_1 == null){
        $total_daypresent_1 = 0;
    }else{
        $total_daypresent_1 = $secondaryschool_daypresent_quarter_1->quarter_day_present;
    }
        
    //Quarter_2
    $nonCount_absent_Quarter_2 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_2')->where('absent_type', 'non-count')->count();
    //count tardy in quarter_2
    $countTardy_Quarter_2 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_2')->where('absent_type', 'Tardy')->count();


    $secondaryschool_quarter_2 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_2')->count();


    $absent_tardy_quarter_2 = 0;

    if($countTardy_Quarter_2 >= 3){
        $absent_tardy_quarter_2 = floor($countTardy_Quarter_2/3);
    }elseif($countTardy_Quarter_2<3){
        $absent_tardy_quarter_2;
    }

    $secondaryschool_absent_quarter_2 = abs((($secondaryschool_quarter_2-$countTardy_Quarter_2)+$absent_tardy_quarter_2)-$nonCount_absent_Quarter_2);

    $secondaryschool_daypresent_quarter_2 = SecondaryAbsent::where('student_profile_id', $student_id)
    ->where([ ['secondary_level_id', $checked_id],['quarter_name','Quarter_2'] ])->first();

    if($secondaryschool_daypresent_quarter_2 == null){
        $total_daypresent_2 = 0;
    }else{
        $total_daypresent_2 = $secondaryschool_daypresent_quarter_2->quarter_day_present;
    }

    //Quarter_3
    $nonCount_absent_Quarter_3 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_3')->where('absent_type', 'non-count')->count();
    //count tardy in quarter_3
    $countTardy_Quarter_3 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_3')->where('absent_type', 'Tardy')->count();


    $secondaryschool_quarter_3 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_3')->count();


    $absent_tardy_quarter_3 = 0;

    if($countTardy_Quarter_3 >= 3){
    $absent_tardy_quarter_3 = floor($countTardy_Quarter_3/3);
    }elseif($countTardy_Quarter_3<3){
    $absent_tardy_quarter_3;
    }

    $secondaryschool_absent_quarter_3 = abs((($secondaryschool_quarter_3-$countTardy_Quarter_3)+$absent_tardy_quarter_3)-$nonCount_absent_Quarter_3);

    $secondaryschool_daypresent_quarter_3 = SecondaryAbsent::where('student_profile_id', $student_id)
    ->where([ ['secondary_level_id', $checked_id],['quarter_name','Quarter_3'] ])->first();

    if($secondaryschool_daypresent_quarter_3 == null){
        $total_daypresent_3 = 0;
    }else{
        $total_daypresent_3 = $secondaryschool_daypresent_quarter_3->quarter_day_present;
    }

    //Quarter_4
    $nonCount_absent_Quarter_4 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_4')->where('absent_type', 'non-count')->count();
    //count tardy in quarter_4
    $countTardy_Quarter_4 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_4')->where('absent_type', 'Tardy')->count();


    $secondaryschool_quarter_4 = SecondaryAbsent::where('student_profile_id', $student_id)->where('secondary_level_id', $checked_id)
    ->where('quarter_name','Quarter_4')->count();


    $absent_tardy_quarter_4 = 0;

    if($countTardy_Quarter_4 >= 3){
        $absent_tardy_quarter_4 = floor($countTardy_Quarter_4/3);
    }elseif($countTardy_Quarter_4<3){
        $absent_tardy_quarter_4;
    }

    $secondaryschool_absent_quarter_4 = abs((($secondaryschool_quarter_4-$countTardy_Quarter_4)+$absent_tardy_quarter_4)-$nonCount_absent_Quarter_4);

    $secondaryschool_daypresent_quarter_4 = SecondaryAbsent::where('student_profile_id', $student_id)
    ->where([ ['secondary_level_id', $checked_id],['quarter_name','Quarter_4'] ])->first();

    if($secondaryschool_daypresent_quarter_4 == null){
        $total_daypresent_4 = 0;
    }else{
        $total_daypresent_4 = $secondaryschool_daypresent_quarter_4->quarter_day_present;
    }

    $yearly_absent = $secondaryschool_absent_quarter_1 +
        $secondaryschool_absent_quarter_2+
        $secondaryschool_absent_quarter_3+
        $secondaryschool_absent_quarter_4;

        $yearly_daypresent = $total_daypresent_1+$total_daypresent_2+$total_daypresent_3+$total_daypresent_4;


        $secondaryscore = SecondaryScore::where('student_profile_id', $student_id)
        ->where('secondary_level_id', $checked_id)->get();


        return view('admin.student.mid_term.midterm_secondary_printview')
                    ->with([

            'secondaryscore'=>$secondaryscore,
            'student'=>$student,

            //Quarter_1
            'total_daypresent_1'=>$total_daypresent_1,
            'secondaryschool_absent_quarter_1'=>$secondaryschool_absent_quarter_1,
            //Quarter_2
            'total_daypresent_2'=>$total_daypresent_2,
            'secondaryschool_absent_quarter_2'=>$secondaryschool_absent_quarter_2,

            //Quarter_3
            'total_daypresent_3'=>$total_daypresent_3,
            'secondaryschool_absent_quarter_3'=>$secondaryschool_absent_quarter_3,

            //Quarter_4
            'total_daypresent_4'=>$total_daypresent_4,
            'secondaryschool_absent_quarter_4'=>$secondaryschool_absent_quarter_4,
            'yearly_daypresent'=>$yearly_daypresent,
            'yearly_absent'=>$yearly_absent,

            //selected daypresent
            'selectedDaypresent'=>$selectedDaypresent,
            'dayPresents'=>$dayPresents,
            
            ]);

        }

        //update secondaryschool score for midterm
        public function midtermUpdateSecondaryScore(Request $request)
        {
           
            SecondaryScore::find($request->pk)->update([$request->name => $request->value]);
    
            return response()->json(['success'=>'done']);
        }
        
        //midterm printview high school (grade 9 to 12)
        
        public function midtermHighSchool(Request $request, $student_id)
        {
            $midtermHighSchool = new Midterm();
            return $midtermHighSchool->midtermHighSchoolPrintView($request,$student_id);
        }

        //update high school score for midterm
        public function midtermUpdateHighSchoolScore(Request $request)
        {
           
            Score::find($request->pk)->update([$request->name => $request->value]);
    
            return response()->json(['success'=>'done']);
        }
        

        

    

}
