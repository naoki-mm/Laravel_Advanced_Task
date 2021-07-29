@extends('layouts.app')

@section('content')


    <div class="text-right">

        {{ Auth::user()->name }}

    </div>

        <h2 class="mt-5 text-center">本当に退会しますか？</h2>
    
    
 
        <div class="text-center mt-5">
            <div class="btn-group text-center">
        
                <div class="mr-5">
                    <a href="/" class="btn btn-primary">キャンセル</a>
                </div>
                
                {!! Form::open(['route'=>'users.destroy','method'=>'delete']) !!}
                    {!!Form::submit('退会する',['class'=>'btn btn-danger'])!!}
                {!!Form::close()!!}       
            </div>
        </div>



@endsection