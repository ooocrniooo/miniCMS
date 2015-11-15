<!-- Modal Model-->
<div class="modal fade" id="addVehicle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label for="add-model-name2" class="form-control">Vehicle name:</label>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="text" class="form-control" name="vehicle" id="vehicle" value="">
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label for="add-model-name2" class="form-control">Seats:</label>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="text" class="form-control" name="vehicle" id="vehicle" value="">
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label for="add-model-name2" class="form-control">Price p. km:</label>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="text" class="form-control" name="vehicle" id="vehicle" value="">
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label for="add-model-name2" class="form-control">Aktive:</label>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="text" class="form-control" name="vehicle" id="vehicle" value="">
                    </div>
                </div>

</div>
<hr>

            <div class="clearfix"></div>
            <div class="modal-header">
                <div class="append_msg" id="append_msg" style="display: none;"><label>Added</label></div>
                <label class="addFlight btn btn-primary">Add Vehicle</label>
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
