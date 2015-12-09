        <div class="col-md-12">
            <div class="row">
                <div class="panel panel-default">
                    @if(Auth::user()->admin == 'a')<div class="panel-heading">
                        <h3 class="panel-title text-right">
                    			<a href="{{URL::to('admin/system/addSystem')}}" class="btn btn-success">Добави система </a>
                    		</h3>
                    </div>@endif
                    <div class="panel-body">
                     
                    	<table id="systems-table" class="table display">
                    		<thead>
                                <tr>
                                    <th>Система</th>
                                    <th>Адрес</th>
                                    <th>Таблица</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                    		@foreach($systems as $system)               		  
                    			<tr class="{{$system->status}}">
                    				<th>{{ $system->name }}</th>
                    				<td>{{ $system->host }}</td>
                                    <td>{{ $system->dbname }}</td>
                    				<td>
                    					<a href="{{url('admin/systems', $system->id)}}" type="button" class="btn btn-info">Виж</a>
                    					@if(Auth::user()->admin == 'a')
                    					<a href="{{URL::to('admin/system/'.$system->id.'/editSystem')}}" type="button" class="btn btn-warning">Промени</a>
                    					@endif
                    				</td>
                    			</tr>
                    		@endforeach
                    		</tbody>
                    	</table>
                    </div>
                </div>
            </div>
        </div>    