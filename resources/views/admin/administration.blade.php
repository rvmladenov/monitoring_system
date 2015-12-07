@extends('layout.content')

@section('content')

<div class="col-md-8 col-sm-7 col-lg-9">

    <div class="panel panel-default">
        <div class="panel-heading">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#systems-list" aria-controls="systems-list" role="tab" data-toggle="tab">Списък на системите</a>
                </li>
                @if(Auth::user()->admin == 'a')<li role="presentation"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Потребители</a></li>@endif
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="systems-list" class="panel-body table-responsive">
                    @include('admin/systems')                    
                </div>
                @if(Auth::user()->admin == 'a')
                <div role="tabpanel" class="tab-pane" id="users" class="panel-body table-responsive">
                    @include('admin/users')
                </div>
                @endif
            </div>
        </div>

</div>
@endsection
        </div>

@section('footer-scripts')
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/js/datatables/datatables.min.js"></script>

    <script>
        var langObj = {
            "info": "Страница _PAGE_ от _PAGES_",
            "lengthMenu": "Покажи по _MENU_ резултата",
            "search": "Търси:",
            "paginate": {
                "first": "Начало",
                "last": "Край",
                "next": "Напред",
                "previous": "Назад",
            }
        };        
    </script>
    @if(Auth::user()->admin == 'a')
    <script> 
        $(document).ready(function() {          
            $('#users-list-table').dataTable({
                "columnDefs": [{
                    "targets": [2],
                    orderable: false
                }],
                "language": langObj, 
                paging: false
            });
        });
    </script>
    @endif
    <script>
        $(document).ready(function() {          
            $('#systems-table').dataTable({
                "columnDefs": [                    
                    {"searchable":true, orderable: true, "targets": [0,1,2]},
                    {"searchable":false, orderable: false, "targets": 3}
                ],
                "language": langObj,
                 paging: false
            });
        });
    </script>
@endsection