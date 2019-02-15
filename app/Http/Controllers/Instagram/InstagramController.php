<?php

namespace App\Http\Controllers\Instagram;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class InstagramController extends Controller
{
    public function index(){
    	do{
            $newHash = str_random(8);
			// $us-erCode = Link::where('hash', $newHash)->first();
		}while(isset($code));
	
		dd($newHash);
    }


	public function redirectToInstagramProvider()
    {
        return Socialite::with('instagram')->scopes([
            "public_content"])->redirect();
    }
 
 
    public function handleProviderInstagramCallback()
    {
        $insta = Socialite::driver('instagram')->user();
        $details = [
            "access_token" => $insta->token
        ];
		dd($insta);
        if(Auth::user()->instagram){
            Auth::user()->instagram()->update($details);
        }else{
            Auth::user()->instagram()->create($details);
        }
		return redirect('/');
		
    }
}
