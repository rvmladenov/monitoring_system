@extends("layout.content")

@section('content')
<div class="col-md-8 col-sm-7 col-lg-9">
<h2>Промяна на Потребител {{$user->name}}</h2>

@if ($errors->any())
    <ul class="alert alert-danger list-unstyled">
        @foreach($errors->all() as $e)
            <li>{!! $e !!}</li>
        @endforeach
    </ul>
@endif

{!! Form::open(array('url' => '/admin/user/update')) !!}
    {!! Form::hidden('id', $user->id, array('id' => 'id')) !!}
    <div class="form-group">
        {!! Form::label('username', 'Име на потребителя') !!}
        {!! Form::text('username', $user->username, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Потребителско Име') !!}
        {!! Form::text('name', $user->name, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('passwordNew', 'Нова Парола') !!}
        {!! Form::password('passwordNew', array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('passwordRepeat', 'Повтори паролата') !!}
        {!! Form::password('passwordRepeat', array('class' => 'form-control')) !!}
    </div>

     <div class="form-group">
        {!! Form::label('admin', 'Права') !!}
        {!! Form::select('admin', array('a' => 'Администратор', 'b' => 'Потребител', ), $user->admin, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Промени', array('class' => 'btn btn-primary')) !!} 

{!! Form::close() !!}

{!! Form::open(array('url' => '/admin/user/'.$user->id.'/delete')) !!} 
<div class="form-group">
    <h2>Внимание! Това действие е невъзвратимо!</h2>
    {!! Form::submit('Изтрий', array('class' => 'btn btn-danger')) !!} 
</div>
{!! Form::close() !!}
</div>
@endsection

@section('footer-scripts')
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script>
        setInterval(function(){
            window.location = window.location;
        }, 90000);
    </script>
@endsection