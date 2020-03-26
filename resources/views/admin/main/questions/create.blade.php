@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Сұрақтар</span>
                <h3 class="page-title">{{$quiz->name}} тесті</h3>
                <h3 class="page-title">
                    Жаңа сұрақ
                </h3>
                <p>
                    <a class="btn btn-success" href="{{route('questions.index', ['id' => $quiz->id])}}">
                        <i class="fa fa-arrow-left"></i>
                        Артқа
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('questions.store', ['id' => $quiz->id])}}" enctype="multipart/form-data">
                    @include('admin.main.questions.form')
                </form>
            </div>
        </div>

    </div>
@endsection
