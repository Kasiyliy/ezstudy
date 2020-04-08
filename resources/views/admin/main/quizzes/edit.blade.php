@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Сабақтар</span>
                <h3 class="page-title">
                    {{$lesson->name}}
                </h3>
                <p>
                    <a class="btn btn-success" href="{{route('lessons.index', ['course_id' => $lesson->course_id])}}">
                        <i class="fa fa-arrow-left"></i>
                        Артқа
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('lessons.update', ['id' => $lesson->id])}}"
                      enctype="multipart/form-data">
                    @include('admin.main.lessons.form')
                </form>
            </div>
        </div>
    </div>
@endsection