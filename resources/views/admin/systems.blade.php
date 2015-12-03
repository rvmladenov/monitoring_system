        <div class="col-md-12">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-right">
                    			<button class="btn btn-success">Добави система </button>
                    		</h3>
                    </div>
                    <div class="panel-body">
                     
                    	<table class="table table-hover">
                    		<tbody>
                    		@foreach($systems as $system)                  		  
                    			<tr class="{{$system['status']}}">
                    				<th>
                    					{{ $system->name }}
                    				</th>
                    				<td>
                    					{{ $system->host }} / {{ $system->dbname }}
                    				</td>
                    				<td>
                    					<a href="{{url('admin/systems', $system->id)}}" type="button" class="btn btn-info">Виж</a>
                    					<!-- If ADMIN -->
                    					<button type="button" class="btn btn-warning">Промени</button>
                    					<!-- end -->
                    				</td>
                    			</tr>
                    		@endforeach
                    		</tbody>
                    	</table>
                    </div>
                </div>
            </div>
        </div>    