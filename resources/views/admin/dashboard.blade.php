@extends('layouts.app')

@section('content')
    <div class="container pt-3 pb-5">
        <x-breadcrumb one="{{Request::segment(1)}}" two="{{Request::segment(2)}}" three={{Request::segment(3)}}></x-breadcrumb>
        <div class="row">
            <div class="col-sm-3">
                @include('admin.layouts.sidebar')
            </div>
            <div class="col-sm-9">
                @yield('adminContent')
            </div>
        </div>
    </div>
@endsection
