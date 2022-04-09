@extends('admin.layouts.admin_layout')
@section('title', 'Кабинет пользователя')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Кабинет пользователя')  }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ ('Вы вошли в личный кабинет') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
