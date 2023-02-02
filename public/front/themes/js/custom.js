$(document).ready(function () {
    // Bar Chart
    // Highcharts.chart('barChart1', {
    //     chart: {
    //         type: 'column'
    //     },
    //     title: {
    //         text: 'Monthly Average Rainfall'
    //     },
    //     subtitle: {
    //         text: 'Source: WorldClimate.com'
    //     },
    //     xAxis: {
    //         categories: [
    //             'Jan',
    //             'Feb',
    //             'Mar',
    //             'Apr',
    //             'May',
    //             'Jun',
    //             'Jul',
    //             'Aug',
    //             'Sep',
    //             'Oct',
    //             'Nov',
    //             'Dec'
    //         ],
    //         crosshair: true
    //     },
    //     yAxis: {
    //         min: 0,
    //         title: {
    //             text: 'Rainfall (mm)'
    //         }
    //     },
    //     tooltip: {
    //         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    //         pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
    //             '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
    //         footerFormat: '</table>',
    //         shared: true,
    //         useHTML: true
    //     },
    //     plotOptions: {
    //         column: {
    //             pointPadding: 0.2,
    //             borderWidth: 0
    //         }
    //     },
    //     series: [{
    //         name: 'Tokyo',
    //         data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    //     }]
    // });

    // //  Line Chart
    // Highcharts.chart('lineChart', {

    //     title: {
    //         text: ''
    //     },

    //     subtitle: {
    //         text: ''
    //     },

    //     yAxis: {
    //         title: {
    //             text: ''
    //         }
    //     },

    //     xAxis: {
    //         accessibility: {
    //             rangeDescription: 'Range: 2010 to 2017'
    //         }
    //     },

    //     legend: {
    //         enabled: false
    //     },

    //     plotOptions: {
    //         series: {
    //             label: {
    //                 connectorAllowed: false
    //             },
    //             pointStart: 2010,

    //         }
    //     },

    //     series: [{
    //         name: 'Installation',
    //         data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175],
    //         color: '#f3bc15'
    //     }, {
    //         name: 'Manufacturing',
    //         data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434],
    //         color: '#0266ff'
    //     }],

    //     responsive: {
    //         rules: [{
    //             condition: {
    //                 maxWidth: 500
    //             },
    //             chartOptions: {
    //                 legend: {
    //                     layout: 'horizontal',
    //                     align: 'center',
    //                     verticalAlign: 'bottom'
    //                 }
    //             }
    //         }]
    //     }

    // });

      // date Picker
      $('#inlineDatepicker').datepicker({
        inline: true,
        sideBySide: true,
    });

    // Side Menu
   $('.menu-toggle').click(function (e) {
        $('body').toggleClass("sidemenu-close");
        // e.stopPropagation();
    });
    $('.main-menu').click(function (e) {
        e.stopPropagation();
    });
    $('.overlay').click(function () {
        $('body').removeClass("sidemenu-close");
    });
    $('.nav-item').click(function () {
        if ($(window).width() < 990) {
            $('body').removeClass("sidemenu-close");
        }
    });

    // Side Menu Dropdown
    var Accordion = function (el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;
        // Variables privadas
        var links = this.el.find('.link');
        // Evento
        links.on('click', { el: this.el, multiple: this.multiple }, this.dropdown)
    }
    Accordion.prototype.dropdown = function (e) {
        var $el = e.data.el;
        $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
        };
    }
    var accordion = new Accordion($('#main-menu-navigation'), false);

    // $(document).ready(function() {
    //     $('#masterInfra').DataTable( {
    //         //"scrollX": true
    //     } );
    // } );

   

});

