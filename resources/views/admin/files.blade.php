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
          @foreach($files as $file)
          <tr>            
            <td class="text-left"><a href="{{$file['filePath']}}">{{$file['fileName']}}</a></td>
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