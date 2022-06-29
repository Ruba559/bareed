<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logic\Providers\UserRepository;
use App\Models\User;
use App\Models\Page;
<<<<<<< HEAD
use App\Models\UserAccounts;
=======
<<<<<<< HEAD
=======
use App\Models\UserAccounts;
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
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
<<<<<<< HEAD
         $local_token = 'facebook_messenger_api';
    	 $hub_verify_token = request('hub_verify_token');
=======
        // $local_token = 'facebook_messenger_api';
    	// $hub_verify_token = request('hub_verify_token');
>>>>>>> 294711eb82283337406eebec0217f88805b8f426

    	 if ($hub_verify_token === $local_token) {

<<<<<<< HEAD
    	 	return request('hub_challenge');
=======
    	// 	return request('hub_challenge');

    	// } 
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
=======
        $local_token = 'facebook_messenger_api';
    	$hub_verify_token = request('hub_verify_token');

    	if ($hub_verify_token === $local_token) {

    		return request('hub_challenge');
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b

    	} 
<<<<<<< HEAD
=======
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
      
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
            $a =  $this->facebook->privateReplyWithText($token[0] , $comment_id , $message);
=======
<<<<<<< HEAD
            $a =  $this->facebook->privateReplyWithText($page_id , $token[0] , $comment_id , $message);
=======
            $a =  $this->facebook->privateReplyWithText($token[0] , $comment_id , $message);
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
            
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
=======
<<<<<<< HEAD
      //  dd($userdata);

            $pages = $this->facebook->getPages($accessToken);
          
            $isUser = User::where('fb_id', $userdata['id'])->first();

            if($isUser){
                $isUser->token = $accessToken;
 
                $isUser->save();

                Auth::login($isUser);
=======
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
     
            $pages = $this->facebook->getPages($accessToken);
          
            $isUserAccount = UserAccounts::where('fb_id', $userdata['id'])->first();

            if (!Auth::check()) {

            if($isUserAccount){

                $isUserAccount->token = $accessToken;
 
                $isUserAccount->save();

                $user = User::where('id' , $isUserAccount->user_id)->first();

                Auth::login($user);
<<<<<<< HEAD
=======
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
>>>>>>> 294711eb82283337406eebec0217f88805b8f426

                foreach($pages as $item)
                {
                  Page::updateOrCreate(
                    ['page_id' => $item['id']],
<<<<<<< HEAD
                    ['name' =>  $item['name'] , 'token' => $item['access_token'] , 'status' => '0', 'image' => $item['image'], 'user_id' => $user->id,] );
=======
<<<<<<< HEAD
                    ['name' =>  $item['name'] , 'token' => $item['access_token'] , 'status' => '0', 'image' => $item['image'], 'user_id' => $isUser->id,] );
=======
                    ['name' =>  $item['name'] , 'token' => $item['access_token'] , 'status' => '0', 'image' => $item['image'], 'user_id' => $user->id,] );
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
>>>>>>> 294711eb82283337406eebec0217f88805b8f426

                }

                return redirect('/dashboard');

            }else{
<<<<<<< HEAD
=======
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
>>>>>>> 294711eb82283337406eebec0217f88805b8f426

                $user = User::create([
                    'name' => $userdata['name'],
                    'email' => $userdata['email'],
<<<<<<< HEAD
                    'password' => encrypt('admin@123'),
=======
                    'password' => Hash::make('password'),
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
                    
                ]);

                $isUserAccount = UserAccounts::create([
                    'name' => $userdata['name'],
                    'email' => $userdata['email'],
                    'fb_id' => $userdata['id'],
<<<<<<< HEAD
                    'image' => $userdata['picture'],
                    'password' => encrypt('admin@123'),
=======
                    'image' => '$userdata['picture']',
                    'password' =>  Hash::make('password'),
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
                    'token' =>  $accessToken,
                    'user_id' => $user->id,
                ]);

    
                Auth::login($user);
<<<<<<< HEAD
=======
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
>>>>>>> 294711eb82283337406eebec0217f88805b8f426

                foreach($pages as $item)
                {
                  Page::updateOrCreate(
                    ['page_id' => $item['id']],
<<<<<<< HEAD
                    ['name' =>  $item['name'] , 'token' => $item['access_token'] , 'status' => '0', 'image' => $item['image'], 'user_id' => $user->id,] );
=======
<<<<<<< HEAD
                    ['name' =>  $item['name'] , 'token' => $item['access_token'] , 'status' => '0', 'image' => $item['image'], 'user_id' => $isUser->id,] );

=======
                    ['name' =>  $item['name'] , 'token' => $item['access_token'] , 'status' => '0', 'image' => $item['image'], 'user_id' => $user->id,] );
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
                }

                return redirect('/dashboard');
        } 

<<<<<<< HEAD
=======
<<<<<<< HEAD
    }



=======
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
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
<<<<<<< HEAD
                'password' => encrypt('admin@123'),
=======
                'password' =>Hash::make('password'),
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
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
<<<<<<< HEAD
=======
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
}
