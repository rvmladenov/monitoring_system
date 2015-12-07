    <div class="col-md-4 col-sm-5 col-lg-3">
        <div class="panel panel-primary sidebar-systems">           
            <div class="panel-heading"><a href="{{URL::to('/admin')}}"><h5><i class="glyphicon glyphicon-home"></i> Системи</h5></a></div>
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
            <a href="{{url('files')}}" class="btn btn-info col-sm-12">Aвроматично генерирани доклади</a>
        </div>
        <div>&nbsp;</div>              
        <div class="col-sm-12">
            <a href="{{url('auth/logout')}}" class="btn btn-danger col-sm-12"><i class="glyphicon glyphicon-log-out"></i> Изход</a>
        </div>
    </div>