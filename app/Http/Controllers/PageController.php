<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Logic\Providers\PageRepository;
use Validator;
use Exception;
use Auth;

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


    public function enable($page_id , $token)
    {
        $enable_page = $this->facebook->enable_bot($page_id ,$token);
    
       if($enable_page['success'] == 'true')
       {
         $page = Page::where('page_id', $page_id)->first();

        if($page){

          $page->status = '1';

          $page->save();
       }
      }
       return redirect('pages');

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
       return redirect('pages');

    }


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

    }


}
