<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use App\Models\Exercise;
use App\Models\Music;
use App\Models\Exe_ill;
use App\Models\Injury;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Redis;
use Auth;

class AdminController extends Controller
{
   ########### TEST #############
    public function test()
    {
        return response('working');
    }



  ############ SONG FUNCTIONS #############
    public function add_song(Request $request)
    {
        try{
            $fields = $request->validate([
                'song'       =>'required']);
                
            $music = Music ::create([
                'song'       =>$fields['song']]);

        }catch(\Exception $e){
            return response()->json(['message'=>'an error occured when add song ']);
        }
        return response()->json(['message'=>'song added successfully !']);
    }

    ############    Update Song   ##########
    public function update_song(Request $request,$id)
    {
        try{
            $fields = $request->validate([
                'song'       =>'required']);
                
            $music = Music ::where('id',$id)->update([
                'song'       =>$fields['song']]);

        }catch(\Exception $e){
            return response()->json(['message'=>'an error occured when updated song']);
        }
        return response()->json(['message'=>'song updated successfully !']);
    }



    ############    DELETE SONG   ##########
    public function delete_song($id){
        $song = Music::where('id',$id)->delete();
        return response()->json(['message'=>'song deleted successfully !']);
    }

  
    

    ############# EXE FUNCTIONS ##############S
    public function add_exe(Request $request)
    {
        try{
        $fields = $request->validate([
            'name'       =>'required',
            'description'=>'required',
            'img'        =>'required',
            'set'        =>'required',
            'rep'        =>'required',
            'muscle'     =>'required',
            'purpose'    =>'required',
            'rest_time'  =>'required',
            'exe_time'   =>'required',
            'level'      =>'required',
        ]);
        $exercise = Exercise ::create([
            
            'name'       =>$fields['name'],
            'description'=>$fields['description'],
            'img'        =>$fields['img'],
            'set'        =>$fields['set'],
            'rep'        =>$fields['rep'],
            'muscle'     =>$fields['muscle'],
            'purpose'    =>$fields['purpose'],
            'rest_time'  =>$fields['rest_time'],
            'exe_time'   =>$fields['exe_time'],
            'level'      =>$fields['level']
        ]);
        }
        catch(\Exception $e){
            return response()->json(['message'=>'an error occured when add new exe !']);
        
        }
        return response()->json(['message'=>'exe added successfully !']);
    }


    ##############  UPDATE EXERCISE   ############
    public function update_exe(Request $request, $id)
    {
        try{
        $fields = $request->validate([
            'name'       =>'string',
            'description'=>'text',
            'img'        =>'text',
            'set'        =>'int',
            'rep'        =>'int',
            'muscle'     =>'string',
            'purpose'    =>'string',
            'rest_time'  =>'int',
            'exe_time'   =>'int',
            'level'      =>'int'
        ]);
        Exercise::where('id',$id)->update([
            'description'=>$fields['description'],
            'img'        =>$fields['img'],
            'set'        =>$fields['set'],
            'rep'        =>$fields['rep'],
            'purpose'    =>$fields['purpose'],
            'rest_time'  =>$fields['rest_time'],
            'exe_time'   =>$fields['exe_time'],
            'level'      =>$fields['level']
        ]);
    }catch(\Exception $e){
        return response()->json(['message'=>'an error uccored when updated exe']);
    }
        return response()->json(['message'=>'exercise updated succsesfully !']);
    }

    #########   relate foregin keys : exe_ill  #########
    public function exe_illness(Request $request,$id,$id1){
        
            try{
                $ill_id   = Injury  :: where('id',$id1)->get('id'); 
                $exe      = Exercise::find($id);
                $injuryId =  $ill_id;
                $exe->ill()->attach($injuryId);
            }catch(\Exception $e){
                return response()->json(['message'=>'an error uccored']);

            }
                return response()->json(['message'=>'We make a special Exercise for your injury ']);
       
        
    } 


