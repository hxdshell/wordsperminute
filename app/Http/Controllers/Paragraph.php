<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

$highscore = false;
class Paragraph extends Controller
{
    public static function dictionary()
    {
        if(File::exists('../storage/app/public/dictionary-common.txt')){
            $file = File::get('../storage/app/public/dictionary-common.txt');
        }
        $filearray = explode("\r\n",$file);

        $dictionary = array();

        for ($i=0; $i < 500; $i++) { 
            $dictionary[$i] = $filearray[rand(0,2993)];
        }

        return view('welcome',['dictionary' => $dictionary]);
    }
    public static function showresult(Request $request){
        $msg = $request->query('hscore');
        return view('result',['message' => $msg]);
    }
    public static function calcresult(Request $request){
        $highscore = 0;
        if(Auth::check()){
            $userid =  Auth::id();
            $user = User::find($userid);
            DB::table('tests')->insert([
                'user_id' => $userid,
                'score' => $request->wordstyped,
                'accuracy' => $request->accuracy
            ]);
            $count = Test::where('user_id',$userid)->count();
            //delete oldest test
            if($count > 10){
                $oldesttime = DB::table('tests')
                                ->select('time')
                                ->where('user_id',$userid)
                                ->orderBy('time','asc')->first();
                //delete the column
                DB::table('tests')
                    ->where('user_id',$userid)
                    ->where('time',$oldesttime->time)
                    ->delete();
            }

            //store last score
            User::where('id',$userid)
                ->update([
                    'lastscore' => $request->wordstyped,
                    'last_acc' => $request->accuracy
                ]);
            
            User::where('id',$userid)
                ->increment('tests_completed');

            //Check for highscore
            if($request->wordstyped > $user->highscore || ($user->highscore == $request->wordstyped && $request->accuracy > $user->high_acc)){
                User::where('id',$userid)
                    ->update(['highscore' => $request->wordstyped,'high_acc' => $request->accuracy]);
                $highscore = 1;
            }
            //calculate avg score
            $totalscore = DB::table('tests')
                            ->where('user_id',$userid)
                            ->sum('score');
            $totaltests = Test::where('user_id',$userid)->count();

            User::where('id',$userid)->update(['avgscore' => ($totalscore/$totaltests)]);
        }
        return response()->json(['message'=> $highscore]);
    }
    public static function about(){
        return view('about');
    }
}
