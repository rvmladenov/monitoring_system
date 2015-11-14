@extends('layout.content')

@section('content')
<div class="container-fluid">
    <div class="login-form">
        <form action="#" class="form-horizontal">

            <div class="form-area">
                <div class="group">
                    <input type="text" class="form-control" placeholder="Потребител">
                    <i class="fa fa-user"></i>
                </div>
                <div class="group">
                    <input type="password" class="form-control" placeholder="Парола">
                    <i class="fa fa-key"></i>
                </div>
                <div class="checkbox checkbox-primary">
                    <input id="checkbox101" type="checkbox" checked="">
                    <label for="checkbox101"> Запомни ме</label>
                </div>
                <button type="submit" class="btn btn-info btn-block">ВХОД</button>
            </div>
        </form>

    </div>
</div>
@endsection
