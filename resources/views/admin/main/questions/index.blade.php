@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Сұрақтар</span>
                <h3 class="page-title">"{{$course->name}}" - курсының тесті</h3>
                <h5 class="page-title">{{$quiz->name}}</h5>
                <p>
                    <a class="btn btn-success" href="{{route('lessons.index', ['id' => $course->id])}}">
                        <i class="fa fa-arrow-left"></i>
                        Артқа
                    </a>
                </p>
                <p>
                    <a class="btn btn-success text-center" href="{{route('questions.create', ['id' => $quiz->id])}}">
                        <i class="fa fa-plus"></i>
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Сұрақтар</h6>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                            <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#</th>
                                <th scope="col" class="border-0">Аты</th>
                                <th scope="col" class="border-0">Іс-әрекет</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td>{{$question->id}}</td>
                                    <td>{{$question->content}}</td>
                                    <td>
{{--                                        <a class="btn btn-outline-primary mb-2 "--}}
{{--                                           href="{{route('question.edit', ['id' => $course->id])}}">--}}
{{--                                            Жаңарту <i class="fa fa-edit"></i>--}}
{{--                                        </a>--}}
                                        <a class="btn btn-outline-primary mb-2 "
                                           href="{{route('options.index', ['question_id' => $question->id])}}">
                                            Жауаптар <i class="fa fa-question"></i>
                                        </a>
{{--                                        <form class="d-inline" action="{{route('questions.delete', ['id' => $question->id])}}" method="post">--}}
{{--                                            {{csrf_field()}}--}}
{{--                                            <button type="submit" class="btn btn-outline-danger mb-2 "--}}
{{--                                                    href="">--}}
{{--                                                Жою <i class="fa fa-trash"></i>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
