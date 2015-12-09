 <div class="col-md-12">
    <div class="row">
        <div class="panel panel-default">
            @if(Auth::user()->admin == 'a')<div class="panel-heading">
                <h3 class="panel-title text-right">
                        <a href="{{URL::to('admin/user/addUser')}}" class="btn btn-success">Добави потребител </a>
                    </h3>
            </div>@endif
            <div class="panel-body">
                <table id="users-list-table" class="table display">
                    <thead>
                    <tr>
                        <th>Име</th>
                        <th>Потребител</th>
                        <th>Права</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->username}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                @if($user->admin == 'a')
                                Администратор
                                @else
                                Потребител
                                @endif
                            </td>
                            <td>
                                <a href="{{URL::to('admin/user/'.$user->id.'/editUser')}}" class="btn btn-sm btn-warning">Промени</a>
                                <a href="{{URL::to('admin/user/addUser')}}" class="btn btn-sm btn-danger">Изтрии</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>