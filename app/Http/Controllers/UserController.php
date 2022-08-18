<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class UserController extends Controller 
{
  ##############  REGISTER ###############
  public function register(Request $request){
    try{
        $fields = $request->validate([
          'name'=>'required|string|unique:users', 
          'Email'=>'required|string|unique:users,email',
          'password'=>'required|string',
          'role'=>'string'
        ]);
        if($request->role == 'Admin' || $request->role == 'admin'){
            return response()->json(['message'=>'cannot register as admin'],403);
        }
        $user = User ::create([
          'name' =>$fields['name'],
          'Email'=>$fields['Email'],
          'password'=>bcrypt($fields['password']),
          'role'=>$fields['role']
        ]);
        $token = $user->createToken('mytoken')->plainTextToken;
        $response = [
          'user' => $user,
          'token'=> $token
        ];
      }catch(\Exception $e){
        return response()->json(['message'=>'an error uccured in register'],$e);
      }
        return response($response,201);
  }


  ############# LOG IN ##############
  public function login(Request $request){
    try{
    $fields = $request->validate([
      'name'=>'required|string',        
      'Email'=>'required|string', 
      'password'=>'required|string',
    ]);
    //Check email
    $user = User::where('Email',$fields['Email'])->first();

    //Check pass
    if(!$user){
      return response()->json(['message' => 'user email not found'],404);
    }
    if(!Hash::check($fields['password'],$user-> password)){
      return response([
        'message'=>'password incorrect'
      ],401);
    }

    $token = $user->createToken('mytoken')->plainTextToken;
    $response = [
      'user' => $user,
      'token'=> $token
    ];
  }catch(\Exception $e){
    return response()->json(['message'=>'an error uccured in login']);
  }
    return response($response,201);
}



###############   LOG OUT  ###############
  public function logout(Request $request){  
    try{ 
        auth()->user()->tokens()->delete();
    }catch(\Exception $e){
      return response()->json(['message'=>'an error uccored in logout']);
    }
        return [
          'message'=>'Logged out !'
        ];
  }


  #############  UPDATE IDENTITY  #############
  public function update_identity(Request $request,$id)
  {
    try{
    if($request->role == 'Admin' || $request->role == 'admin'){
      return response()->json(['message'=>'cannot updated role as admin'],403);
  }
      
      User::where('id',$id)->update([
        'name' =>$request->name,
        'Email'=>$request->Email,
        'role' =>$request->role
    ]);
  }catch(\Exception $e){
    return response()->json(['message'=>'an error uccured when updated identity of user']);
  }
    return [
      'message'=>'Updated successfuly !'
    ];
  
   }





/*
public function makeadmin(Request $request,$id ){
  if(!$request->get('name'))
    return response()->json(['message' => 'name required']);

  $name = $request->input('name');
  
  /*if(!User::find($name))
    return response()->json(['message' => "$name not found"],404);*/
  /*if(! $id='1'&&['role','admin'] ){
    return response()->json(['message' => 'you are donkey']);
  }
  $q0 = User::where('name',$name)->value('name');
  $q = User::where('name',$name)->update([
    'role'=>'admin'
  ]);
  $q1 = User::where('id',$id)->get();
  return response()->json($q1);
}*/






########    SHOW ALL USERS    #########
public function all_users()
{
  try{
  $user = User::all();
  }catch(\Exception $e){
    return response()->json(['message'=>'an error uccored when show all users']);
  }
  return $user;
}



######## SHOW ALL ADMINS    ##########
public function all_admins()
{
  try{
  $admin = User::where('role','admin')->get();
  }catch(\Exception $e){
    return response()->json(['message'=>'an error uccoredwhen show all admins']);
  }
  return $admin;
}


}
?>