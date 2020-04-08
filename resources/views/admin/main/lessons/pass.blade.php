@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Сабақ</span>
                <h3 class="page-title">

                </h3>
                <p>
                    <a class="btn btn-success text-center" href="{{route('my.courses')}}">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-10  mb-4">
                <div class="card card-small">
                    <div class="card-header border-bottom">
                        <h1>
                            {{$currentLesson->name}}
                        </h1>
                    </div>
                    <div class="card-body">
                        {!!$currentLesson->description !!}
                    </div>
                </div>
            </div>
            <div class="col-2">
                <p>Сабақтар тізімі</p>
                <ul class="list-group">
                    @foreach($lessons as $index => $lesson)
                        <li class="list-group-item
                         @if($lesson->id == $currentLesson->id)
                                active
                        @endif
                                ">
                            <a class="btn @if($lesson->id == $currentLesson->id) text-white @else text-dark @endif"
                               href="{{route('pass.lesson', ['courseId' => $lesson->course_id, 'lessonId' => $lesson->id])}}">
                                {{($index + 1).') '.$lesson->name}}
                            </a>
                        </li>
                    @endforeach
                    <li class="list-group-item bg-success">
                        <a class="btn text-white">Тест тапсыру</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
@endsection