    #########    DELETE EXERCISE   ########
    public function destroy_exe($id)
    {
        try{
        $q=Exercise::where('id',$id)->delete();
    }catch(\Exception $e){
        return response()->json(['message'=>'an error uccored when deleted exe']);
    }
    return response()->json(['message'=>'deleted successfully !']);
    }
    

    ######### create injury #########
    public function add_injury(Request $request){
        try{
            $fields     = $request->validate([
                'name'  =>'required'
            ]);
            Injury::create([
                'name'  =>$fields['name']
            ]);}   
            catch(\Exception $e){
            return response()->json(['message'=>'an error uccored when add new injury']);
            }
            return response()->json(['message'=>'injury added successfully']);
    
}

########### Update Injury  ###########
public function update_injury(Request $request,$id)
{
  try{
    $fields = $request->validate([
      'name' => 'required']);

    $injury   = Injury::where('id',$id)->update([
      'name' => $fields['name']]);

}catch(\Exception $e){
  return response()->json(['message'=>'an error occured when updated injury']);
}
return response()->json(['message'=>'an injury updated']);  
  
}


############ Destroy Injury ####### 
public function destroy_injury($id)
{
  try{
   Injury::where('id',$id)->delete();
  }catch(\Exception $e){
  return response()->json(['message'=>'an error occured when destroy injury']);

  }
  return response()->json(['message'=>'an injury deleted']);

}





    ######## create diets    ###########
    public function create_diet(Request $request){
        try{
            $fields     =$request->validate([
                'text'  =>'required',
                'image' =>'required',
                'type'  =>'required'
            ]);
            Diet::create([
                'text'  =>$fields['text'],
                'image' =>$fields['image'],
                'type'  =>$fields['type']
            ]);
        }catch(\Exception $e){
            return response()->json(['message'=>'an error uccored when created new diet']);
            
        }
        return response()->json(['message'=>'Diet added successfully']);

    }


    ######## Update Diet     ###########
    public function update_diet(Request $request,$id){
        try{
            $fields     =$request->validate([
                'text'  =>'required',
                'image' =>'required',
                'type'  =>'required'
            ]);
            Diet::where('id',$id)->update([
                'text'  =>$fields['text'],
                'image' =>$fields['image'],
                'type'  =>$fields['type']
            ]);
        }catch(\Exception $e){
            return response()->json(['message'=>'an error uccored when updated diet'],$e);
            
        }
        return response()->json(['message'=>'Diet updated successfuly']);

    }


    ############ Destroy Diet ####### 
public function destroy_diet($id)
{
  try{
   Diet::where('id',$id)->delete();
  }catch(\Exception $e){
  return response()->json(['message'=>'an error occured when deleted diet']);

  }
  return response()->json(['message'=>'a Diet deleted']);

}


    ######## make new admin  ###########
    public function make_new_admin(Request $request){
        try{
            $fields = $request->validate([
              'name'=>'required|string|unique:users', 
              'Email'=>'required|string|unique:users,email',
              'password'=>'required|string',
            ]);
            $user = User ::create([
              'name' =>$fields['name'],
              'Email'=>$fields['Email'],
              'password'=>bcrypt($fields['password']),
              'role'=>'admin'
            ]);
          }catch(\Exception $e){
            return response()->json(['message'=>'an error occured when make new admin']);
          }
            return response($user,201);
      }


    #######  make admin ########

    public function make_admin(Request $request){
        try{
            $fields = $request->validate([
              'name'=>'required|string',
            ]);
            $name = $fields['name'];
            $role = User::where('name',$name)->get('role');
            //return $role;
            if($role != 'trainee' || $role != 'guest'){ //did not work
        return response()->json(['message' => "$name is already an admin"]);
            }
            $user = User::where('name',$name)->limit(1)->update(['role'=>'admin']);
        }catch(\Exception $e){
            return response()->json(['message'=>'an error occured when make admin']);
        }
        return response()->json(['message' => "$name is now an admin"]);
}   
}
