@extends('app')

@section('content')
    <script type="text/javascript" src="{{ asset('/js/plugins/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector : "textarea#pagecontent",
            plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
            toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
            relative_urls: false
        });
    </script>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Event</div>

                    <div class="panel-body">

                        {!! Form::open([
                        'url' => 'events/save',
                        'role' => 'form',
                        'files' =>true,
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                        'style'=>'overflow: auto'
                        ]) !!}
                        <input type="hidden" name="pageoption" value="edit">
                        <input type="hidden" name="pageid" value="{{$event->id}}">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('title', 'Title',['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::text('title', $event->title, ['class' => 'textpagetitle', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-4">
                                {!! Form::label('festival', 'Event name',['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-8">
                                {!! Form::text('festival', $event->festival, ['class' => 'textpage form-control', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-4">
                                {!! Form::label('location', 'Location',['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-8">
                                {!! Form::text('locationtxt', $event->location, ['class' => 'textpage form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class='col-sm-12'>
                            <div class="col-md-2">
                                <label class="form-control">Event Date</label>
                            </div>
                            <div class="col-md-10">

                                <table class="table-responsive">
                                    <tr class="m-gutter">
                                        <td class="date-gutter">
                                            <label style="font-size:smaller">Start Date</label>
                                        </td>
                                        <td class="date-gutter">
                                            <label style="font-size:smaller">End Date</label>
                                        </td>
                                        <td class="date-gutter">
                                            <label style="font-size:smaller">Arrival</label>
                                        </td>
                                        <td class="date-gutter">
                                            <label style="font-size:smaller">Departure</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="date-gutter">
                                            <div id="sandbox-container">
                                                <div class="input-group date">
                                                    <input type="text" name="startdate" id="startdate" class="form-control" value="{{$event->startdate}}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="date-gutter">
                                            <div id="sandbox-container">
                                                <div class="input-group date">
                                                    <input type="text" name="enddate" id="enddate" class="form-control" value="{{$event->enddate}}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="date-gutter" style=" text-align: center; vertical-align: baseline;">
                                            <a href="#addArrival" class="btn-primary btn-link" data-toggle="modal" >
                                                <i style="font-size: xx-large;" class="glyphicon glyphicon-arrow-down"></i>
                                            </a>
                                        </td>
                                        <td class="date-gutter" style=" text-align: center; vertical-align: baseline;">
                                            <a href="#addDeparture" class="btn-primary btn-link" data-toggle="modal" >
                                                <i style="font-size: xx-large;" class="glyphicon glyphicon-arrow-up"></i>
                                            </a>
                                        </td>
                                    </tr>

                                </table>


                            </div>
                        </div>

                        <div class="col-md-12 top-l-gutter">
                            <div class="col-md-2">
                                {!! Form::label('slug', 'Slug',['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('slug', $event->slug, ['class' => 'form-control textpage', 'name' => 'slug', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('content', 'Content',['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::textarea('content', $event->content, ['class' => 'form-control', 'id'=>'pagecontent']); !!}
                            </div>
                        </div>

                        <div class="col-md-12" style="padding-top: 30px;">
                            <div class="col-md-2">
                                {!! Form::label('description', 'Description',['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::textarea('description', $event->description, ['class'=>'form-control textpagedescription']); !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('keywords', 'Keywords',['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::text('keywords', $event->keywords, ['class' => 'form-control textpagetitle']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('category', 'Category',['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('category', $event->category, ['class' => 'form-control textpage']) !!}
                            </div>
                        </div>

                        <div class="col-md-12 top-m-gutter">
                            <div class="col-md-2">
                                {!! Form::label('', 'Visible',['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                @if($event->visible == '1')
                                <label class="form-control">Yes
                                    {!! Form::radio('visible', 1, true, ['class' => 'form-inline']) !!}
                                </label>
                                <label class="form-control">No
                                    {!! Form::radio('visible', 0, false, ['class' => 'form-inline']) !!}
                                </label>
                                    @else
                                    <label class="form-control">Yes
                                        {!! Form::radio('visible', 1, false, ['class' => 'form-inline']) !!}
                                    </label>
                                    <label class="form-control">No
                                        {!! Form::radio('visible', 0, true, ['class' => 'form-inline']) !!}
                                    </label>
                                @endif
                            </div>
                        </div>
                        <hr>

                        <div class="col-md-12 top-l-gutter">
                            <div class="col-md-2">
                                {!! Form::label('', 'Featured',['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                @if($event->featured == '1')
                                <label class="form-control">Yes
                                    {!! Form::radio('featured', '1', true, ['class' => 'form-inline']) !!}</label>
                                <label class="form-control">No
                                    {!! Form::radio('featured', '0', false, ['class' => 'form-inline']) !!}</label>
                                    @else
                                    <label class="form-control">Yes
                                        {!! Form::radio('featured', '1', false, ['class' => 'form-inline']) !!}</label>
                                    <label class="form-control">No
                                        {!! Form::radio('featured', '0', true, ['class' => 'form-inline']) !!}</label>

                                @endif
                            </div>
                        </div>
                        <hr>

                        <div class="col-md-12 top-l-gutter">
                            <label class="form-control">Featured Picture</label>
                            @if($event->image != '')
                                <img class="img-responsive" src="/images/featured/{{ $event->image }}">
                            @endif
                        </div>

                        <div class="col-md-12">
                            {!! Form::submit('Save!', ['class' => 'btnsave pull-right']); !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partial/flightdeparture')
    @include('partial/flightarrival')
    <script>
        $( document ).ready(function() {
            $('#sandbox-container .input-group.date').datepicker({
                format: "dd.mm.yyyy",
                calendarWeeks: true,
                autoclose: true,
//                defaultViewDate: { year: 1977, month: 04, day: 25 }
            });
        });
    </script>
@endsection