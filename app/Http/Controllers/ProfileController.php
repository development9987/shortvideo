<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile($id){
        
        $profile = Profile::where('user_id',$id)->first();

        return view('dashboard.setting.profile',compact('profile'));
    }

    
    public function profileSetting(Request $request){
        

        $profile = new Profile;


        if($request->hasFile('image')){
          
            $path = $request->file('image')->store("public/profile/images");
            $image_path = str_replace('public','',$path);

        }else{
            $image_path = $request->old_image;
        }
        $newUser = Profile::updateOrCreate([
           
            'user_id'   => Auth::user()->id,
        ],[
            
         
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'image' => $image_path,
        ]);
  

      
        if($newUser){

            return redirect()->back()->with('upload_success','Profile Updated Succesfully'); 

        }else{
            return redirect()->back()->with('upload_success','Failed To Update Profile'); 

        }


        


    }

    public function updatePassword(Request $request){

        $this->validate($request, [
       
            'password' => 'required|confirmed|min:8',
        ]);
       
        $user = User::where('id',$request->id)->first();

        $user->password = Hash::make($request->password);
        if($user->update()){

            return back()->with('message','Password Updated');

        }else{

            return back()->with('message','Something Went Wrong');

        }









    }
}
