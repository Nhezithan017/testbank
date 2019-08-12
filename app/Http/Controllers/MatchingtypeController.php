<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matchingtype;
use App\Course;

class MatchingtypeController extends Controller
{
    public function getMT(Course $courses)
    {
 
    $question_mt = $courses->matchingtype;
    
     return response()->json([
         'data' => $question_mt,
         'msg' => 'Fetch',
         'status' => 200
     ]);
    }
    public function upsert(Request $request,Course $courses)
    {
        
       
        $ques_mt = $request->post('item');
        foreach($ques_mt as $qmt)
        {
        

            if($qmt['id'])
            {
                Matchingtype::where('id', $qmt['id'])->update($qmt);
            }else{
                Matchingtype::create($qmt + ['course_id' => $courses->id ]);
            }
        }

        return ['success' => true];
    }
    public function remove(Matchingtype $mtId){

            $mtId->delete();
    }
}
