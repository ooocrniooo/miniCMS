<!-- Modal Model-->
<div class="modal fade" id="addCity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: lightgrey">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add new City</h4>
            </div>


            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body text-center">
                {{--<h4 class="modal-title">Add Flights for Arrival</h4>--}}
                <div class="form-group top-m-gutter top-l-gutter">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <label for="add-model-name2" class="form-control">City name:</label>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <input type="text" class="form-control" name="city" id="city" value="" />
                    </div>
                </div>
            </div>

<hr>

            <div class="clearfix"></div>
            <div class="modal-header">
                <div class="append_msg" id="append_msg" style="display: none;"><label>Added</label></div>
                <label class="addFlight btn btn-primary">Add City</label>
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