@extends('app')

@section('content')
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.6&sensor=false"></script>
<script>
$(function() {

    var directionsDisplay,
        directionsService,
        map;

    var directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer();
    var split = new google.maps.LatLng(43.5069502, 16.4423974);
    var mapOptions = {zoom: 7, mapTypeId: google.maps.MapTypeId.ROADMAP, center: split}
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    directionsDisplay.setMap(map);


    function calcRoute() {
        var start = $('#StartDest :selected').attr('ltd') + ',' + $('#StartDest :selected').attr('lng');
        var end = $('#ToDest :selected').attr('ltd') + ',' + $('#ToDest :selected').attr('lng');
        var aid = $('#vehicle').val();

        if($('#HighWay :selected').val() == 'true'){cestarina = false;}else{cestarina = true;}

        console.log('Cestarina:' + cestarina);
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.DirectionsTravelMode.DRIVING, avoidHighways: cestarina
        };
        var directionsService = new google.maps.DirectionsService();
        directionsService.route(request, function (result, status) {

            if (status == google.maps.DirectionsStatus.OK) {
                var route = result.routes[0];

                var udaljenost = route.legs[0].distance.value;
                udaljenost = (udaljenost / 1000);
                udaljenost = udaljenost.toFixed(2)

                var trajanje = route.legs[0].duration.value;
                trajanje = trajanje / 60;
                trajanje = trajanje.toFixed(0);

                var izracun = 0;
                var price = $('#vehicle :selected').attr('price');

                izracun = 2 * (Number(udaljenost) * Number(price));

                if ($('#direction').val() == "2") {
                    izracun = 2 * Number(izracun);
                }
                izracun = izracun.formatMoney(0, ',', '.');
                console.log('Cijena: '+izracun);

                $('#ajaxAusgabe').html('Cijena: '+izracun+' €<br>Udaljenost: '+udaljenost);
                directionsDisplay.setDirections(result);
            }
        });
    }

    $('#StartDest').change(function () {
        calcRoute();
    });

    $('#ToDest').change(function () {
        calcRoute();
    });

    $('#HighWay').change(function () {
        calcRoute();
    });

    $('#vehicle').change(function () {
        calcRoute();
    });

    $('#direction').change(function () {
        calcRoute();
    });

    // FORMATIRANJE CIJENE
    Number.prototype.formatMoney = function (c, d, t) {
        var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    };
    // KRAJ FORMATIRANJA CIJENE

});
</script>


<div class="container">
    <div class="col-md-3">
        From:
        <a href="#">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
        <select class="form-control StartDest" name="StartDest" id="StartDest">
            <option value="choose">choose</option>
        @foreach($startCityList as $lst)
            <option lng="{{$lst->Duzina}}" ltd="{{$lst->Sirina}}" value="{{$lst->ID}}">{{$lst->Grad}}</option>
        @endforeach
        </select>
    </div>

    <div class="col-md-3">
        To:
        <a href="#addCity" data-toggle="modal">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
        <select class="form-control" name="ToDest" id="ToDest">
            <option value="choose">choose</option>
            @foreach($toCityList as $lst)
                <option lng="{{$lst->Duzina}}" ltd="{{$lst->Sirina}}" value="{{$lst->ID}}">{{$lst->Grad}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        Highway:
        <select class="form-control" name="HighWay" id="HighWay" onchange="">
            <option value="false">choose</option>
                <option value="false">No</option>
                <option value="true">Yes</option>
        </select>
    </div>

    <div class="col-md-2">
        Vehicle:
        <a href="#addVehicle" data-toggle="modal">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
        <select class="form-control" name="vehicle" id="vehicle">
            <option value="choose">choose</option>
            @foreach($cars as $lst)
                <option price="{{$lst->Cijena}}" value="{{$lst->ID}}">{{$lst->Auto}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        Direction:
        <select class="form-control" name="direction" id="direction">
            <option value="1">One way</option>
            <option value="2">Both ways</option>
        </select>
    </div>
</div>

    <div class="container top-l-gutter">
        <div id="map" style="width:100%;height:450px">
            <div style="padding-top:115px; padding-left:220px;"><img src="/images/loading.gif" width="48" height="48" /></div>
        </div>
        <div name="ajaxAusgabe" id="ajaxAusgabe" class="ajaxAusgabe"></div>
    </div>

    {{--@include('partial/addstartcity')--}}
    @include('partial/addtocity')
    @include('partial/addvehicle')

@endsection

