@extends('layout.content')

@section('content')

<div class="container-fluid">
    <div class="login-form">

        @if ($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach($errors->all() as $e)
                    <li>{!! $e !!}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ url('/auth/login') }}" role="form" method="POST" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-area">
                <div class="group">
                    <input type="text" class="form-control" name="name" placeholder="Потребител">
                    <i class="fa fa-user"></i>
                </div>
                <div class="group">
                    <input type="password" name="password" class="form-control" placeholder="Парола">
                    <i class="fa fa-key"></i>
                </div>
                <div class="checkbox checkbox-primary">
                    <input id="checkbox101" type="checkbox" checked="">
                    <label for="checkbox101"> Запомни ме</label>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-info btn-block">ВХОД</button>
            </div>
        </form>

    </div>
</div>
@endsection
