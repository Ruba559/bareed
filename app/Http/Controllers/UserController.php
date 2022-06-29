<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logic\Providers\UserRepository;
use App\Models\User;
use App\Models\Page;
<<<<<<< HEAD
=======
use App\Models\UserAccounts;
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
use Validator;
use Exception;
use Auth;
use Illuminate\Support\Facades\Log;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Hash;
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b

class UserController extends Controller
{
    protected $facebook;

    public function __construct()
    {
        $this->facebook = new UserRepository();
    }


    public function verify_token()
    {
        
<<<<<<< HEAD
        // $local_token = 'facebook_messenger_api';
    	// $hub_verify_token = request('hub_verify_token');

    	// if ($hub_verify_token === $local_token) {

    	// 	return request('hub_challenge');

    	// } 
=======
        $local_token = 'facebook_messenger_api';
    	$hub_verify_token = request('hub_verify_token');

    	if ($hub_verify_token === $local_token) {

    		return request('hub_challenge');

    	} 
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
      
        $input = json_decode(file_get_contents('php://input'), true);
        $input_type = $input['entry'][0]['changes'][0]['value']['item'];
        Log::info('Start');
        Log::info($input_type);
        if($input_type == 'comment')
        {Log::alert('Start comment');
           $page_id = $input['entry'][0]['id'];
            $commenter_id = $input['entry'][0]['changes'][0]['value']['from']['id'];
            $commenter_name = $input['entry'][0]['changes'][0]['value']['from']['name'];
            $token = Page::where('page_id' , $page_id)->pluck('token');
            $comment_id = $input['entry'][0]['changes'][0]['value']['comment_id'];
            $post_id = $input['entry'][0]['changes'][0]['value']['post_id'];
            if($commenter_name != 'Test')
            {
                Log::info('Start Process');
            $this->facebook->replyComments($comment_id , $commenter_name ,$token[0]);
            $this->facebook->autoLike($comment_id , $token[0]);
            $message = 'message';
<<<<<<< HEAD
            $a =  $this->facebook->privateReplyWithText($page_id , $token[0] , $comment_id , $message);
=======
            $a =  $this->facebook->privateReplyWithText($token[0] , $comment_id , $message);
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
            
           Log::info($a);
         
            }
        }

    }


    public function facebookRedirect()
    {

        return redirect($this->facebook->redirectTo());
    }


    public function loginWithFacebook()
     {

        $accessToken = $this->facebook->handleCallback();
  
        $userdata = $this->facebook->getUserData($accessToken);
<<<<<<< HEAD
      //  dd($userdata);

            $pages = $this->facebook->getPages($accessToken);
          
            $isUser = User::where('fb_id', $userdata['id'])->first();

            if($isUser){
                $isUser->token = $accessToken;
 
                $isUser->save();

                Auth::login($isUser);
=======
     
            $pages = $this->facebook->getPages($accessToken);
          
            $isUserAccount = UserAccounts::where('fb_id', $userdata['id'])->first();

            if (!Auth::check()) {

            if($isUserAccount){

                $isUserAccount->token = $accessToken;
 
                $isUserAccount->save();

                $user = User::where('id' , $isUserAccount->user_id)->first();

                Auth::login($user);
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b

                foreach($pages as $item)
                {
                  Page::updateOrCreate(
                    ['page_id' => $item['id']],
<<<<<<< HEAD
                    ['name' =>  $item['name'] , 'token' => $item['access_token'] , 'status' => '0', 'image' => $item['image'], 'user_id' => $isUser->id,] );
=======
                    ['name' =>  $item['name'] , 'token' => $item['access_token'] , 'status' => '0', 'image' => $item['image'], 'user_id' => $user->id,] );
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b

                }

                return redirect('/dashboard');

            }else{
<<<<<<< HEAD
                $isUser = User::create([
                    'name' => $userdata['name'],
                    'email' => $userdata['email'],
                    'fb_id' => $userdata['id'],
                    'password' => encrypt('admin@123'),
                    'token' =>  $accessToken,
                ]);
    
                Auth::login($isUser);
=======

                $user = User::create([
                    'name' => $userdata['name'],
                    'email' => $userdata['email'],
                    'password' => Hash::make('password'),
                    
                ]);

                $isUserAccount = UserAccounts::create([
                    'name' => $userdata['name'],
                    'email' => $userdata['email'],
                    'fb_id' => $userdata['id'],
                    'image' => '$userdata['picture']',
                    'password' =>  Hash::make('password'),
                    'token' =>  $accessToken,
                    'user_id' => $user->id,
                ]);

    
                Auth::login($user);
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b

                foreach($pages as $item)
                {
                  Page::updateOrCreate(
                    ['page_id' => $item['id']],
<<<<<<< HEAD
                    ['name' =>  $item['name'] , 'token' => $item['access_token'] , 'status' => '0', 'image' => $item['image'], 'user_id' => $isUser->id,] );

=======
                    ['name' =>  $item['name'] , 'token' => $item['access_token'] , 'status' => '0', 'image' => $item['image'], 'user_id' => $user->id,] );
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
                }

                return redirect('/dashboard');
        } 

<<<<<<< HEAD
    }



=======
    }else{
        if($isUserAccount){
            $isUserAccount->token = $accessToken;

            $isUserAccount->save();

            foreach($pages as $item)
            {
              Page::updateOrCreate(
                ['page_id' => $item['id']],
                ['name' =>  $item['name'] , 'token' => $item['access_token'] , 'status' => '0', 'image' => $item['image'], 'user_id' => Auth::user()->id] );

            }

            return redirect('/dashboard');

        }else{
            $isUserAccount = UserAccounts::create([
                'name' => $userdata['name'],
                'email' => $userdata['email'],
                'fb_id' => $userdata['id'],
                'image' => $userdata['picture'],
                'password' =>Hash::make('password'),
                'token' =>  $accessToken,
                'user_id' => Auth::user()->id,
            ]);
           
            foreach($pages as $item)
            {
              Page::updateOrCreate(
                ['page_id' => $item['id']],
                ['name' =>  $item['name'] , 'token' => $item['access_token'] , 'status' => '0', 'image' => $item['image'], 'user_id' => Auth::user()->id] );
            }

            return redirect('/dashboard');
    } 

    }


}
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
}
