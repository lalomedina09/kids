@push('scripts')
<script type="text/javascript" >
    document.getElementById("coupon").addEventListener("keyup", function() {
    var nameInput = document.getElementById('coupon').value;
    if (nameInput != "") 
    {
        document.getElementById("enviaForm").disabled = true;
        document.getElementById("para").hidden = false;
        document.getElementById("alertas").hidden = true;
    }
    else if(nameInput == "")
    {
        document.getElementById("enviaForm").disabled = false;
        document.getElementById("para").hidden = true;
    }
});

        //Pasar cupon al formulario
       // window.onload = function() {
        function enviarCupon() {
        try
        {
        const user = @json($coupon);

        var cajaCupon = $('#coupon').val();

        var codigo = user.filter(function (entry) {
            return entry.code === cajaCupon;
        });
         
        var url = "{{ route('courses.payWithPayPal', ':descuento', ':curso') }}"; 
        var descuento = 0;
        if(codigo[0].discount)
        {
            var descuento = codigo[0].discount;
        }
        var descuento = codigo[0].discount;
        url = url.replace(':descuento', codigo[0].discount);
        url = url.replace(':curso', 0);
        //url = url.replace(':id', codigo[0].id);
        console.log(codigo[0].discount);

        var a = document.getElementById('form-course');
        a.action = url;
        //a.action = '/paypal';
        }
        catch(err) 
        {
            var url = "{{ route('courses.payWithPayPal', ':descuento', ':curso') }}"; 
            url = url.replace(':descuento', 0);
            url = url.replace(':curso', 0);
            //url = url.replace(':id', '');
            var a = document.getElementById('form-course');
            a.action = url;
            console.log('error action form');
        }
      }
   // }
        //Pasar cupon al formulario

var button1 = document.getElementById("validar");
button1.addEventListener("click", function() {
  button1.dataset.clicked = "true";
  
  
  const user = @json($coupon);

  var cajaCupon = $('#coupon').val();

  var codigo = user.filter(function (entry) {
    return entry.code === cajaCupon;
  });


  const idCurso = @json($course->id);
  const fechaActual = @json($fechaActual);

    //Obtencion de variables
    try 
    {
        var start_date = codigo[0].rules.start_date;
        var end_date = codigo[0].rules.end_date;
        var uses = codigo[0].rules.uses;
        var taller = codigo[0].rules.taller;
        var idCupon = codigo[0].id;

    }
    catch(err) 
    {
       console.log('error');
    }
    
    //const cuponTest = @json($couponTest->order_items);

    if(!idCupon)
    {
        var idCupon = 0;
    }

    //$.ajax({
    //            url: "{{ route('courses.getUsos', [0])}}",
    //            type: 'GET',
    //            data: { id: idCupon },
    //            success: function(response)
    //            {
    //                var obj=$.parseJSON(response);
    //                //console.log(idCupon);
    //                //console.log(obj);
    //                $('#usosCupon').val(obj);
    //            }
    //        });

    //var usosCupon = $('#usosCupon').val();
   
    //Obtencion de variables

    //test
    var usosCupon = function () {
    var tmp = null;
    $.ajax({
        async: 'false',
        url: "{{ route('courses.getUsos', [0])}}",
        type: 'GET',
        data: { id: idCupon },
        'success': function (response) {
            var obj=(response);
            $('#usosCupon').val(obj);
            tmp = obj;
        }
    });
    return tmp;
    }();    
    //test
    console.log(usosCupon);

  if(codigo != "" && taller == idCurso)
  {
    
    if(fechaActual <= end_date && fechaActual >= start_date){
        if(usosCupon < uses)
        {
            //console.log(usosCupon);
            console.log("cupon valido");
            document.getElementById("enviaForm").disabled = false;
            document.getElementById("para").hidden = true;
            document.getElementById("coupon").classList.add('form-control','is-valid');
        }
        else
        {
            //console.log(usosCupon);
            document.getElementById("para").hidden = true;
            document.getElementById("alertas").innerHTML = "el cupón súpero su límite de usos!";
            document.getElementById("alertas").hidden = false;
            document.getElementById("enviaForm").disabled = false;
            console.log("el cupon supero su limite de usos");
        }
    }
    else{
        document.getElementById("para").hidden = true;
        document.getElementById("alertas").innerHTML = "cupón fuera de fechas!";
        document.getElementById("alertas").hidden = false;
        document.getElementById("enviaForm").disabled = false;
        console.log("cupon fuera de fechas, lo sentimos");
    }

    
    //console.log("exists");
    //console.log(start_date);
    //console.log(idCurso);
    //console.log(fechaActual);
  }
  else
  {
    document.getElementById("alertas").innerHTML = "el cupón no concuerda con nuestros registros!";
    document.getElementById("para").hidden = true;
    document.getElementById("alertas").hidden = false;
    document.getElementById("enviaForm").disabled = false;
    console.log("not exists");
  }


    
});

