@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Курстар</span>
                <h3 class="page-title">Тізім</h3>
                <p>
                    <a class="btn btn-success text-center" href="{{route('courses.create')}}">
                        <i class="fa fa-plus"></i>
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Курстар</h6>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                            <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#</th>
                                <th scope="col" class="border-0">Аты</th>
                                <th scope="col" class="border-0">Суреті</th>
                                <th scope="col" class="border-0">Іс-әрекет</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{$course->id}}</td>
                                    <td>{{$course->name}}</td>
                                    <td>
                                        <div class="thumb-image">
                                            <img class="image" src="{{asset($course->image_path)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary mb-2 "
                                           href="{{route('courses.edit', ['id' => $course->id])}}">
                                            Жаңарту <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-outline-primary mb-2 "
                                           href="{{route('lessons.index', ['course_id' => $course->id])}}">
                                            Сабақтар <i class="fa fa-book"></i>
                                        </a>

                                        <form class="d-inline" action="{{route('courses.delete', ['id' => $course->id])}}" method="post">
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
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection