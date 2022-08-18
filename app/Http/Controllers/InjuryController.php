<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Injury;


class InjuryController extends Controller 
{

 
  public function all_injuries()
  {
    try{
    return Injury::all();
    }catch(\Exception $e){
      return response()->json(['message'=>'an error accurd when show all injuries']);
    }
  }

  


  public function show_injury($id)
  {
    try{
    $show = Injury::where('id',$id)->get();
    }catch(\Exception $e){
    return response()->json(['message'=>'an error occured when show this injury']);
    }
    return $show;

  }

  
  
  
}

?>