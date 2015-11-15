<!-- Modal Model-->
<div class="modal fade" id="addArrival" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: lightgrey">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add flights for arrival Coachtime</h4>
            </div>
            {{--{!! Form::open([--}}
            {{--'url' => 'events/savearrival',--}}
            {{--'flightarrivall-add'--}}
            {{--]) !!}--}}
            <input type="hidden" name="pageoption" value="addarrivalflight">
            <input type="hidden" name="pageid" id="pageid" value="{{$event->id}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body text-center">
                {{--<h4 class="modal-title">Add Flights for Arrival</h4>--}}
                <div class="form-group top-m-gutter top-l-gutter">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <label for="add-model-name2" class="form-control">From Airport </label>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <select class="form-control" name="fromairport" id="fromairport">
                            <option value=""></option>
                            <option value="Split">Split</option>
                            <option value="Zadar">Zadar</option>
                            <option value="Zagreb">Zagreb</option>
                            <option value="Tisno">Tisno</option>
                        </select>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <label for="add-model-name2" class="form-control" style="width: auto"> to {{$event->location}}</label>
                    </div>
                </div>

                <div class="form-group top-xl-gutter">
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        <label for="add-model-name" class="form-control">Flight Date/Time</label>
                    </div>

                    <div id="sandbox-container" class="col-sm-7 col-md-7 col-lg-7" name="flightdate" placeholder="Arrival Date">
                        <div class="input-group date">
                            <input type="text" style="width: 110px;" name="arrstartdate" id="arrstartdate" class="form-control" placeholder="Start Date">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>


                            <select class="form-control" name="hour" id="hour" style="width: 75px;">
                                <option value="" disabled selected>HH</option>
                                </option><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select>
                            <select class="form-control" name="minute" id="minute" style="width: 75px;">
                                <option value="" disabled selected>MM</option>
                                <option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select>
                        </div>
                    </div>
                    </div>
<hr>
                <div class="form-group top-xl-gutter">
                    <table class="table table-responsive table-hover table-bordered arrivals" id="arrivals">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="text-left"><strong>From Airport</strong></th>
                            <th class="text-left"><strong>Date</strong></th>
                            <th class="text-left"><strong>Hour</strong></th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        {{dd($timetableArrival)}}--}}
{{--@if(count($timetableArrival) != 0)--}}
    {{--@foreach($timetableArrival as $arr)--}}
    {{--<tr>--}}
        {{--<td><i class="glyphicon glyphicon-remove text-danger"></i></td>--}}
        {{--<td>{{$arr->from}}</td>--}}
        {{--<td>{{$arr->date}}</td>--}}
        {{--<td>{{$arr->time}}</td>--}}
    {{--</tr>--}}
    {{--@endforeach--}}
    {{--@endif--}}
                        </tbody>
                        {{--<tr>--}}
                            {{--<td>Podstrana</td>--}}
                            {{--<td>15.10.2016</td>--}}
                            {{--<td>12:45</td>--}}
                        {{--</tr>--}}
                    </table>
                    {{--<label for="add-model-name2" class="col-sm-3 col-md-3 col-lg-3 control-label">Arrival Table</label>--}}
                    {{--<div class="col-sm-9 col-md-9 col-lg-9">--}}
                        {{--Select Airport:--}}
                        {{--<select name="show_airport" style="width: auto;">--}}
                            {{--<option value=""></option>--}}
                            {{--<option value="Split">Split</option>--}}
                            {{--<option value="Zadar">Zadar</option>--}}
                            {{--<option value="Zagreb">Zagreb</option>--}}
                            {{--<option value="Tisno">Tisno</option>--}}
                        {{--</select>--}}
                        {{--<br>--}}
                        {{--ovdje tablica svih arrival letova--}}
                    {{--</div>--}}
                </div>

            </div>
            <div class="clearfix"></div>
            <div class="modal-header">
                <div class="append_msg" id="append_msg" style="display: none;"><label>Added</label></div>
                <label class="addFlight btn btn-primary">Add Flight</label>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
            {{--{!! Form::Close() !!}--}}
            <div class="col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                <div class="divider divider_ligher"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    $(document).ready(function(){

    $('.addFlight').on('click', function(e){
        fromway = 'arrival';
        locationtxt = $('.locationtxt').val();
        fromair = $('#fromairport :selected').text();
        startdate = $('input[name=arrstartdate]').val();
        hour = $('#hour :selected').text();
        minutes = $('#minute :selected').text();
        starthour = hour +':'+ minutes;
        pageid = $('#pageid').val();

        if(locationtxt != '') {
            $('#arrivals').append('<tr><td><i class="glyphicon glyphicon-remove text-danger"></i></td><td class="text-left">' + fromair + '</td><td class="text-left">' + startdate + '</td><td class="text-left">' + starthour + '</td></tr>');

            $.ajax({
                url: '/events/save/flights/' + pageid + '/' + fromair + '/' + startdate + '/' + starthour + '/' + fromway + '/' + locationtxt,
                async: false,
                success: function (result) {
                    console.log(result);
                },
                error: function (result) {
                    console.log(result);
                }
            });
        }else{
            alert('Please fill Festival location!')
        }
    });

        $('#fromairport').on('change', function(e){
            fromair = $('#fromairport :selected').text();
            pageid = $('#pageid').val();

            tablehtml = '<thead><tr><th></th><th class="text-left"><strong>From Airport</strong></th><th class="text-left"><strong>Date</strong></th><th class="text-left"><strong>Hour</strong></th></thead>';
            $('#arrivals').html(tablehtml);
            $.ajax({
                url: '/events/getcoachtable/' + pageid + '/' + fromair + '/arrival',
                async: false,
                success: function (result) {
                    $.each(result, function() {
                        $('#arrivals').append('<tr><td><i class="glyphicon glyphicon-remove text-danger"></i></td><td class="text-left">' + this.from + '</td><td class="text-left">' + this.date + '</td><td class="text-left">' + this.time + '</td></tr>');
                        console.log(this.date);
                    })
//                    console.log(result);
                },
                error: function (result) {
                    console.log(result);
                }
            });
        });

    });
</script>