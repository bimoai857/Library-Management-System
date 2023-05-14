<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\Issue;
class UserController extends Controller
{
    //
    public function loginUser(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required| min:5 | max:15'
        ]);
        $user=User::where('username',$request->username)->first();
       
       
        if($user){
            
            if(Hash::check($request->password,$user->password)){
                session()->put('sessionStatus',$request->username);
                return redirect('dashboard');
            }
            else{
            session()->flash('errorStatus','Error!! Incorrect Password!!');
            return back();
            }
        }
        else{
            session()->flash('errorStatus','Error!! User Not Registered!!');
            return back();
        }
    }
    
    public function registerUser(Request $request){
        $request->validate([
            'email'=>'required | email| unique:users',
            'name'=>'required',
            'username'=>'required| unique:users',
            'password'=>'required|min:5|max:15'
        ]);

        $random=Str::random(40);
        $root=URL::to('/');
        $url=$root.'/verify-email/'.$random;

        $data['email']=$request->email;
        $data['url']=$url;
        $data['title']='Email Verification';
        Mail::send('verifyMail',['data'=>$data],function($message) use($data){
            $message->to($data['email'])->subject($data['title']);
        });


        $user=new User;
        $user->email=$request->email;
        $user->name=$request->name;
        $user->remember_token=$random;
        $user->username=$request->username;
        $user->password=Hash::make($request->password);
        $user->save();
    
        session()->flash('emailSent','Email Sent');
        return back();

    }
    public function emailVerification($token){
        $user=User::where('remember_token',$token)->first();
        $user->is_verified=1;
        $user->remember_token='';
        $user->save();

        return '<h1>Email Verified</h1>';
    }

   
    public function logout(){
        if(session('sessionStatus')){
            session()->pull('sessionStatus',null);
        }
        return redirect('/loginView');
        
    }

    public function fpEmailVerification(Request $request){
        $request->validate([
            'email'=>'required|email '
        ]);
        $user=User::where('email',$request->email)->first();

        if($user){
      
        $root=URL::to('/');
        $url=$root.'/reset-password-view/'.$user->id;

        $data['email']=$request->email;
        $data['url']=$url;
        $data['title']='Email Verification';

        Mail::send('verifyMail',['data'=>$data],function($message) use($data){
            $message->to($data['email'])->subject($data['title']);
        });

        session()->flash('verifyStatus','1');
        return back();
        }
        else{
            session()->flash('verifyStatus','0');
            return back();
        }
    }
    public function resetPassword(Request $request){
        $user=User::where('id',$request->id)->first();
        $user->password=Hash::make($request->password);
        $user->save();
        return '<h1>Password Reset</h1>';
    }
    
    public function borrowers(){
        if(Issue::count()!=0){
            $usersId=Issue::distinct()->pluck('user_id');
            for($i=0;$i<count($usersId);$i++){
            $users[$i]=User::where('id',$usersId[$i])->first();
        }
        }
        else{
            $users=[];
        }
        return view('admin.borrowers',['users'=>$users]);
    }
    
}
