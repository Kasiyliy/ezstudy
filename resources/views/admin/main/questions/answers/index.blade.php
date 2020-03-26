@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Жауаптар</span>
                <h3 class="page-title">"{{$question->content}}" - сұрағының жауаптары</h3>
                <p>
                    <a class="btn btn-success" href="{{route('questions.index', ['id' => $question->quiz->id])}}">
                        <i class="fa fa-arrow-left"></i>
                        Артқа
                    </a>
                </p>
                <p>
                    <a class="btn btn-success text-center" href="{{route('options.create', ['question_id' => $question->id])}}">
                        <i class="fa fa-plus"></i>
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Жауаптар</h6>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                            <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#</th>
                                <th scope="col" class="border-0">Жауап</th>
                                <th scope="col" class="border-0">Дұрыстығы</th>
                                <th scope="col" class="border-0">Іс-әрекет</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($options as $answer)
                                <tr>
                                    <td>{{$answer->id}}</td>
                                    <td>{{$answer->content}}</td>
                                    <td>
                                        @if($answer->is_right)
                                            <i class="fa fa-check" style="color:#2dff12"></i>
                                        @else <i class="fa fa-stop" style="color:red"></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{--                                        <a class="btn btn-outline-primary mb-2 "--}}
                                        {{--                                           href="{{route('question.edit', ['id' => $course->id])}}">--}}
                                        {{--                                            Жаңарту <i class="fa fa-edit"></i>--}}
                                        {{--                                        </a>--}}

                                                                                <form class="d-inline" action="{{route('options.delete', ['id' => $answer->id])}}" method="post">
                                                                                    {{csrf_field()}}
                                                                                    <button type="submit" class="btn btn-outline-danger mb-2 "
                                                                                            href="">
                                                                                        Жою <i class="fa fa-trash"></i>
                                                                                    </button>
                                                                                </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $options->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
