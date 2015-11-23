@extends("layout.content")

@section('content')
        <div class="col-md-8 col-sm-7 col-lg-9">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Системи  
                        	<!-- If ADMIN -->
                    			<button class="pull-right btn btn-success	">Добави система </button>
                    			<!-- end -->
                    		</h3>
                    </div>
                    <div class="panel-body">
                     
                    	<table class="table table-hover">
                    		<tbody>
                    		@foreach($systems as $system)                   		  
                    			<tr>
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
@endsection

@section('footer-scripts')
	<script src="/js/bootstrap/bootstrap.min.js"></script>
@endsection