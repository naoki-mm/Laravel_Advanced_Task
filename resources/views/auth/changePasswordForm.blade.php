@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h3 class="login_title text-left d-inline-block mt-5">パスワードの変更</h3>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'password.change','method'=>'put']) !!}

                <div class="form-group">
                    {!! Form::label('password_current', '現在のパスワード') !!}
                    {!! Form::password('password_current', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group mt-5">
                    {!! Form::label('password_new', '新しいパスワード') !!}
                    {!! Form::password('password_new', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group mb-5">
                    {!! Form::label('password_new_confirmation', 'パスワードの確認') !!}
                    {!! Form::password('password_new_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('パスワードを変更する', ['class' => 'btn btn-primary mt-2 mb-5']) !!}
            {!! Form::close() !!}

        </div>
    </div>

@endsection
