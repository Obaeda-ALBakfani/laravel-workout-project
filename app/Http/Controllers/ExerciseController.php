<?php 

namespace App\Http\Controllers;

use App\Models\Diet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Exercise;
use App\Models\Music;



class ExerciseController extends Controller 
{

  ######### All Exercise  #########

     public function all_exe()
  {
    try{
      $exercise = Exercise::/*orderBy('created_at','DESC')->*/get();
      }catch(\Exception $e){
        return response()->json(['message'=>'an error uccored when show all exercises']);
      }
    return response($exercise);
  }


  

  ######### Show Exercise  #########
  public function show_exe($id)
  {
    try{
    $exercise = Exercise::where('id',$id)->get();
    }catch(\Exception $e){
      return response()->json(['message'=>'an error uccored when show this exe']);
    }
    return response($exercise);
  }


    #########  All Diets  ##########
    public function all_diets(){
      try{
      $diet = Diet::all();
      }catch(\Exception $e){
      return response()->json(['message'=>'an error uccored when show all diets']);
      }
      return $diet;
    }


       #########  Show Music  #########
  public function show_diet($id){
    try{
    $show = Music::where('id',$id)->get();
    }catch(\Exception $e){
      return response()->json(['message'=>'an error uccored when show this diets']);
    }
    return $show;
  }
  
    #########  Show Music  #########
  public function show_music($id){
    try{
    $show = Music::where('id',$id)->get();
    }catch(\Exception $e){
      return response()->json(['message'=>'an error uccored when show this music']);
    }
    return $show;
  }

  
  

    ########## All Music  ########
  public function all_music(){
    try{
    $music = Music::all();
    }catch(\Exception $e){
      return response()->json(['message'=>'an error uccored when show all music']);
    }
    return $music;
  }
  
  
}

?>