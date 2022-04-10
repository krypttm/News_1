@extends('layouts.guest')

@section('title', 'Все категории')

@section('content')
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
@endsection
