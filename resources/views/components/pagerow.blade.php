
<div class="row bg-light justify-content-center align-items-center radius-80 mb-3 page-row " >
    <div class="col-md-2 col-12 ">
        <img class="rounded-circle" src="$page->image" alt="{{$page->name}}">
    </div>
    <div class="col-md-6 col-12">
        <div class="d-block  caption">
            <p class="blue-text my-1">{{$page->name}}</p>
            <a class="grey-text non-anchor"  href="{{'https://facebook.com/'.$page->page_id}}"><p>{{$page->page_id}}</p></a>
        </div>
    </div>
    <div class="col-md-4 col-12 text-center">



        @if ($page->status==0)
        <a class="btn mx-auto blue-bg  radius-20  white-text">تمكين</a>
        <form action="{{route('enable_bot')}}" method="post">
            @csrf
            <input type="hidden" name="page_id" value="{{$page->page_id}}">
            <input type="hidden" name="token" value="{{ $page->token}}">
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
</div>

