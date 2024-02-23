"use strict";
! function($) {

    // Definición de la clase r
    function r() {}

    // Método para crear gráficos responsivos
    r.prototype.respChart = function(r, o, a, e) {
            // Configuración global de los gráficos
            Chart.defaults.global.defaultFontColor = "#6c7897";
            Chart.defaults.scale.gridLines.color = "rgba(108, 120, 151, 0.1)";

            // Obtener el contexto del gráfico
            var t = r.get(0).getContext("2d"),
                n = $(r).parent();

            // Función para ajustar el tamaño del gráfico
            function i() {
                r.attr("width", $(n).width());
                switch (o) {
                    case "Line":
                        new Chart(t, {
                            type: "line",
                            data: a,
                            options: e
                        });
                        break;
                    case "Doughnut":
                        new Chart(t, {
                            type: "doughnut",
                            data: a,
                            options: e
                        });
                        break;
                    case "Pie":
                        new Chart(t, {
                            type: "pie",
                            data: a,
                            options: e
                        });
                        break;
                    case "Bar":
                        new Chart(t, {
                            type: "bar",
                            data: a,
                            options: e
                        });
                        break;
                    case "Radar":
                        new Chart(t, {
                            type: "radar",
                            data: a,
                            options: e
                        });
                        break;
                    case "PolarArea":
                        new Chart(t, {
                            data: a,
                            type: "polarArea",
                            options: e
                        })
                }
            }
            // Manejar el redimensionamiento de la ventana
            $(window).resize(i);
            i();
        },

        // Método de inicialización
        r.prototype.init = function() {
            // Inicializar gráfico de líneas
            this.respChart($("#lineChart"), "Line", {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre"],
                datasets: [{
                        label: "Analisis de ventas",
                        fill: !1,
                        lineTension: .1,
                        backgroundColor: "#039cfd",
                        borderColor: "#10c469",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "#039cfd",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#039cfd",
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [65, 59, 80, 81, 56, 55, 40, 60, 70]
                    },
                    {
                        label: "Analisis de compras",
                        fill: !1,
                        lineTension: .1,
                        backgroundColor: "#0388fd",
                        borderColor: "#0388fd",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "#0388fd",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#0388fd",
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [55, 49, 70, 71, 46, 45, 40, 55, 70]
                    }
                ]
            }, {
                scales: {
                    yAxes: [{
                        ticks: {
                            max: 100,
                            min: 20,
                            stepSize: 10
                        }
                    }]
                }
            });

            // Inicializar gráfico de líneas v2
            this.respChart($("#lineChart2"), "Line", {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre"],
                datasets: [{
                        label: "Cuentas nuevas y sesiones",
                        fill: !1,
                        lineTension: .1,
                        backgroundColor: "#039cfd",
                        borderColor: "#10c469",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "#039cfd",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#039cfd",
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [30, 40, 45, 50, 56, 55, 40, 50, 60]
                    },
                    {
                        label: "interacciones en Salud Financiera",
                        fill: !1,
                        lineTension: .1,
                        backgroundColor: "#0388fd",
                        borderColor: "#0388fd",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "#0388fd",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#0388fd",
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [25, 38, 43, 55, 46, 45, 45, 48, 65]
                    }
                ]
            }, {
                scales: {
                    yAxes: [{
                        ticks: {
                            max: 100,
                            min: 20,
                            stepSize: 10
                        }
                    }]
                }
            });

            // Inicializar gráfico de líneas v2 vistas por horas
            this.respChart($("#lineChartHours"), "Line", {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9"],
                datasets: [{
                        label: "Vistas",
                        fill: !1,
                        lineTension: .1,
                        backgroundColor: "#039cfd",
                        borderColor: "#10c469",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "#039cfd",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#039cfd",
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [30, 40, 45, 50, 56, 55, 40, 50, 60]
                    },
                    {
                        label: "Minutos",
                        fill: !1,
                        lineTension: .1,
                        backgroundColor: "#f1b53d",
                        borderColor: "#f1b53d",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "#f1b53d",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#f1b53d",
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [25, 38, 43, 55, 46, 45, 45, 48, 65]
                    }
                ]
            }, {
                scales: {
                    yAxes: [{
                        ticks: {
                            max: 100,
                            min: 20,
                            stepSize: 10
                        }
                    }]
                }
            });

            //lineChartDaysWeek
            this.respChart($("#lineChartDaysWeek"), "Line", {
                labels: ["Lun", "Mar", "Mie", "4", "5", "6", "7", "8", "9"],
                datasets: [{
                        label: "Vistas",
                        fill: !1,
                        lineTension: .1,
                        backgroundColor: "#039cfd",
                        borderColor: "#10c469",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "#039cfd",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#039cfd",
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [30, 40, 45, 50, 56, 55, 40, 50, 60]
                    },
                    {
                        label: "Minutos",
                        fill: !1,
                        lineTension: .1,
                        backgroundColor: "#f1b53d",
                        borderColor: "#f1b53d",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "#f1b53d",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#f1b53d",
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [25, 38, 43, 55, 46, 45, 45, 48, 65]
                    }
                ]
            }, {
                scales: {
                    yAxes: [{
                        ticks: {
                            max: 100,
                            min: 20,
                            stepSize: 10
                        }
                    }]
                }
            });
            
            // Inicializar gráfico de rosquilla
            this.respChart($("#doughnut"), "Doughnut", {
                labels: ["Lunes", "Martes", "Miercoles"],
                datasets: [{
                    data: [300, 50, 100],
                    backgroundColor: ["#0388FD", "#10c469", "#f1b53d"],
                    hoverBackgroundColor: ["#0388FD", "#10c469", "#f1b53d"],
                    hoverBorderColor: "#fff"
                }]
            });

            // Inicializar gráfico de pastel
            this.respChart($("#pie"), "Pie", {
                labels: ["Desktops", "Tablets", "Mobiles"],
                datasets: [{
                    data: [300, 50, 100],
                    backgroundColor: ["#ff8acc", "#5b69bc", "#f1b53d"],
                    hoverBackgroundColor: ["#ff8acc", "#5b69bc", "#f1b53d"],
                    hoverBorderColor: "#fff"
                }]
            });

            // Inicializar gráfico de barras
            this.respChart($("#bar"), "Bar", {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
                datasets: [{
                        label: "Analisis de Ventas",
                        backgroundColor: "RGBA(3,149,253,0.3)",
                        borderColor: "#0388FD",
                        borderWidth: 1,
                        hoverBackgroundColor: "RGBA(3,149,253,0.6)",
                        hoverBorderColor: "#0388FD",
                        data: [65, 59, 80, 81, 56, 55, 40, 20]
                    },
                    {
                        label: "Analisis de Compras",
                        backgroundColor: "rgb(238 179 60 / 46%)",
                        borderColor: "#f1b53d",
                        borderWidth: 1,
                        hoverBackgroundColor: "rgb(238 179 60 / 46%)",
                        hoverBorderColor: "#f1b53d",
                        data: [55, 49, 70, 71, 46, 45, 30, 10]
                    }
                ]
            });

            // Inicializar gráfico de radar
            this.respChart($("#radar"), "Radar", {
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                datasets: [{
                    label: "Desktops",
                    backgroundColor: "rgba(179,181,198,0.2)",
                    borderColor: "rgba(179,181,198,1)",
                    pointBackgroundColor: "rgba(179,181,198,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(179,181,198,1)",
                    data: [65, 59, 90, 81, 56, 55, 40]
                }, {
                    label: "Tablets",
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    pointBackgroundColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(255,99,132,1)",
                    data: [28, 48, 40, 19, 96, 27, 100]
                }]
            }, {
                scale: {
                    angleLines: {
                        color: "rgba(108, 120, 151, 0.1)"
                    }
                }
            });

            // Inicializar gráfico de área polar
            this.respChart($("#polarArea"), "PolarArea", {
                datasets: [{
                    data: [11, 16, 7, 3, 14],
                    backgroundColor: ["#ff8acc", "#5b69bc", "#f1b53d", "#E7E9ED", "#10c469"],
                    label: "My dataset",
                    hoverBorderColor: "#fff"
                }],
                labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"]
            })
        },

        // Inicializar la clase r
        $.ChartJs = new r, $.ChartJs.Constructor = r
}(window.jQuery), window.jQuery.ChartJs.init();