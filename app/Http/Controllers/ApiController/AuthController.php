<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Models\Client;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator as ValidationValidator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rule = [
            'email'=>'required',
            'password'=>'required',
       
        ];
        $data = Validator()->make($request->all(),$rule);
        if($data->fails()){
            return response()->json(['status'=>0,'message'=>'failed',$data->errors()->first()]);
        }
        $client = Client::where('email',$request->email)->first();
        
        if($client){
            if(Hash::check($request->password,$client->password)){
                $Token = $client->createToken('tokenName')->accessToken;
                return response()->json(['status'=>1,'message'=>'you are Login',['Token'=>$Token,'client'=>$client]]);

            }else{
                return response()->json(['status'=>0,'message'=>'data error']);

            }
           
            
        }
           
        
    }


    public function register(Request $request){
        

        $rule = [
            'first_name'=>'required',
            'secound_name'=>'required',
            'email'=>'required',
            'Address'=>'required',
            'phone'=>'required',
            'password'=>'required',
    
        ];
        $valid = Validator()->make($request->all(),$rule);
        if($valid){
                $request->merge(['password' => bcrypt($request->password)]);
            $client = Client::create($request->all());
            return response()->json(['status'=>1,'message'=>'تم التسجيل بنجاح',$client]);

            
        }
        return response()->json(['status'=>1,'message'=>'failed','data'=>$valid->errors()->first()]);

        

    }



    public function forgetPassword(Request $request){
       
        $rule = [
            'email'=>'required',    
        ];
        $valid = Validator()->make($request->all(),$rule);
        if($valid->fails()){
            return response()->json(['status'=>0,'message'=>'يجب ادخال لايميل',$valid->errors()->first()]);

        }else{
            $email = $request->email;
        $client = Client::where('email',$email)->first();
        if($client){
            $Token = Str::random(10);
            DB::table('password_resets')->insert([
                'email'=>$email,
                'token'=>$Token,
            ]);
            Mail::send('passwords.reset', function ( $message) use($email) {
                $message->to($email);
                $message->sender('Reset Your Password');
                $message->subject('Subject');
                $message->priority(3);
                $message->attach('pathToFile');
            });
            return response()->json(['status'=>1,'message'=>'تم التسجيل من قبل بالفعل','data'=>$client]);

        }
        return response()->json(['status'=>0,'message'=>'لا يوجد حساب متعلق بهذا الايميل',$client]);
    }
    }
    public function updateProfile(Request $request){
        $rule = [
            'first_name'=>'required',
            'secound_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
    ];
    $valida = Validator()->make($request->all(),$rule);
    if($valida->fails()){
        return response()->json(['status'=>0,'message'=>'failed','errors'=>$valida->errors()->first()]);

    }
        $user = Auth::user();
        if($user){
            $user->update([
                'first_name'=>$request->first_name,
                'email'=>$request->email,
                'secound_name'=>$request->secound_name,
                'phone'=>$request->phone,
            ]);
        }
        return response()->json(['status'=>1,'message'=>'تم تحديث البيانات بنجاح','data'=>$user]);

        }
        public function updateEmail(Request $request){
            $rule = [
                'email'=>'required',
                'password'=>'required',
        ];
            $valida = Validator()->make($request->all(),$rule);
            if($valida->fails()){
                return response()->json(['status'=>0,'message'=>'failed',$valida->errors()->first()]);

            }else{
            if(Hash::check($request->password, Auth::user()->password)){
                $user =Auth::user();
               $user->update(['email'=>$request->email]);
               return response()->json(['status'=>1,'message'=>'تم تحديث البريد الألكتروني بنجاح','data'=>$user]);
            }
            else{
                return response()->json(['status'=>0,'message'=>'the password is not Correct']);
            }
        }

        }
        public function updatePassword(Request $request){
            $rule = [
                'oldPassword'=>'required',
                'newPassword'=>'required',
        ];
            $valida = Validator()->make($request->all(),$rule);
            if($valida->fails()){
                return response()->json(['status'=>0,'message'=>'failed',$valida->errors()->first()]);

            }else{
            if(Hash::check($request->oldPassword, Auth::user()->password)){
                $user =Auth::user();
               $user->update(['password'=>Hash::make($request->newPassword)]);
               return response()->json(['status'=>1,'message'=>'تم تحديث البريد كلمه المرور بنجاح','data'=>$user]);
            }
            else{
                return response()->json(['status'=>0,'message'=>'the password is not Correct']);
            }
        }
    }

    
     
}
