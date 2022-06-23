@extends('layouts.page')

@section('page')

<div class="rounded-lg" style="background-image: url('/images/background/yellow.png');">
    <div class="exercise__container text-center">
        <h2 class="mb-5">Reto Inversión</h2>
    </div>
    <div class='container row'>
        <div class="col-md-4">
            <h4 class="font-weight-bold">
                Edad:
                <input type="number" id="edad"
                        class="form-control exercise-answer-number"
                        min="1" step="1" />
            </h4>
        </div>
        <div class="col-md-4">
            <h4 class="font-weight-bold">
                Edad retiro:
                <select name="retiro" id="retiro"
                    class="form-control exercise-answer exercise-answer-type">
                    <option value="60" >60</option>
                    <option value="65" >65</option>
                    <option value="67" >67</option>
                </select>
            </h4>
        </div>
        <div class="col-md-4">
            <h4 class="font-weight-bold">
                Genero:
                <select name="retiro" id="retiro"
                    class="form-control exercise-answer exercise-answer-type">
                    <option value="Femenino" >Femenino</option>
                    <option value="Masculino" >Masculino</option>
                </select>
            </h4>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4">
            <h4 class="font-weight-bold">
                Ahorro mensual:
                <input type="number" id="ahorro"
                        class="form-control exercise-answer-number"
                        min="1" step="1" />
            </h4>
        </div>
        <div class="col-md-4">
            <h4 class="font-weight-bold">
                Saldo Afore:
                <input type="number" id="afore"
                        class="form-control exercise-answer-number"
                        min="1" step="1" />
            </h4>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 text-center">
            <a onclick="calcularReto()" class="btn btn-primary">Calcular</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <p id="errores" class="text-small text-danger text-center"></p>
            <h4 class="font-weight-bold">
                Saldo acumulado: <span id="saldoRet"></span><br>
                Ahorro: <span id="ahorroRet"></span><br>
                Rendimiento: <span id="rendRet"></span>
            </h4>
            <p class="text-small"><b>Importante: </b> Los resultados estimados fueron calculados con base en las cifras que proporcionaste. Solo se muestran para fines ilustrativos, por lo que carecen de valor oficial y no tienen efectos vinculantes para la CONSAR.</p>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 text-center">
            <a class="back" href="{{ route('exercises.index') }}">Regresar a ejercicios</a><br>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection


@push('scripts-inline')
    <script type="text/javascript">
        function calcularReto(){
            edad=0;retiro=$('#retiro').val();
            if($('#edad').val()==''){
                $('#errores').html('Edad invalida'); return;
            } else { edad=$('#edad').val()}
            if(parseInt(edad)>=parseInt(retiro)){
                $('#errores').html('Edad debe ser menor'); return;
            }
            if($('#ahorro').val()==''){
                $('#errores').html('Ahorro invalido'); return;
            } else { ahorro=$('#ahorro').val()}
            if($('#afore').val()==''){
                afore=0;
            } else { afore=$('#afore').val()}
            $('#errores').html('');i=0;
            anios= retiro-edad;
            meses = 12 * anios;
            ahorrobase=(meses*ahorro);
            interes=ahorrobase*(1+parseFloat(meses)*.00416);
            comision=ahorrobase*(1+parseFloat(meses)*.00096);
            anual=(ahorrobase*(1+parseFloat(meses)*.0041))-((ahorrobase*(1+parseFloat(meses)*.00254)))
            totanual=(Math.round(anual * 100) / 100).toFixed(2)
            $('#saldoRet').html(parseFloat(ahorrobase)+parseFloat(totanual));
            $('#ahorroRet').html(ahorrobase+parseFloat(afore));
            $('#rendRet').html(totanual);
        }
    </script>
@endpush
