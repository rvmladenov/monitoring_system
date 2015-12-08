@extends("layout.content")

@section('content')
<div class="col-md-8 col-sm-7 col-lg-9">
<h2>Добавяне на Потребител</h2>

@if ($errors->any())
    <ul class="alert alert-danger list-unstyled">
        @foreach($errors->all() as $e)
            <li>{!! $e !!}</li>
        @endforeach
    </ul>
@endif

{!! Form::open(array('url' => '/admin/user/store')) !!}
    
    <div class="form-group">
        {!! Form::label('username', 'Име на потребителя') !!}
        {!! Form::text('username', Input::old('username'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Потребителско Име') !!}
        {!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Парола') !!}
        {!! Form::password('password', array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('passwordRepeat', 'Повтори паролата') !!}
        {!! Form::password('passwordRepeat', array('class' => 'form-control')) !!}
    </div>

     <div class="form-group">
        {!! Form::label('admin', 'Права') !!}
        {!! Form::select('admin', array('a' => 'Администратор', 'b' => 'Потребител', ), Input::old('admin'), array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Създай', array('class' => 'btn btn-primary')) !!} 

{!! Form::close() !!}

@endsection

@section('footer-scripts')
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script>
        setInterval(function(){
            window.location = window.location;
        }, 90000);
    </script>
@endsection