@extends("layout.content")

@section('content')
<div class="col-md-8 col-sm-7 col-lg-9">
	<div class="table-responsive">
      <table id="bs-table" class="table table-hover">
        <thead>
          <tr>
            <th class="col-sm-6 text-left">Име</th>
            <th class="col-sm-3 text-right">Размер</th>
            <th class="col-sm-3 text-right">Дата</th>
          </tr>
        </thead>        
        <tbody>
          	<tr>
          		<td colspan="3"><a href="javascript: void(0);" onclick="window.history.back();" style="display:block;width:100%;">..</a>
          	</tr>
          @foreach($directories as $directory)
           <tr>            
            <td class="text-left" colspan="3"><a href="{{url('files', $directory['path'])}}" style="display:block;width:100%;">{{$directory['name']}}</a></td>            
          </tr>
          @endforeach
          @foreach($files as $file)
          <tr>            
            <td class="text-left"><a href="{{$file['filePath']}}" style="display:block;width:100%;">{{$file['fileName']}}</a></td>
            <td class="text-right">{{$file['fileSize']}}</td>
            <td class="text-right">{{date('Y-m-d H:i:s', $file['fileDate'])}}</td>
          </tr>
          @endforeach
        </tbody>                          
      </table>
    </div>
</div>
@endsection

@section('footer-scripts')
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script>
        setInterval(function(){
            window.location = window.location;
        }, 120000);
    </script>
@endsection