@extends('app')

@section('content')
    <script type="text/javascript" src="{{ asset('/js/plugins/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector : "textarea#pagecontent",
            plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
            toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
    </script>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Page</div>

                    <div class="panel-body">

                        {!! Form::open(array('url' => 'pages/save')) !!}

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('title', 'Title') !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::text('title', null, ['class' => 'textpagetitle']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('slug', 'Slug') !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('slug', null, ['class' => 'textpage']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('content', 'Content') !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::textarea('content', null, ['id'=>'pagecontent']); !!}
                            </div>
                        </div>

                        <div class="col-md-12" style="padding-top: 30px;">
                            <div class="col-md-2">
                                {!! Form::label('description', 'Description') !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::textarea('description', null, ['class'=>'textpagedescription']); !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('category', 'Category') !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('category', null, ['class' => 'textpage']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('visible', 'Visible') !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::radio('visible', '0'); !!}
                                {!! Form::radio('visible', '0'); !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('featured', 'Featured') !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::radio('featured', '0'); !!}
                                {!! Form::radio('featured', '0'); !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            {!! Form::submit('Click Me!'); !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection