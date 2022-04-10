@extends('layouts.app')

@section('title', 'Все статьи')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все статьи</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 5%">
                                    ID
                                </th>
                                <th>
                                    Название
                                </th>
                                <th>
                                    Категория
                                </th>
                                <th>
                                    Дата добавления
                                </th>
                                <th style="width: 30%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        <div class="card-body p-0">
                            <div class="jumbotron">
                                <h2> Все статьи на сайте</h2>
                                @foreach ($posts as $post)
                                    <h3> Заголовок статьи:{{ $post['title'] }}</h3>

                                    <a href="#">Категория: {{ $post->category['title'] }}</a>
                                    <p> Дата создания: {{ $post['created_at'] }} </p>
                                    <a class="btn btn-info btn-sm" href="{{ route('post.index') }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Подробнее
                                    </a>
                                    <br>
                                    <hr>
                                @endforeach
                            </div>


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
