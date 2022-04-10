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
                    <div class="jumbotron">
                        <h2> Все статьи на сайте</h2>

                            <h3> Заголовок статьи:{{ $post['title'] }}</h3>

                            <a href="#">Категория: {{ $post->category['title'] }}</a>
                            <br><br>
                            <img src="{{$post['img']}}" width="200" height="150">
                            <hr>
                            <a class="btn btn-info btn-sm" href="{{ route('post.edit', $post['id']) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Редактировать
                            </a>
                            <hr>
                            <a class="btn btn-info btn-sm" href="{{ route('post.show', $post['id']) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Подробнее
                            </a>

                            <form action="{{ route('post.destroy', $post['id']) }}" method="POST"
                                  style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                    <i class="fas fa-trash">
                                    </i>
                                    Удалить
                                </button>
                            </form>
                            <br>
                            <hr>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

