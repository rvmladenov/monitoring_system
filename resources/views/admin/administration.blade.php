@extends('layout.content')

@section('content')

<div class="col-md-8 col-sm-7 col-lg-9">

    <div class="panel panel-default">
        <div class="panel-heading">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#systems-list" aria-controls="systems-list" role="tab" data-toggle="tab">Списък на системите</a>
                </li>
                <li role="presentation"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Потребители</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="systems-list" class="panel-body table-responsive">
                 @include('admin/systems')                    
                </div>
                <div role="tabpanel" class="tab-pane" id="users" class="panel-body table-responsive">
                    <div></div>
                    <table id="users-list-table" class="table display">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Име</th>
                            <th>Позиция</th>
                            <th>Пол</th>
                            <th>Адрес</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="user-pic"><img src="img/user-thumb.jpg" alt="" /></td>
                            <td>Иван Петров</td>
                            <td>Integration Specialist</td>
                            <td>male</td>
                            <td>Sofia, Bulgaria</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>
@endsection
        </div>

@section('footer-scripts')
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/js/datatables/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
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
            
            $('#users-list-table').dataTable({
                "columnDefs": [{
                    "targets": [0, 5],
                    orderable: false
                }], "language": langObj
            });
        } );
    </script>
@endsection