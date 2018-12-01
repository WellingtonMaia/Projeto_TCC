 $(document).ready(function () {
     "use strict";
     //ct-visits
    //  new Chartist.Line('#ct-visits', {
    //      labels: ['2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015'],
    //      series: [
    //             [5, 2, 7, 4, 5, 3, 5, 4]
    //             , [2, 5, 2, 6, 2, 5, 2, 4]
    //           ]
    //     }, 
    //     {
    //      top: 0,
    //      low: 1,
    //      showPoint: true,
    //      fullWidth: true,
    //      plugins: [
    //         Chartist.plugins.tooltip()
    // ],
    //      axisY: {
    //          labelInterpolationFnc: function (value) {
    //              return (value / 1) + 'k';
    //          }
    //      },
    //      showArea: true
    //  });
     // counter
     $(".counter").counterUp({
         delay: 100,
         time: 1200
     });

     var sparklineLogin = function () {
         $('#sparklinedash').sparkline([12, 9, 8, 10, 14, 12, 9, 16], {
             type: 'bar',
             height: '30',
             barWidth: '4',
             resize: true,
             barSpacing: '5',
             barColor: '#7ace4c'
         });
         $('#sparklinedash2').sparkline([13, 15, 17, 9, 13, 12, 16, 15], {
             type: 'bar',
             height: '30',
             barWidth: '4',
             resize: true,
             barSpacing: '5',
             barColor: '#7460ee'
         });
         $('#sparklinedash3').sparkline([16, 14, 9, 7, 14, 15, 13, 14], {
             type: 'bar',
             height: '30',
             barWidth: '4',
             resize: true,
             barSpacing: '5',
             barColor: '#11a0f8'
         });
         $('#sparklinedash4').sparkline([7, 9, 16, 8, 14, 15, 12, 10], {
             type: 'bar',
             height: '30',
             barWidth: '4',
             resize: true,
             barSpacing: '5',
             barColor: '#f33155'
         });
     }
     var sparkResize;
     $(window).on("resize", function (e) {
         clearTimeout(sparkResize);
         sparkResize = setTimeout(sparklineLogin, 500);
     });
     sparklineLogin();
 });
