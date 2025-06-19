{{-- @extends('layouts.app')
@section('content')
<script src="{{asset('default/vendors/jquery/jquery.min.js')}}"></script>
<header class="content__title">
    <h1>Dashboard</h1>
    <small>Welcome Admin</small>

    
</header>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Progress Kehadiran</h4>
                <div class="flot-chart flot-line"></div>
                <div width="100" height="50" class="flot-chart-legends flot-chart-legends--line"></div>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Line Chart with curved edges</h4>
                <h6 class="card-subtitle">Curved edges made possible with the help of curvedLines Flot plugin.</h6>

                <div class="flot-chart flot-curved-line"></div>
                <div class="flot-chart-legends flot-chart-legends--curved"></div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pie Chart</h4>

                <div class="flot-chart flot-pie"></div>
                <div class="flot-chart-legends flot-chart-legend--pie"></div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kehadiran Periode 26 Feb - 25 Mar 2020</h4>

                <canvas id="grafik-day" width="100" height="50"></canvas>
                
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Dynamic Data Chart</h4>

                <div class="flot-chart flot-dynamic"></div>
                <div class="flot-chart-legends flot-chart-legends--dynamic"></div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Donut Chart</h4>

                <div class="flot-chart flot-donut"></div>
                <div class="flot-chart-legends flot-chart-legend--donut"></div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script>
   var ctxday = document.getElementById("grafik-day").getContext("2d");
   var data = {
    labels: ["aldo","dedi","dodi","faisal","febri","iqbal","jami","maul","oji","triya","wisnu"],
    datasets: [
    {
        fill: 'false',
        lineTension: 0.1,
        backgroundColor: ["#03A9F4", "#32C787" ,"#f5c942","#f5c942","#ff6b68","#f5c942","#32C787","#32C787","#32C787","#32C787","#32C787"],
        borderColor: "#03A9F4",
        pointHoverBackgroundColor: "#03A9F4",
        pointHoverBorderColor: "#03A9F4",
        data: [90,100,80,80,75,80,100,100,100,100,100]
    }

    ]
};

var myBarChart = new Chart(ctxday, {
    type: 'horizontalBar',
    data: data,

    options: {

     series: {
        lines: {
            show: true,
            barWidth: 0.05,
            fill: 0
        }
    },
    shadowSize: 0.1,
    grid : {
        borderWidth: 1,
        borderColor: '#edf9fc',
        show : true,
        hoverable : true,
        clickable : true
    },

    yaxis: {
        tickColor: '#edf9fc',
        tickDecimals: 0,
        font :{
            lineHeight: 13,
            style: 'normal',
            color: '#9f9f9f',
        },
        shadowSize: 0,
        label:['asd','asdasd','x']
    },

    xaxis: {
        tickColor: '#fff',
        tickDecimals: 0,
        font :{
            lineHeight: 13,
            style: 'normal',
            color: '#9f9f9f'
        },
        shadowSize: 0,
    },
    legend:{
        container: '.flot-chart-legends--line',
        backgroundOpacity: 0.5,
        noColumns: 0,
        backgroundColor: '#fff',
        lineWidth: 0,
        labelBoxBorderColor: '#fff'
    }         
}
});




var lineChartData = [

{
    label: 'xx',
    data: [[1,60], [2,30], [3,50], [4,100], [5,10], [6,90], [7,85]],
    color: '#32c787'
},
{
    label: 'Blue',
    data: [[1,20], [2,90], [3,60], [4,40], [5,100], [6,25], [7,65]],
    color: '#03A9F4'
},
{
    label: 'Amber',
    data: [[1,100], [2,20], [3,60], [4,90], [5,80], [6,10], [7,5]],
    color: '#f5c942'
}
];


var lineChartOptions = {
    series: {
        lines: {
            show: true,
            barWidth: 0.05,
            fill: 0
        }
    },
    shadowSize: 0.1,
    grid : {
        borderWidth: 1,
        borderColor: '#edf9fc',
        show : true,
        hoverable : true,
        clickable : true
    },

    yaxis: {
        tickColor: '#edf9fc',
        tickDecimals: 0,
        font :{
            lineHeight: 13,
            style: 'normal',
            color: '#9f9f9f',
        },
        shadowSize: 0,

    },

    xaxis: {
        tickColor: '#fff',
        tickDecimals: 0,
        font :{
            lineHeight: 13,
            style: 'normal',
            color: '#9f9f9f'
        },
        shadowSize: 0,
    },
    legend:{
        container: '.flot-chart-legends--line',
        backgroundOpacity: 0.5,
        noColumns: 0,
        backgroundColor: '#fff',
        lineWidth: 0,
        labelBoxBorderColor: '#fff'
    }
};

if ($('.flot-line')[0]) {
    $.plot($('.flot-line'), lineChartData, lineChartOptions);
}

</script>

@endsection --}}