<?php

namespace App\Logic\Providers;

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Log;
use Facebook\Facebook;


class UserRepository
{
    protected $facebook;

    public function __construct()
    {
        $this->facebook = new Facebook([
            'app_id' => '203619158334876',
            'app_secret' => 'ff52cbeea32631900d9ef307ee710c7b',
            'default_graph_version' => 'v14.0'
,'http_client_handler' => 'stream'
        ]);
    }

    
    public function redirectTo()
    {
        $helper = $this->facebook->getRedirectLoginHelper();

        $permissions = [
            'pages_manage_posts',
            'pages_read_engagement',
            'pages_read_user_content',
            'pages_manage_engagement',
            'pages_manage_metadata',
            'pages_show_list',
            'pages_messaging',
            'email',

        ];

        $redirectUri = config('app.url') . '/callback';

        return $helper->getLoginUrl($redirectUri, $permissions);
    }

    
    public function getUserData($accessToken)
    {
        $helper = $this->facebook->get("me?fields=id,name,email,picture",$accessToken);
        $helper = $helper->getGraphNode();

        return $helper;
       
    }


    public function handleCallback()
    {
        $helper = $this->facebook->getRedirectLoginHelper();
        
        if (request('state')) {
            $helper->getPersistentDataHandler()->set('state', request('state'));
        }

        try {
            $accessToken = $helper->getAccessToken();
            
        } catch(FacebookResponseException $e) {
            throw new Exception("Graph returned an error: {$e->getMessage()}");
        } catch(FacebookSDKException $e) {
            throw new Exception("Facebook SDK returned an error: {$e->getMessage()}");
        }

        if (!isset($accessToken)) {
            throw new Exception('Access token error');
        }

        if (!$accessToken->isLongLived()) {
            try {
                $oAuth2Client = $this->facebook->getOAuth2Client();
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
               
            } catch (FacebookSDKException $e) {
                throw new Exception("Error getting a long-lived access token: {$e->getMessage()}");
            }
        }
        
        return $accessToken->getValue();
        
    }

    
    public function replyComments($comment_id , $commenter_name, $token)
    {

        try {

            $params['message']='thank you '.$commenter_name;	

            $response = $this->facebook->post('/'.
              $comment_id.'/comments?',$params,
              $token
            );
           
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
          }
        
          $response->getGraphNode()->asArray();
            
          return $response;
       
    }


    public function privateReplyWithText($token , $comment_id , $message)
	{
        $params['message']= $message;
        $params['recipient']= $comment_id;

       
        $response = $this->facebook->post("me/messages",$params,$token);   

		return $response->getGraphNode()->asArray();
	}


    public function privateReplyWithGeneric($page_id , $token , $post_id)
	{
        $params['message']='thank you ';
        $params['recipient']= $post_id;

       
        $response = $this->facebook->post("{$page_id}/messages",$params,$token);   

		return $response->getGraphNode()->asArray();
	}



    public function autoLike($comment_id , $token)
	{
		$response = $this->facebook->post("{$comment_id}/likes",array(),$token);
		return $response->getGraphNode()->asArray();
	}


    function getPages($accessToken)
    {
        $pages = $this->facebook->get('/me/accounts', $accessToken);
        $pages = $pages->getGraphEdge()->asArray();

        return array_map(function ($item) {
            return [
                'provider' => 'facebook',
                'access_token' => $item['access_token'],
                'id' => $item['id'],
                'name' => $item['name'],
                'image' => "https://graph.facebook.com/{$item['id']}/picture?type=large"
            ];
        }, $pages);
    }
  
}
