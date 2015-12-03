@extends("layout.content")

@section('content')
<div class="col-md-8 col-sm-7 col-lg-9">
	<iframe src="127.0.0.1/admin" width="100%" height="100%"></iframe>
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