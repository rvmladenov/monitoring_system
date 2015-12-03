    <div class="col-md-4 col-sm-5 col-lg-3">
        <div class="row sidebar-menu">
            <div class="col-md-8 col-sm-8 col-xs-8">
                <i class="fa fa-home"></i>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Администрация<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>{!! HTML::linkAction('Admin\AdministrationController@index', 'Начало') !!}</li>
                    <li role="separator" class="divider"></li>
                    
                </ul>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 text-right">
                <i class="fa fa-sign-out"></i>{!! HTML::link('auth/logout', 'Изход') !!}
            </div>
        </div>
        <div class="panel panel-primary sidebar-systems">
            <div class="panel-heading">Системи</div>
            <div class="panel-body">            
                <div class="list-group">
                    @foreach($systems as $system)                    
                    <a class="list-group-item {{ Request::segment(3) ==  $system->id ? 'active':''}}" href="{{url('admin/systems', $system->id)}}">
                        <label class="btn btn-xs pull-right {{$system['status']}}">
                           {{($system['status'] == 'success') ? 'Ok': (($system['status'] == 'warning') ? 'Внимание!':(($system['status'] == 'error')? 'Грешка!':(($system['status'] == 'default')? 'Няма Връзка!':'')))}}
                        </label>
                        {{ $system->name }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <a href="{{url('files')}}" class="btn btn-info">Aвроматично генерирани доклади</a>
        </div>
    </div>