//document.getElementById("enviaForm").addEventListener("click", function() {

 // if(button1.dataset.clicked)
//  {
 //   console.log("Yes");
//  }
 // else
 // {
 //   console.log("No");
 // }
//});



</script>
@endpush
@push('styles')
<style>
.btnblue{
    background-color:#1FDED0;
    color:white;
}
.rojo{
    background-color:white;
    color:#FF6161;
}

</style>
@endpush

<div id="modal-checkout" class="modal-fullscreen">
    <button type="button" class="close">
        <span class="fa fa-close"></span>
    </button>

    <div class="container">
        <div class="mt-5">
            <div class="text-center">
                <p class="text-bold mb-2">@lang('Price'):</p>
                @if($course->slug == 'taller-online-inversion-para-principiantes')         
                <h2 class="text-danger text-bold">$ {{ $Conversion }} USD</h2>
                @else
                <h2 class="text-danger text-bold">$ {{ $course->price }} MXN</h2>
                @endif
                
                <p class="text-small">(Impuestos incluídos)</p>
            </div>

            <hr>
            @if($course->slug != 'taller-online-inversion-para-principiantes')   
            <form action="{{ route('courses.buy', [$course->slug]) }}" method="post" id="form-course" class="form-custom">
            @else
            <form onsubmit="enviarCupon()"  method="get" id="form-course" class="form-custom">
            @endif
                @csrf

                <p class="text-uppercase text-center text-bold mb-4">
                    @lang('Select your payment method')
                </p>
                @if($course->slug != 'taller-online-inversion-para-principiantes')
                <div class="row mb-3">
                    <div class="col-xl-4 col-lg-4 col-12">
                        <div class="form-group mb-0">
                            <div class="custom-control custom-radio">
                                <label>
                                    <span class="custom-control-description">Tarjeta de crédito / débito</span>
                                    <input type="radio" name="payment" value="card" checked>
                                    <span class="custom-control-indicator float-right"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-8 col-12 small">
                        Al seleccionar esta opción se te pedirán los datos de la tarjeta con la que desees pagar tu orden de compra.
                        <ul class="list">
                            <li>No almacenamos la información de tus tarjetas de crédito o débito.</li>
                            <li>No se aplican comisiones adicionales.</li>
                        </ul>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-4 col-lg-4 col-12">
                        <div class="form-group mb-0">
                            <div class="custom-control custom-radio">
                                <label>
                                    <span class="custom-control-description">Tiendas OXXO</span>
                                    <input type="radio" name="payment" value="oxxo_cash">
                                    <span class="custom-control-indicator float-right"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-8 col-12 small">
                        Al seleccionar esta opción se generará una referencia y podrás realizar el pago en cualquier tienda OXXO.
                        <ul class="list">
                            <li>Recibirás un correo electrónico con las instrucciones para el pago.</li>
                            <li>OXXO cobrará una comisión adicional de {{ config('money.modules.marketplace.gateway.comission') }} en caja.</li>
                            <li>La orden de compra deberá pagarse antes de la fecha indicada en la misma.</li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12">
                        <div class="form-group mb-0">
                            <div class="custom-control custom-radio">
                                <label>
                                    <span class="custom-control-description">Transferencia SPEI</span>
                                    <input type="radio" name="payment" value="spei">
                                    <span class="custom-control-indicator float-right"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-8 col-12 small">
                        Al seleccionar esta opción se te proporcionará una CLABE y podrás realizar una transferencia mediante SPEI desde el portal en línea de tu banco.
                        <ul class="list">
                            <li>Recibirás un correo electrónico con las instrucciones para el pago.</li>
                            <li>El banco puede cobrar una comisión adicional que varía de acuerdo a las políticas de cada institución.</li>
                            <li>La orden de compra deberá pagarse antes de la fecha indicada en la misma.</li>
                        </ul>
                    </div>
                </div>
                @else

                <!-- Se argega paypal  -->
                <div class="row mb-3">
                    <div class="col-xl-4 col-lg-4 col-12">
                        <div class="form-group mb-0">
                            <div class="custom-control custom-radio">
                                <label>
                                    <span class="custom-control-description">PAYPAL</span>
                                    <input type="radio" name="payment" value="paypal" checked>
                                    <span class="custom-control-indicator float-right"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-8 col-12 small">
                      <a>Al seleccionar esta opción te redireccionaremos con el LOGIN oficial de PayPal</a>
                        <ul class="list">
                            <li>PayPal te redireccionará a tu cuenta y tarjeta preferida de pago</li>
                            <li>PayPal cobrará una comisión adicional del 5% + 0.30 USD</li>
                        </ul>
                    </div>
                </div>
               <!--  fin de paypal -->
               @endif

              

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <label>
                            <input type="checkbox" name="politics"
                                id="politics" value="1">
                            <label for="politics"
                                class="form-control-label">
                                He leído las <a href="{{ route('policies') }}" target="_blank">Políticas de Devoluciones</a>
                            </label>
                            <span class="custom-control-indicator"></span>
                        </label>
                    </div>
                </div>
                <!-- aplicar cupon -->
                <div class="form-row justify-content-center">
                <div class="form-group text-center col-xl-2 col-lg-2 col-12">
                    </div>
                    <div class="form-group text-center col-xl-4 col-lg-4 col-12">
                        <input type="text" id="coupon" name="coupon"  placeholder="Código de cupón">
                        <span id="coupon-description" class="text-small text-success"></span>
                    </div>
                    <div class="form-group text-center col-xl-4 col-lg-4 col-12" hidden='true'>
                        <input type="text" id="usosCupon" name="usosCupon"  placeholder="Código de cupón">
                        <span id="coupon-description" class="text-small text-success"></span>
                    </div>

                    <div class="form-group col-xl-4 col-lg-4 col-12">
                        <button type="button" name="validar" id="validar" class="btn btn-pill btnblue ">@lang('Apply coupon')</button>
                    </div>
                </div>
                <!-- texto -->
                <div class="form-row justify-content-center">
                    <div class="form-group text-center rojo">
                        <p hidden="true" id="para" class="text-small">
                        (*) primero aplica cupón para proseguir 
                        </p>
                    </div>
                </div>
                <!-- texto -->
                <!-- texto -->
                <div class="form-row justify-content-center">
                    <div class="form-group text-center rojo">
                        <p hidden="true" id="alertas" class="text-small">
                        
                        </p>
                    </div>
                </div>
                <!-- texto -->
            
                <!-- aplicar cupon -->

                <div class="form-group">
                    <p class="text-bold">
                        (*) La confirmación de la compra está sujeta al pago de la misma.
                    </p>
                </div>

                <div class="form-group text-center my-3">
                    <input type="submit"
                        id="enviaForm"
                        class="btn btn-pill btn-danger"
                        value="@lang('Buy')"
                        >
                </div>

                <div class="text-center mb-0">
                    <p class="small mb-0">Procesamos tus pagos con ayuda de API:</p>
                    <img src="{{ asset('qd/marketplace/images/conekta.png') }}" width="120">
                </div>
            </form>
        </div>
    </div>
</div>
