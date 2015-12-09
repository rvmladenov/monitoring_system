@extends('layout.content')

@section('content')
        <div class="col-md-8 col-sm-7 col-lg-9">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Профил</h3>
                    </div>
                    <div class="panel-body">
                        <form action="#" class="form-horizontal">
                            <div class="col-md-3 text-center">
                                <img src="img/user-thumb.jpg" class="profile-pic" alt="" />
                                <input type="file" name="image" class="form-control" />
                            </div>
                            <div class="col-md-9">
                                <div class="form-area">
                                    <div class="group">
                                        <input type="text" name="name" class="form-control" value="Петя Минкова" placeholder="Име" />
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="group">
                                        <input type="text" name="job" class="form-control" value="Оператор" placeholder="Работна позиция" />
                                        <i class="fa fa-suitcase"></i>
                                    </div>
                                    <div class="group">
                                        <input type="text" name="phone" class="form-control" value="0893456535" placeholder="Телефон" />
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="group">
                                        <input type="text" name="male" class="form-control" value="мъж" placeholder="Пол" />
                                        <i class="fa fa-male"></i>
                                    </div>
                                    <div class="group">
                                        <input type="text" name="birthdate" class="form-control" value="11.11.2005 г." placeholder="Дата" />
                                        <i class="fa fa-birthday-cake"></i>
                                    </div>
                                    <div class="group">
                                        <textarea name="description" class="form-control">Може би някакво описание тук</textarea>
                                        <i class="fa fa-file-text"></i>
                                    </div>
                                    <button type="submit" class="btn btn-info">ЗАПАМЕТИ</button>
                                    <button type="reset" class="btn btn-info pull-right">ПРЕЗАРЕДИ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('footer-scripts')
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/js/datepicker/datetimepicker.full.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#birthdate').datetimepicker({
                format:'d.m.Y'
            });
        });
        
        setInterval(function(){
            window.location = window.location;
        }, 90000);
    </script>
@endsection