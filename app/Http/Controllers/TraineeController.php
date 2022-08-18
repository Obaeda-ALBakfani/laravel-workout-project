<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Exercise_injury;
use Illuminate\Http\Response;
use App\Models\Trainee;
use App\Models\Injury;
use App\Models\Trainee_ill;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Nette\Utils\Random;

class TraineeController extends Controller
{


  public function all_trainee()
  {
    try {
      $trainee = Trainee::all();
    } catch (\Exception $e) {
      return response()->json(['message' => 'an error uccored when show all trainees']);
    }
    return $trainee;
  }


  public function create_trainee(Request $request)
  {
    try {
      $fields  = $request->validate([
        'gender' => 'required|string',
        'height' => 'required|string',
        'weight' => 'required|string',
        'level'  => 'required',
      ]);

      if (!$request->purpose) {
        if ($fields['height'] - $fields['weight'] < 95) {
          $purpose = 'loss weight';
        } elseif ($fields['height'] - $fields['weight'] > 105) {
          $purpose = 'gain weight';
        } else {
          $purpose = 'fitness';
        }
      } else $purpose = $request->purpose;

      $trainee = Trainee::create([
        'user_id' => auth()->user()->id,
        'gender' => $fields['gender'],
        'height' => $fields['height'],
        'weight' => $fields['weight'],
        'level'  => $fields['level'],
        'purpose' => $purpose

      ]);
    } catch (\Exception $e) {
      return response()->json(['message' => 'an error uccured when created trainee'], $e);
    }
    return response()->json(['message' => 'an account created successfully !']);
  }

  public function choose_injury(Request $request, $id, $id1)
  {

    try {
      $ill_id       = Injury::where('id', $id1)->get('id');
      $Trainee      = Trainee::find($id);
      $Trainee->ill()->attach($ill_id);
    } catch (\Exception $e) {
      return response()->json(['message' => 'an error uccored']);
    }
    return response()->json(['message' => 'injury added succesfully']);
  }

  ////////////   creating exercises for this trainee   ////////////
  public function suggesting_exe($id)
  {
    $purpose = Trainee::where('id', $id)->get('purpose');
    $level = Trainee::where('id', $id)->get('level');
    $injuries = Trainee_ill::where('trainee_id', $id)->get('injury_id');
    

    $q=Exercise :: join('exercise_injury',function($join) use ($injuries){
      $join -> on('exercise_injury.exercise_id','=','exercises.id')
      -> whereIn('exercise_injury.injury_id',$injuries);
    })-> distinct() -> get('exercises.id');
    
    $exercises = Exercise::whereNotIn('id', $q)->get('id');
    echo $exercises;
    // for($i = 0; $i<3 ; $i++){
    //     if($level == 1){
    //     if($exercises->muscle == 'chest'){
    //       $a[$i]= $exercises->id;
    //     }
    //   elseif($level == 2){
        
    //   }elseif($level == 3){
        
    //   }
    //   }
    // }
    $exercise = Exercise::whereIn('id',$exercises)->inRandomOrder()->limit(3)->get('id');
   // $id->exe()->attach($exercise);
   //for($i = 0;$i < count($exercise);$i++) {
     echo $exercise;
    DB::table('trainee_exe')->insert([
      'trainee_id' => $id,
      'exercise_id'=>$exercise->get()
    ]);     
  //  }
  }

  ########### show Trainee ############

  public function show_trainee($id)
  {
    try {
      $trainee = Trainee::where('id', $id)->get();
    } catch (\Exception $e) {
      return response()->json(['message' => 'an error occured when showing trainee']);
    }
    return response($trainee);
  }


  ########### Update Trainee ############
  public function update_Trainee(Request $request, $id)
  {
    try {
      if ($request->role == 'Admin' || $request->role == 'admin' || $request->role == 'guest' || $request->role == 'Guest') {
        return response()->json(['message' => 'You Must Be a Trainee'], 403);
      }

      Trainee::where('user_id', $id)->update([
        'gender' => $request->gender,
        'height' => $request->height,
        'weight' => $request->weight,
        'level'  => $request->level
      ]);
    } catch (\Exception $e) {
      return response()->json(['message' => 'an error occured when updating trainee']);
    }
    return [
      'message' => 'Updated successfuly !'
    ];
  }
}
