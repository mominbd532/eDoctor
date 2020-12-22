!function ($) {
    "use strict";

    var MorrisCharts = function () {
    };
        MorrisCharts.prototype.createBarChart = function (element, data, xkey, ykeys, labels, lineColors) {
            Morris.Bar({
                element: element,
                data: data,
                xkey: xkey,
                ykeys: ykeys,
                labels: labels,
                gridLineColor: '#eef0f2',
                barSizeRatio: 0.4,
                resize: true,
                hideHover: 'auto',
                barColors: lineColors
            });
        },

       
        MorrisCharts.prototype.init = function () {
            $.ajax({
                url:'../doctorpost/appointmentchart',
                dataType:'json',
                success: function(data){
                    
                    var list = [];   
                    for(var i = 0; i <= data.length - 1; i++){
                        list[i] = {y: data[i].month, a: data[i].total};
                    }
                    
                    Morris.Bar({
                                element: 'morris-bar-chart',
                                data: list,
                                xkey: 'y',
                                ykeys: ['a'],
                                labels: ['Total Appointment'],
                                gridLineColor: '#eef0f2',
                                barSizeRatio: 0.4,
                                xLabelAngle: 35,
                                resize: true,
                                hideHover: 'auto',
                                barColors: ['#77D0AA']
                            });
                },
                error:function(data)
                {
                }
            });
            $.ajax({
                url:'../doctorpost/invoicechart',
                dataType:'json',
                success: function(data){
                    
                    var invoice = [];   
                    for(var i = 0; i <= data.length - 1; i++){
                        invoice[i] = {label: data[i].status, value: data[i].total};
                    }
                       
                    Morris.Donut({
                                    element: 'morris-donut-chart',
                                    data: invoice,
                                    resize: true,
                                    colors: ['#77D0AA', '#707070']
                                });
                },
                error:function(data)
                {
                }
            });
        },
        $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

    function ($) {
        "use strict";
        $.MorrisCharts.init();
    }(window.jQuery);