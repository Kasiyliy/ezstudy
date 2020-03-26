@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Сұрақтар</span>
                <h3 class="page-title">"{{$course->name}}" - курсының тесті</h3>
                <h5 class="page-title">{{$quiz->name}}</h5>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
@endsection