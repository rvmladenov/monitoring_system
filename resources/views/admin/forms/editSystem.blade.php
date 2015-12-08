@extends("layout.content")

@section('content')
<div class="col-md-8 col-sm-7 col-lg-9">
<h2>Промяна на Система {{$system->name}}</h2>

@if ($errors->any())
    <ul class="alert alert-danger list-unstyled">
        @foreach($errors->all() as $e)
            <li>{!! $e !!}</li>
        @endforeach
    </ul>
@endif

{!! Form::open(array('url' => '/admin/system/update')) !!}
    {!! Form::hidden('id', $system->id, array('id' => 'id')) !!}
    <div class="form-group">
        {!! Form::label('name', 'Име на Системата') !!}
        {!! Form::text('name', $system->name, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('host', 'Адрес на Базата Данни') !!}
        {!! Form::text('host', $system->host, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dbversion', 'Версия на Базата Данни') !!}
        {!! Form::select('dbversion', array('0' => 'Избери Версия', '2000' => 'SQL Server 2K', '2005' => 'SQL Server 2005', '2008' => 'SQL Server 2008'), $system->dbversion, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dbname', 'Име на Базата Данни') !!}
        {!! Form::text('dbname', $system->dbname, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dbuser', 'Потребител') !!}
        {!! Form::text('dbuser', $system->dbuser, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dbuserpass', 'Парола') !!}
        {!! Form::password('dbuserpass', array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('systemView', 'Адрес на WINCC панела') !!}
        {!! Form::text('systemView',$system->systemView, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Промени', array('class' => 'btn btn-primary')) !!} 

{!! Form::close() !!}

{!! Form::open(array('url' => '/admin/system/'.$system->id.'/delete')) !!} 
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