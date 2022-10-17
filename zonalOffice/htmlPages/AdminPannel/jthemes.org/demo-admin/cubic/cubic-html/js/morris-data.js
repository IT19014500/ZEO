$(function() {

    "use strict";

    // Dashboard 1 Morris-chart

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010',
            Science: 50,
            Maths: 80,
            English: 20
        }, {
            period: '2011',
            Science: 130,
            Maths: 100,
            English: 80
        }, {
            period: '2012',
            Science: 80,
            Maths: 60,
            English: 70
        }, {
            period: '2013',
            Science: 70,
            Maths: 200,
            English: 140
        }, {
            period: '2014',
            Science: 180,
            Maths: 150,
            English: 140
        }, {
            period: '2015',
            Science: 105,
            Maths: 100,
            English: 80
        }, {
            period: '2016',
            Science: 250,
            Maths: 150,
            English: 200
        }],
        xkey: 'period',
        ykeys: ['Science', 'Maths', 'English'],
        labels: ['Science', 'Maths', 'English'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 1,
        hideHover: 'auto',
        lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
        resize: true

    });

    Morris.Area({
        element: 'morris-area-chart2',
        data: [{
            period: '2010',
            SiteA: 0,
            SiteB: 0,

        }, {
            period: '2011',
            SiteA: 130,
            SiteB: 100,

        }, {
            period: '2012',
            SiteA: 80,
            SiteB: 60,

        }, {
            period: '2013',
            SiteA: 70,
            SiteB: 200,

        }, {
            period: '2014',
            SiteA: 180,
            SiteB: 150,

        }, {
            period: '2015',
            SiteA: 105,
            SiteB: 90,

        }, {
            period: '2016',
            SiteA: 250,
            SiteB: 150,

        }],
        xkey: 'period',
        ykeys: ['SiteA', 'SiteB'],
        labels: ['Site A', 'Site B'],
        pointSize: 0,
        fillOpacity: 0.4,
        pointStrokeColors: ['#ffb136', '#00bbd9'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 0,
        smooth: false,
        hideHover: 'auto',
        lineColors: ['#ffb136', '#00bbd9'],
        resize: true

    });


    // LINE CHART
    var line = new Morris.Line({
        element: 'morris-line-chart',
        resize: true,
        data: [{
            y: '2011 Q1',
            item1: 2666
        }, {
            y: '2011 Q2',
            item1: 2778
        }, {
            y: '2011 Q3',
            item1: 4912
        }, {
            y: '2011 Q4',
            item1: 3767
        }, {
            y: '2012 Q1',
            item1: 6810
        }, {
            y: '2012 Q2',
            item1: 5670
        }, {
            y: '2012 Q3',
            item1: 4820
        }, {
            y: '2012 Q4',
            item1: 15073
        }, {
            y: '2013 Q1',
            item1: 10687
        }, {
            y: '2013 Q2',
            item1: 8432
        }],
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Item 1'],
        gridLineColor: '#e0e0e0',
        lineColors: ['#8d9498'],
        lineWidth: 1,
        hideHover: 'auto'
    });
    // Morris donut chart

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12,

        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true,
        colors: ['#2ecc71', '#00bbd9', '#4a23ad']
    });

    // Morris bar chart
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90,
            c: 60
        }, {
            y: '2007',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2008',
            a: 50,
            b: 40,
            c: 30
        }, {
            y: '2009',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2010',
            a: 50,
            b: 40,
            c: 30
        }, {
            y: '2011',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2012',
            a: 100,
            b: 90,
            c: 40
        }],
        xkey: 'y',
        ykeys: ['a', 'b', 'c'],
        labels: ['A', 'B', 'C'],
        barColors: ['#2ecc71', '#0283cc', '#e74a25'],
        hideHover: 'auto',
        gridLineColor: '#e0e0e0',
        resize: true
    });
    // Extra chart
    Morris.Area({
        element: 'extra-area-chart',
        data: [{
                period: '2010',
                Science: 0,
                Maths: 0,
                English: 0
            }, {
                period: '2011',
                Science: 50,
                Maths: 15,
                English: 5
            }, {
                period: '2012',
                Science: 20,
                Maths: 50,
                English: 65
            }, {
                period: '2013',
                Science: 60,
                Maths: 12,
                English: 7
            }, {
                period: '2014',
                Science: 30,
                Maths: 20,
                English: 120
            }, {
                period: '2015',
                Science: 25,
                Maths: 80,
                English: 40
            }, {
                period: '2016',
                Science: 10,
                Maths: 10,
                English: 10
            }


        ],
        lineColors: ['#2ecc71', '#0283cc', '#ffb136'],
        xkey: 'period',
        ykeys: ['Science', 'Maths', 'itouch'],
        labels: ['Site A', 'Site B', 'Site C'],
        pointSize: 0,
        lineWidth: 0,
        resize: true,
        fillOpacity: 0.8,
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        hideHover: 'auto'

    });
});
