@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Менің сертификаттарым</span>
                <h3 class="page-title">Тізім</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Сертификаттар</h6>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                            <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#</th>
                                <th scope="col" class="border-0">Курс аты</th>
                                <th scope="col" class="border-0">Тест аты</th>
                                <th scope="col" class="border-0">Нәтиже</th>
                                <th scope="col" class="border-0">Тапсырылған уақыт</th>
                                <th scope="col" class="border-0"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($certificates as $certificate)
                                <tr>
                                    <td>{{$certificate->id}}</td>
                                    <td>{{$certificate->courseName}}</td>
                                    <td>
                                        {{$certificate->quizName}}
                                    </td>
                                    <td>
                                        {{$certificate->result}}
                                    </td>
                                    <td>
                                        {{$certificate->passedAt}}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary"
                                           target="_blank"
                                           href="{{route('get.certificate', ['id' => $certificate->id])}}">
                                            басып шығару
                                            <span class="fa fa-print"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection