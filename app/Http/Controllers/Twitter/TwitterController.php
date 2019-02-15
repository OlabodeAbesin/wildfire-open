<?php

namespace App\Http\Controllers\Twitter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Twitter;
use File;

class TwitterController extends Controller
{
    public function twitterUserTimeLine()
    {
    	$data = Twitter::getUserTimeline(['screen_name' => 'thujohn','count' => 10, 'format' => 'array']);
    	dd($data);
    	return view('twitter',compact('data'));
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function tweet(Request $request)
    {
    	$this->validate($request, [
        		'tweet' => 'required'
        	]);


    	$newTwitte = ['status' => $request->tweet];

    	
    	if(!empty($request->images)){
    		foreach ($request->images as $key => $value) {
    			$uploaded_media = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);
    			if(!empty($uploaded_media)){
                    $newTwitte['media_ids'][$uploaded_media->media_id_string] = $uploaded_media->media_id_string;
                }
    		}
    	}


    	$twitter = Twitter::postTweet($newTwitte);

    	
    	return back();

    }

    public function testtweet()
    {
       

        $newTwitte = ['status' =>'test via api'];

        
        if(!empty($request->images)){
            foreach ($request->images as $key => $value) {
                $uploaded_media = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);
                if(!empty($uploaded_media)){
                    $newTwitte['media_ids'][$uploaded_media->media_id_string] = $uploaded_media->media_id_string;
                }
            }
        }


        $twitter = Twitter::postTweet($newTwitte);
        dd($twitter);

        
        return back();

    }

    public function getUsers(){
    	$data = Twitter::getUsers(['screen_name' => 'thujohn']);
    	dd($data);
    }
    public function getlists(){
    	$data = Twitter::getLists(['screen_name' => 'thujohn']);
    	dd($data);
    }
    public function gettweet(){
    	$data = Twitter::getTweet('833704887779196928', []);
    	dd($data);
    }

    public function userSearch(){
        $data = Twitter::getUsersSearch(['q' => 'tejvmade']);
        dd($data);
    }
    public function sendDm(){
        $data = Twitter::postDm(['user_id' => '427423120', 'text' => 'Kenny Test']);
        dd($data);
    }

    public function me(){
        $data = Twitter::getCredentials();
        dd($data);
    }

    public function mymessages(){
         $data = Twitter::getDmsIn(['count' => '5']);
         dd($data);
    }
}
