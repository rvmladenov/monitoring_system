@extends("layout.content")

@section('content')
    <div class="col-md-8 col-sm-7 col-lg-9">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Детайли за {{$system->name}}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-lg btn-info">Генериране на справки и доклади(отваря
                                iFrame-a)
                            </button>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Моментни измервания<br>
                                <small>час и дата на последните данни - 2015,10,23 10:05</small>
                            </h2>
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr style="font-size:13px;">
                                @foreach($sysData as $systemData)                                   
                                    <td class="text-center" colspan="2"  style="border-right:1px solid #ddd;">
                                    @if (Lang::has('measurments.'.$systemData['param_name']))
                                        {{trans('measurments.'.$systemData['param_name'])}} 
                                    @else
                                        {{$systemData['param_name']}} 
                                    @endif
                                        <br><small> {{$systemData['param_unit']}}</small></td>                                    
                                @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="font-size:12px;">
                                @foreach($sysData as $systemData)                                   
                                    <td class="{{$systemData['status']}}">{{$systemData['value']}} </td>
                                    <td class="{{$systemData['status']}}" style="border-right:1px solid #ddd;">{{$systemData['ad_limit']}} </td>                                    
                                @endforeach
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Моментни статуси на СНИ<br>
                                <small>час и дата на последните данни - 2015,10,23 10:05</small>
                            </h2>
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>Контролер</th>
                                    <th class="success">OK</th>
                                    <td class="default">Заявка за поддръжка</td>
                                    <td class="default">В поддръжка</td>
                                    <td class="default">Грешка</td>
                                </tr>
                                <tr>
                                    <th>Газ-анализаторна система</th>
                                    <th class="success">OK</th>
                                    <td class="default">Заявка за поддръжка</td>
                                    <td class="default">В поддръжка</td>
                                    <td class="default">Грешка</td>
                                </tr>
                                <tr>
                                    <th>Прахомер</th>
                                    <th class="success">OK</th>
                                    <td class="default">Заявка за поддръжка</td>
                                    <td class="default">В поддръжка</td>
                                    <td class="default">Грешка</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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