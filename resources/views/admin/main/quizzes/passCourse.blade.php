@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Тест тапсыру</span>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Тест {{$quiz->name}}</h6>
                        @if($quizResult)
                            <p style="color:#ff3635">
                                !Вы уже сдавали этот тест. Ваш результат {{$quizResult->result}}/{{$quiz->questions->count()}}</p>
                        @endif
                    </div>
                    <div class="card-body p-4 pb-3">
                        <form method="post" action="{{route('quiz.course.pass.store', ['id' => $quiz->id])}}">
                            <div class="form-group">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$quiz->id}}" name="quiz_id" class="form-control">
                                @foreach($quiz->questions as $question)
                                    <p><b>{{$i.'. '.$question->content}}</b></p>
                                    <input type="hidden" name="questions[{{$i}}]" value="{{$question->id}}" class="form-control">
                                    @foreach($question->options as $answer)
                                        <div class="radio-custom">
                                            <input type="radio" id="{{$answer->content.$answer->id}}" name="answers[{{$question->id}}]"
                                                   value="{{$answer->id}}">
                                            <label for="{{$answer->content.$answer->id}}">{{$answer->content}}</label>
                                        </div>

                                    @endforeach
                                    <?php $i++ ?>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Тапсыру</button>
                        </form>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
