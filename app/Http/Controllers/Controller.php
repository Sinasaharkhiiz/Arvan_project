<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function show_logout()
    {
        Auth::logout();
        Session()->flush();
        $movies='notlogin';
    return view('home',['movies'=> $movies]);
    }

    public function edit_profile()
    {
        $u_data = User::find(Auth::id());

        return view('user.edit_user', ['u_data'=> $u_data]);
    }
    public function update_user(Request $request)
    {
     $user = User::find($request->input('user_id'));
     if($request->input('u_name')) $user->name = $request->input('u_name');
     if($request->input('role')) $user->role = $request->input('role');
     if($request->hasFile('avatar')){
     $users_avatar = $user->username.".png";
     $user->avatar=$request->file('avatar')->storeAs('users-avatar',$users_avatar , 'public');
     }
     $user->save();
     toast('تغییرات با موفقیت اعمال شد','success')->position('top');
     return redirect('edit_profile');
    }
    public function Update_profile(Request $request)
   {
    $user = User::find($request->input('user_id'));
    if (Profile::where('user_id', '=', $user->id)->exists()) {
        Profile::where('user_id',$user->id)->update([
            'user_id'=>$request->input('user_id'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'state' => $request->input('state'),
            'about' => $request->input('about'),
    ]);
    }else{
        $profile = new Profile;
        $profile->user_id=$request->input('user_id');
        if($request->input('age')) $profile->age = $request->input('age');
        if($request->input('gender')) $profile->gender = $request->input('gender');
        if($request->input('state')) $profile->state = $request->input('state');
        if($request->input('about')) $profile->about = $request->input('about');
        $user->profile()->save($profile);
    }
    toast('تغییرات با موفقیت اعمال شد','success')->position('top');
    return redirect('edit_profile');
   }

   public function edit_user()
   {
       $u_data = User::find($_GET['id']);

       return view('user.edit_user', ['u_data'=> $u_data]);
   }

   public function update_user_contact(Request $request)
   {
    $user = User::find($request->input('user_id'));
    if (Profile::where('user_id', '=', $user->id)->exists()) {
        Profile::where('user_id',$user->id)->update([
            'website'=>$request->input('website'),
            'telegram' => $request->input('telegram'),
            'instagram' => $request->input('instagram'),
            'twitter' => $request->input('twitter'),
    ]);
    }else{
        $profile = new Profile;
        $profile->website=$request->input('website');
        $profile->telegram=$request->input('telegram');
        $profile->instagram=$request->input('instagram');
        $profile->twitter=$request->input('twitter');
        $user->profile()->save($profile);
    }
    toast('تغییرات با موفقیت اعمال شد','success')->position('top');
    return redirect('edit_profile');
   }

   public function delete_user(Request $req)
   {
       User::where('id',$req->input('user_id'))->delete();
       toast('کاربر با موفقیت حذف شد','success')->position('top');
       return redirect('users_management');
   }
}
