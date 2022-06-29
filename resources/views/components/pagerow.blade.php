
<div class="row bg-light justify-content-center align-items-center radius-80 mb-3 page-row " >
    <div class="col-md-2 col-12 ">
<<<<<<< HEAD
        <img class="rounded-circle" src="$page->image" alt="{{$page->name}}">
    </div>
    <div class="col-md-6 col-12">
=======
        <img class="rounded-circle" src="{{$page->image}}" alt="{{$page->name}}">
    </div>
    <div class="col-md-5 col-12">
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
        <div class="d-block  caption">
            <p class="blue-text my-1">{{$page->name}}</p>
            <a class="grey-text non-anchor"  href="{{'https://facebook.com/'.$page->page_id}}"><p>{{$page->page_id}}</p></a>
        </div>
    </div>
<<<<<<< HEAD
    <div class="col-md-4 col-12 text-center">



        @if ($page->status==0)
        <a class="btn mx-auto blue-bg  radius-20  white-text">تمكين</a>
=======
    <div class="col-md-5 col-12 text-center">

        @if ($page->status==0)

>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
        <form action="{{route('enable_bot')}}" method="post">
            @csrf
            <input type="hidden" name="page_id" value="{{$page->page_id}}">
            <input type="hidden" name="token" value="{{ $page->token}}">
<<<<<<< HEAD
            <button type="submit" class="btn mx-auto blue-bg  radius-20  white-text">تمكين</button>
        </form>
        @else
        <form action="{{route('disable_bot')}}" method="post">
            @csrf
            <input type="hidden" name="page_id" value="{{$page->page_id}}">
            <input type="hidden" name="token" value="{{$page->token}}">
            <button type="submit" class="btn btn-warning">تعطيل</button>
        </form>
        <a class="btn mx-auto green-bg  radius-20  white-text">تفعيل الرد</a>
        @endif

       {{--  <a href="get_posts/{{$page->page_id}}/{{$page->token}}" class="btn btn-success">posts</a> --}}
    </div>
=======
            <button type="submit" class="btn mx-auto blue-bg d-inline   radius-20  white-text">تمكين</button>
        </form>
        @else
        <div class="justify-content-center align-items-center d-flex">
            <form action="{{route('disable_bot')}}" method="post">
                @csrf
                <input type="hidden" name="page_id" value="{{$page->page_id}}">
                <input type="hidden" name="token" value="{{$page->token}}">
                <button type="submit" class="btn warning-bg d-inline radius-20 white-text mx-2">تعطيل</button>
            </form>
            <form action="{{route('activate_reply')}}" method="post">
                @csrf
                <input type="hidden" name="page_id" value="{{$page->page_id}}">
                <input type="hidden" name="token" value="{{$page->token}}">
                <button type="submit" class="btn mx-auto green-bg d-inline radius-20  white-text">تفعيل الرد</button>
            </form>
        </div>
       
        @endif
  </div>
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
</div>

