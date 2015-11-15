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
                    <div class="panel-heading">Add Event</div>

                    <div class="panel-body">

                        {!! Form::open([
                        'url' => 'events/save',
                        'role' => 'form',
                        'files' =>true,
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                        'style'=>'overflow: auto'
                        ]) !!}
                        <input type="hidden" name="pageoption" value="add">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('title', 'Title',['class' => 'form-control', 'title' => 'Titel of Page/Site']) !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::text('title', null, ['class' => 'textpagetitle', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-4">
                                {!! Form::label('festival', 'Event name',['class' => 'form-control', 'title' => 'Event Name']) !!}
                            </div>
                            <div class="col-md-8">
                                {!! Form::text('festival', null, ['class' => 'textpage form-control', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-4">
                                {!! Form::label('location', 'Location',['class' => 'form-control', 'title' => 'Event Location']) !!}
                            </div>
                            <div class="col-md-8">
                                {!! Form::text('locationtxt', null, ['class' => 'textpage form-control', 'id' => 'locationtxt', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class='col-sm-12'>
                            <div class="col-md-2">
                                <label class="form-control" title="Start/End Date of Event">Event Date</label>
                            </div>
                            <div class="col-md-10">
                                <table>
                                    <tr class="m-gutter">
                                        <td class="date-gutter">
                                            <label style="font-size: smaller">Start Date</label>
                                        </td>
                                        <td class="date-gutter">
                                            <label style="font-size: smaller">End Date</label>
                                        </td>
                                        {{--<td class="date-gutter">--}}
                                            {{--<label style="font-weight: normal">Flights</label>--}}
                                        {{--</td>--}}
                                    </tr>
                                    <tr>
                                        <td class="date-gutter">
                                            <div id="sandbox-container">
                                                <div class="input-group date">
                                                        <input type="text" name="startdate" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                    </div>
                                                </div>
                                            {{--<input name="startdate" class="fieldset__input datepicker picker__input textpage required" type="text" placeholder="Start Date" readonly="">--}}
                                        </td>
                                        <td class="date-gutter">
                                            <div id="sandbox-container">
                                                <div class="input-group date">
                                                    <input type="text" name="enddate" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                </div>
                                            </div>
                                            {{--<input name="enddate" class="fieldset__input datepicker picker__input textpage" type="text" placeholder="End Date" readonly="" >--}}
                                        </td>
                                        <td class="date-gutter" style=" text-align: center; vertical-align: baseline;">
                                            {{--<a href="#addArrival" class="btn-primary btn-link" data-toggle="modal" >--}}
{{--                                                @include('partial/flightarrival')--}}
                                                {{--<i style="font-size: xx-large;" class="glyphicon glyphicon-list"></i>--}}
                                            {{--</a>--}}
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <div class="col-md-12 top-l-gutter">
                            <div class="col-md-2">
                                {!! Form::label('slug', 'Slug',['class' => 'form-control', 'title' => 'Slug for Seo URLs']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('slug', null, ['class' => 'form-control textpage', 'name' => 'slug', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('content', 'Content',['class' => 'form-control', 'title' => 'Site content']) !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::textarea('content', null, ['class' => 'form-control', 'id'=>'pagecontent']); !!}
                            </div>
                        </div>

                        <div class="col-md-12" style="padding-top: 30px;">
                            <div class="col-md-2">
                                {!! Form::label('description', 'Description',['class' => 'form-control', 'title' => 'Site description for SEO and shortlink']) !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::textarea('description', null, ['class'=>'form-control textpagedescription']); !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('keywords', 'Keywords',['class' => 'form-control', 'title' => 'Keywords for SEO of Page/Site']) !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::text('keywords', null, ['class' => 'form-control textpagetitle']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('category', 'Category',['class' => 'form-control', 'title' => 'Category (default: Festivals)']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('category', 'Festival', ['class' => 'form-control textpage']) !!}
                            </div>
                        </div>

                        <div class="col-md-12 top-m-gutter">
                            <div class="col-md-2">
                                {!! Form::label('', 'Visible',['class' => 'form-control', 'title' => 'Set festival visible on website']) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="form-control">Yes
                                {!! Form::radio('visible', 1, false, ['class' => 'form-inline']) !!}
                                </label>
                                <label class="form-control">No
                                {!! Form::radio('visible', 0, true, ['class' => 'form-inline']) !!}
                                </label>
                            </div>
                        </div>
                        <hr>

                        <div class="col-md-12 top-l-gutter">
                            <div class="col-md-2">
                                {!! Form::label('', 'Featured',['class' => 'form-control', 'title' => 'Set fetival as featured']) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="form-control">Yes
                                {!! Form::radio('featured', '1', false, ['class' => 'form-inline']) !!}</label>
                                <label class="form-control">No
                                {!! Form::radio('featured', '0', true, ['class' => 'form-inline']) !!}</label>
                            </div>
                        </div>
<hr>
                        <div class="col-md-12 l-gutter">
                            <label class="form-control">Featured Picture</label>
                            {!! Form::file('image') !!}
                            <p class="errors">{!!$errors->first('image')!!}</p>
                            @if(Session::has('error'))
                                <p class="errors">{!! Session::get('error') !!}</p>
                            @endif
                        </div>

                        <div class="col-md-12 bottom-l-gutter">
                            {!! Form::submit('Save!', ['class' => 'btnsave pull-right']); !!}
                            {!! Form::close() !!}
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {

            $('#title').on('change', function(e){
                slugtxt = htmlEscape($('#title').val().toLowerCase());
                iftxt =slugtxt.substring(slugtxt.length-1);
                if(iftxt == '-'){
                    slugtxt = slugtxt.substring(0,slugtxt.length-1)
                }

                console.log(slugtxt);
               $('#slug').val(slugtxt);
            });

            $('#festival').on('change', function(e){

                slugtxt = htmlEscape($('#title').val().toLowerCase());
                festtxt = htmlEscape($('#festival').val().toLowerCase());

                    iftxt =slugtxt.substring(slugtxt.length-1);
                    if(iftxt == '-'){slugtxt = slugtxt.substring(0,slugtxt.length-1)}

                    ftxt =festtxt.substring(festtxt.length-1);
                    if(ftxt == '-'){festtxt = festtxt.substring(0,festtxt.length-1)}

                keywordtxt = slugtxt+'-'+festtxt;
               $('#keywords').val(keywordEscape(keywordtxt));

            });

            $('#locationtxt').on('change', function(e){

                slugtxt = htmlEscape($('#title').val().toLowerCase());
                loctxt = htmlEscape($('#locationtxt').val().toLowerCase())
                festtxt = htmlEscape($('#festival').val().toLowerCase());

                iftxt =slugtxt.substring(slugtxt.length-1);
                if(iftxt == '-'){slugtxt = slugtxt.substring(0,slugtxt.length-1)}

                ftxt =festtxt.substring(festtxt.length-1);
                if(ftxt == '-'){festtxt = festtxt.substring(0,festtxt.length-1)}

                ltxt =loctxt.substring(loctxt.length-1);
                if(iftxt == '-'){loctxt = loctxt.substring(0,loctxt.length-1)}

                keywordtxt = slugtxt+'-'+loctxt+'-'+festtxt;
                $('#keywords').val(keywordEscape(keywordtxt));

            });

            $('#sandbox-container .input-group.date').datepicker({
                format: "dd.mm.yyyy",
                calendarWeeks: true,
                autoclose: true
//                defaultViewDate: { year: 1977, month: 04, day: 25 }
            });

            function htmlEscape(str) {
                return String(str)
                        .replace(/&/g, '-')
                        .replace(/%/g, '-')
                        .replace(/$/g, '-')
                        .replace(/!/g, '-')
                        .replace(/\?/g, '-')
                        .replace(/\(/g, '-')
                        .replace(/\)/g, '-')
                        .replace(/\$/g, '-')
                        .replace(/\#/g, '-')
                        .replace(/\\/g, '-')
                        .replace(/\//g, '-')
                        .replace(/=/g, '-')
                        .replace(/-/g, '-')
                        .replace(/"/g, '-')
                        .replace(/'/g, '')
                        .replace(/</g, '-')
                        .replace(/>/g, '-')
                        .replace(/ /g, '-');
            }


            function keywordEscape(str) {
                return String(str)
                        .replace(/-/g, ',')
            }
        });
    </script>
    {{--@include('partial/flightdeparture')--}}
@endsection