@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Курстар</span>
                <h3 class="page-title">
                    Жаңа курс
                </h3>
                <p>
                    <a class="btn btn-success" href="{{route('courses.index')}}">
                        <i class="fa fa-arrow-left"></i>
                        Артқа
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('courses.store')}}" enctype="multipart/form-data">
                    @include('admin.main.courses.form')
                </form>
            </div>
        </div>

    </div>
@endsection