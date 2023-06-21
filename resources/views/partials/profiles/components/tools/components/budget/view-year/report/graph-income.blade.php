<!---------------------->
<div class="col-md-12 mt-1">
    <h4 class="text-center">
        <br><br>
        Reporte anual de tus ingresos
    </h4>
</div>
<div class="col-md-12 mt-3">
    <canvas id="myChartIngresos"  width="800px" height="400px"></canvas>
</div>
<div class="col-md-12 mt-3"> <br><br> </div>
<!---------------------->
<div class="col-md-12 mt-1">
    <h4 class="text-center">
        <br><br>
        Reporte anual de tus gastos
    </h4>
</div>
<div class="col-md-12 mt-3">
    <canvas id="myChartGastos"  width="800px" height="400px"></canvas>
</div>
<div class="col-md-12 mt-3"> <br><br> </div>
<!---------------------->
<script type="text/javascript">
    $(function () {
        //Levamos la primer grafica para los ingresos
        var ctx = document.getElementById("myChartIngresos").getContext('2d');
        var arrayMeses =  {!! json_encode($labels) !!};
        var arrayIngresosReales =  {!! json_encode($ingresosReales) !!};
        var arrayingresosEstimados =  {!! json_encode($ingresosEstimados) !!};

        var arrayGastosReales =  {!! json_encode($gastosReales) !!};
        var arrayGastosEstimados =  {!! json_encode($gastosEstimados) !!};

            var data = {
                datasets: [
                        {
                            label: 'Ingresos Reales',
                            backgroundColor: 'rgb(3, 218, 202)',
                            borderColor: 'rgb(3, 218, 202)',
                            data: arrayIngresosReales,
                        },
                        {
                            label: 'Ingresos Estimados',
                            backgroundColor: 'rgb(0, 0, 0)',
                            borderColor: 'rgb(0, 0, 0)',
                            data: arrayingresosEstimados,
                        }
                    ],
                labels: arrayMeses
            };
            var myDoughnutChart = new Chart(ctx, {
                //type: 'doughnut',
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12
                        }
                    },
                    title: {
                        display: true,
                        text: 'Grafica de tus ingresos estimados vs reales'
                    }
                }
            });


        //Iniciamos la segunda grafica para los gastos
        var ctx_2 = document.getElementById("myChartGastos").getContext('2d');
        var data_2 = {
            datasets: [
                {
                    label: 'Gastos Reales',
                    backgroundColor: 'rgb(143, 208, 107)',
                    borderColor: 'rgb(143, 208, 107)',
                    data: arrayGastosReales,
                },
                {
                    label: 'Gastos Estimados',
                    backgroundColor: 'rgb(0, 0, 0)',
                    borderColor: 'rgb(0, 0, 0)',
                    data: arrayGastosEstimados,
                }
            ],
                labels: arrayMeses
            };
            var myDoughnutChart_2 = new Chart(ctx_2, {
                type: 'line',
                data: data_2,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12
                        }
                    },
                    title: {
                        display: true,
                        text: 'Grafica de tus gastos estimados vs reales'
                    }
                }
            });

        //empieza la graficas de pie por categorias
    });
    </script>
