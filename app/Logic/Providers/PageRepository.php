<?php

namespace App\Logic\Providers;

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Log;
use Facebook\Facebook;


class PageRepository
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


    public function enable_bot($page_id='',$token='')
	{

		if($page_id=='' || $token=='')
		{
			return array('success'=>0,'error'=>$this->CI->lang->line("Something went wrong, please try again."));
			exit();
		}
		try
		{
			$params=array();
			$params['subscribed_fields']= array("messages","messaging_optins","messaging_postbacks","messaging_referrals","feed");
			$response = $this->facebook->post("{$page_id}/subscribed_apps",$params,$token);
			$response = $response->getGraphNode()->asArray();

			return $response;
		}
		catch (Exception $e)
		{
			return array('success'=>0,'error'=>$e->getMessage());
		}

	}


    public function disable_bot($page_id='',$token='')
	{
		if($page_id=='' || $token=='')
		{
			return array('success'=>0,'error'=>$this->CI->lang->line("Something went wrong, please try again."));
			exit();
		}
		try
		{
			$response = $this->facebook->delete("{$page_id}/subscribed_apps",array(),$token);
			$response = $response->getGraphNode()->asArray();

			return $response;
		}
		catch (Exception $e)
		{
			return array('success'=>0,'error'=>$e->getMessage());
		}
	}


    public function getPosts($page_id , $token)
    {

        try {

            $response = $this->facebook->get('/'.

              $page_id.'/feed?fields=subscribed,message',
              $token
            );
           dd($response);



          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
          }


            $graphNode = $response->getGraphEdge();
            dd($graphNode);
          return $graphNode;


            $graphNode = $response->getGraphEdge();
            dd($graphNode);
          return $graphNode;

            $graphNode = $response->getGraphEdge()->asArray();

          return $graphNode;
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


    public function post($accountId, $accessToken, $content, $images = [])
    {
        $data = ['message' => $content];

        $attachments = $this->uploadImages($accountId, $accessToken, $images);

        foreach ($attachments as $i => $attachment) {
            $data["attached_media[$i]"] = "{\"media_fbid\":\"$attachment\"}";
        }

        try {
            return $this->postData($accessToken, "$accountId/feed", $data);
        } catch (\Exception $exception) {

            return false;
        }
    }

    private function uploadImages($accountId, $accessToken, $images = [])
    {
        $attachments = [];

        foreach ($images as $image) {
            if (!file_exists($image)) continue;

            $data = [
                'source' => $this->facebook->fileToUpload($image),
            ];

            try {
                $response = $this->postData($accessToken, "$accountId/photos?published=false", $data);
                if ($response) $attachments[] = $response['id'];
            } catch (\Exception $exception) {
                throw new Exception("Error while posting: {$exception->getMessage()}", $exception->getCode());
            }
        }

        return $attachments;
    }
}
