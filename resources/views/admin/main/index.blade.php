@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">{{$courseCount}}</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Курстар саны</h5>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas height="100" width="200" id="stats-line-graph-1" class="chartjs-render-monitor" style="display: block; height: 50px; width: 100px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">{{$lessonCount}}</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Сабақтар саны</h5>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas height="100" width="200" id="stats-line-graph-2" class="chartjs-render-monitor" style="display: block; height: 50px; width: 100px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">{{$userCount}}</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Қолданушылар саны</h5>
                                        <p class="mb-0 text-muted">Сертификат саны: {{$quizResultCount}}</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas height="100" width="200" id="stats-line-graph-3" class="chartjs-render-monitor" style="display: block; height: 50px; width: 100px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">{{$quizCount}}</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Тест саны</h5>
                                        <p class="mb-0 text-muted">Сұрақтар саны: {{$questionCount}}</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas height="100" width="200" id="stats-line-graph-4" class="chartjs-render-monitor" style="display: block; height: 50px; width: 100px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection