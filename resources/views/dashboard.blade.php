@extends('layouts.master')


@section('body')
    <div class="container-fluid h-100" style="margin-top: 100px;">
        <div class="row justify-content-center align-items-start h-100">
            <div class="col-md-4 col-12  p-md-3 p-4 h-75 " style="position: relative">
                    <div class="grey-border radius-80 w-100 p-5 text-center h-100" >
                        <h5 class="blue-text text-right mb-5">بيانات الحساب</h5>
                        <img class="img-fluid rounded-circle" width="100px" style="background: #4267B2" src="https://scontent.flca1-2.fna.fbcdn.net/v/t1.18169-1/16003101_1773283009662034_8268096445636849767_n.jpg?stp=dst-jpg_p200x200&_nc_cat=110&ccb=1-7&_nc_sid=7206a8&_nc_ohc=kAdOdQpEWlIAX8znCuu&_nc_ht=scontent.flca1-2.fna&oh=00_AT-hlyL6xE88YyhfVaM5IjWgb4Ogcbz0rBgaDCw4A-2xcQ&oe=62DD9E12" alt="">
                        <h5 class="sans-font blue-text">Bareed user</h5>
                        <p class="grey-text">مجموع الصفحات : <span class="mx-2"><b>20</b></span> </p>
                        <a class="btn   d-block w-100 fb-bg radius-20 my-3 text-white " href="{{ url('auth/facebook') }}"><span class="mx-2 fa fa-facebook-square"></span>إعادة ربط الحساب</a>
                        <a class="btn  white-text  d-block w-100 white-bg red-border red-text radius-20 my-3" href=""><span class="mx-2 fa fa-delete"></span>حذف الحساب</a>
                    </div>
            </div>
            <div class="col-md-8 col-12  p-md-3 p-4 h-75">
                <div class="grey-border radius-80 w-100 p-5 text-center h-100" >
                    <h5 class="blue-text text-right mb-5">قائمة الصفحات</h5>
                    <div class="px-md-5 p-2" style="overflow-y: scroll;overflow-x:hidden;height:250px">
                       {{--  @foreach ($pages as $item)
                        @include('components.pagerow',['page'=>$item])
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
