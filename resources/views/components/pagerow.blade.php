

<div class="row p-3 py-0 bg-light my-3 justify-content-center align-items-center radius-20" >
    <div class="col-md-2 col-12 p-md-3 p-2">
        <img class="img-fluid img-rounded" width="50%" src="{{$page->image}}" alt="{{$page->name}}">
    </div>
    <div class="col-md-8 col-12 p-md-3 p-2">
        <div class="d-block">
            <h5>{{$page->name}}</h5>
            <a class="text-grey"  href="{{'https://facebook.com/'.$page->page_id}}"><p>{{$page->page_id}}</p></a>
        </div>
    </div>
    <div class="col-md-2 col-12">
        @if ($page->status==0)

        <a href="enable/{{$page->page_id}}/{{$page->token}}" class="btn btn-success">تمكين</a>
        @else
        <form action="{{route('disable_bot')}}" method="post">
            @csrf
            <input type="hidden" name="page_id" value="{{$page->page_id}}">
            <input type="hidden" name="token" value="{{$page->token}}">
            <button type="submit" class="btn btn-warning">تعطيل</button>
        </form>
        @endif

        <a href="get_posts/{{$page->page_id}}/{{$page->token}}" class="btn btn-success">posts</a>
    </div>
</div> 