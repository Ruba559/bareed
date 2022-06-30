<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Logic\Providers\PageRepository;
use Validator;
use Exception;
use Auth;
use App\Models\AutoRepalyCampaigns;

class PageController extends Controller
{

    protected $facebook;

    public function __construct()
    {
        $this->facebook = new PageRepository();
    }


    public function index()
    {
       $pages =  Page::get();

       return view('pages' , ['pages' => $pages]);
    }




    public function enable(Request $request)
    {

        $enable_page = $this->facebook->enable_bot($request->page_id ,$request->token);

       if($enable_page['success'] == 'true')
       {
         $page = Page::where('page_id', $request->page_id)->first();

        if($page){

          $page->status = '1';

          $page->save();
       }
      }

    }


    public function disable(Request $request)
    {
        $disable_page = $this->facebook->disable_bot($request->page_id , $request->token);

       if($disable_page['success'] == 'true')
       {
         $page = Page::where('page_id', $request->page_id)->first();

        if($page){

          $page->status = '0';

          $page->save();
       }
      }

    }







    public function getPosts(Request $request)
    {
        $posts = $this->facebook->getPosts($request->page_id ,$request->token);

       return view('pages' , ['posts' => $posts]);

    }


    public function indexFormReply(Request $request)
    {
    //  return $request->post_id;

       return view('form');

    }

    public function postFormReply(Request $request)
    {

      $data = $request->only('comment', 'like', 'message_reply');


      $data = json_encode($request->except('_method', '_token' , 'name' , 'type'));

       AutoRepalyCampaigns::create([
        'type' => '1',
        'details' =>$data,
        'name' => $request->name,
    ]);
       return view('form');

    }



}
