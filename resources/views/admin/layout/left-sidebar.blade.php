    <div class="col-md-4 col-sm-5 col-lg-3">
        <div class="row sidebar-menu">
            <div class="col-md-8 col-sm-8 col-xs-8">
                <i class="fa fa-home"></i>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Администрация<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>{!! HTML::linkAction('Admin\ProfileController@index', 'Профил') !!}</li>
                    <li role="separator" class="divider"></li>
                    <li>{!! HTML::linkAction('Admin\AdministrationController@index', 'Администрация') !!}</li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 text-right">
                <i class="fa fa-sign-out"></i>{!! HTML::link('auth/logout', 'Изход') !!}
            </div>
        </div>
        <div class="panel panel-primary sidebar-systems">
            <div class="panel-heading">Статуси на Системите</div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="./samples/stupid-demo-success.html" target="systems">
                            <label class="btn success pull-right">OK</label>
                            <label class="btn system-title">АВД 1</label>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="./samples/stupid-demo-failed.html" target="systems">
                            <label class="btn error pull-right">F</label>
                            <label class="btn system-title">АД 4</label>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="./samples/stupid-demo-warning.html" target="systems">
                            <label class="btn warning pull-right">W</label>
                            <label class="btn system-title">ВДТК</label>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="./samples/stupid-demo-success.html" target="systems">
                            <label class="btn success pull-right">OK</label>
                            <label class="btn system-title">ККР</label>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>