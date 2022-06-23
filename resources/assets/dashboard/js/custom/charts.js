import Chart from 'chart.js'

const Charts = {

    LIGHT_BLUE: '#1D375A',
    DARK_BLUE: '#293A4A',
    ORANGE: '#E05915',

    /**
     * @link http://www.chartjs.org/docs/latest/charts/doughnut.html
     * @param element
     */
    doughnut(element) {
        new Chart(element.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: eval($(element).data('labels')),
                datasets: [{
                    data: $(element).data('dataset'),
                    backgroundColor: [this.LIGHT_BLUE, this.ORANGE]
                }],
            },
            options: {
                responsive: true,
                animation: false,
                segmentStrokeColor: '#fff',
                segmentStrokeWidth: 2,
                percentageInnerCutout: 80,
            }
        })
    },

    /**
     * @link http://www.chartjs.org/docs/latest/charts/line.html
     * @param element
     */
    line(element) {
        new Chart(element.getContext('2d'), {
            type: 'line',
            data: {
                labels: $(element).data('dates'),
                datasets: [
                    { label: 'PageViews', data: $(element).data('pages'), borderColor: '#E05915', backgroundColor: 'rgba(225,90,20,0.3)', fill: true, lineTension: 0.1 },
                    { label: 'Visitors', data: $(element).data('visitors'), borderColor: '#1E7FC2', backgroundColor: 'rgba(35,140,215,0.7)', fill: true, lineTension: 0.1 },
                ],
            },
            options: {
                legend: { display: false },
                scales: {
                    yAxes: [{
                        ticks: { beginAtZero: true },
                    }],
                },
            }
        })
    }

};

(function ($) {

    'use strict';

    $(document)
        .on('shown.bs.tab', function () {
            $(document).trigger('redraw.bs.charts')
        })
        .on('redraw.bs.charts', function () {
            $('[data-chart]').each(function () {
                if ($(this).is(':visible')) {
                    let method = $(this).attr('data-chart').toLowerCase()

                    switch (method) {
                        case 'doughnut':
                        case 'line':
                            return Charts[method](this);

                        default:
                            console.warn(`Charts method [${method}] is not supported.`);
                    }
                }
            })
        })
        .trigger('redraw.bs.charts')

})(jQuery);
