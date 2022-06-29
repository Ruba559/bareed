<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Logic\Providers\PageRepository;
use Validator;
use Exception;
use Auth;
<<<<<<< HEAD
=======
use App\Models\AutoRepalyCampaigns;
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b

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


<<<<<<< HEAD
    public function enable($page_id , $token)
    {
        $enable_page = $this->facebook->enable_bot($page_id ,$token);
    
       if($enable_page['success'] == 'true')
       {
         $page = Page::where('page_id', $page_id)->first();
=======
    public function enable(Request $request)
    {
     
        $enable_page = $this->facebook->enable_bot($request->page_id ,$request->token);
    
       if($enable_page['success'] == 'true')
       {
         $page = Page::where('page_id', $request->page_id)->first();
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b

        if($page){

          $page->status = '1';

          $page->save();
       }
      }
<<<<<<< HEAD
       return redirect('pages');
=======
       return redirect('/dashboard');
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b

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
<<<<<<< HEAD
       return redirect('pages');
=======
       return redirect('/dashboard');
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b

    }


<<<<<<< HEAD
    public function getPosts($page_id , $token)
    {
        $enable_page = $this->facebook->getPosts($page_id ,$token);
    
      dd($enable_page);
       return redirect('pages');

    }


    public function getPosts($page_id , $token)
    {
        $enable_page = $this->facebook->getPosts($page_id ,$token);
    
      dd($enable_page);
       return redirect('pages');

=======
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
     
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
    }


}
