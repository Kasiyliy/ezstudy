@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Сабақтар</span>
                <h3 class="page-title">"{{$course->name}}" - курсының сабақтар тізімі</h3>
                <p>
                    <a class="btn btn-success text-center m-1"
                       href="{{route('courses.index')}}">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-success text-center m-1"
                       href="{{route('lessons.create',['course_id' => $course->id])}}">
                        <i class="fa fa-plus"></i>
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12  mb-4">
                <div class="card card-small">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">
                            @if($quiz->id)
                                Тест аты: {{$quiz->name}}
                            @else
                                <span class="text-danger">Тест қосуды умытпаңыз!</span>
                            @endif

                        </h6>
                    </div>
                </div>
                <form @if($quiz->id)
                      action="{{route('quizzes.update', ['id' => $quiz->id])}}"
                      @else
                      action="{{route('quizzes.store', ['course_id' => $course->id])}}"
                      @endif
                      method="post">
                    @include('admin.main.quizzes.form')
                </form>
            </div>
            @if($lessons->count() > 0)
                @foreach($lessons as $lesson)
                    <div class="col-12">
                        <div class="card card-small mb-4">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">{{$lesson->name}}</h6>
                            </div>
                            <div class="card-body p-4 pb-3">

                                <p>
                                    <a class="btn btn-primary" data-toggle="collapse"
                                       href="#multiCollapseExample{{$lesson->id}}"
                                       role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Сабақ
                                        ақпараттары</a>
                                </p>
                                <div class="row">
                                    <div class="col">
                                        <div class="collapse multi-collapse" id="multiCollapseExample{{$lesson->id}}">
                                            <div class="card card-body">
                                                <p>{!!$lesson->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a class="btn btn-outline-primary mb-2 "
                                   href="{{route('lessons.edit', ['id' => $lesson->id])}}">
                                    Жаңарту <i class="fa fa-edit"></i>
                                </a>

                                <form class="d-inline" action="{{route('lessons.delete', ['id' => $lesson->id])}}"
                                      method="post">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-outline-danger mb-2 "
                                            href="">
                                        Жою <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col">
                    <p class="text-center text-muted">
                        Сабақ тізімі бос!
                        <br>
                        Жаңа сабақ қосуыңызды сұраймыз!
                    </p>
                </div>
            @endif


            {{ $lessons->links() }}
        </div>
    </div>
@endsection