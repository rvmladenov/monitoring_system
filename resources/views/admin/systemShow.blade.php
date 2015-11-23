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
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-lg btn-info">Генериране на справки и доклади(отваря
                                iFrame-a)
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-lg btn-info">Генериране на доклади(отваря iFrame-a)
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Моментни измервания<br>
                                <small>час и дата на последните данни - 2015,10,23 10:05</small>
                            </h2>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center" colspan="2">SO<sub>2</sub></th>
                                    <th class="text-center" colspan="2">SO<sub>2</sub></th>
                                    <th class="text-center" colspan="2">SO<sub>2</sub></th>
                                    <th class="text-center" colspan="2">SO<sub>2</sub></th>
                                    <th class="text-center" colspan="2">SO<sub>2</sub></th>
                                    <th class="text-center" colspan="2">SO<sub>2</sub></th>
                                    <th class="text-center" colspan="2">SO<sub>2</sub></th>
                                    <th class="text-center" colspan="2">SO<sub>2</sub></th>
                                    <th class="text-center" colspan="2">SO<sub>2</sub></th>
                                    <th class="text-center" colspan="2">SO<sub>2</sub></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>15.6</td>
                                    <td>200</td>
                                    <td>15.6</td>
                                    <td>200</td>
                                    <td>15.6</td>
                                    <td>200</td>
                                    <td>15.6</td>
                                    <td>200</td>
                                    <td>15.6</td>
                                    <td>200</td>
                                    <td>15.6</td>
                                    <td>200</td>
                                    <td>15.6</td>
                                    <td>200</td>
                                    <td>15.6</td>
                                    <td>200</td>
                                    <td>15.6</td>
                                    <td>200</td>
                                    <td>15.6</td>
                                    <td>200</td>
                                </tr>
                                </tbody>
                            </table>
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
@endsection