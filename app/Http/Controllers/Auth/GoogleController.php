<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $user->id)->first();
            $finduserMail = User::where('email', $user->email)->first();
            
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/');
     
            }else{
                if($finduserMail){

                $finduserMail->update(['google_id'=> $user->id,]);
                Auth::login($finduserMail);
     
                return redirect('/');
                }
                /*$newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => bcrypt('123456dummy')
                ]);*/
    
               
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}