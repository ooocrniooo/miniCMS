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
    {{--{{ HTML::style('css/basic.css')}}--}}
    <link href="/css/basic.css" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('/js/dropzone.js') }}"></script>


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Page</div>

                    <div class="panel-body">

                        {!! Form::open(array('url' => 'pages/save/')) !!}
                        <input type="hidden" name="pageoption" value="edit">
                        <input type="hidden" name="pageid" value="{{$page->id}}">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('title', 'Title') !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::text('title', $page->title, ['class' => 'textpagetitle']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('slug', 'Slug') !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('slug', $page->slug, ['class' => 'textpage']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('content', 'Content') !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::textarea('content', $page->content, ['id'=>'pagecontent']); !!}
                            </div>
                        </div>

                        <div class="col-md-12" style="padding-top: 30px;">
                            <div class="col-md-2">
                                {!! Form::label('description', 'Description') !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::textarea('description', $page->description, ['class'=>'textpagedescription']); !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('category', 'Category') !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('category', $page->category, ['class' => 'textpage']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('keywords', 'Keywords') !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('keywords', $page->keywords, ['class' => 'textpage']) !!}
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

                        <div class="col-md-12 top-l-gutter">
                            <label>Featured Picture</label>
                            @if($page->image != '')
                            <img class="img-responsive" style="max-height: 150px" src="/images/featured/{{ $page->image }}">
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

    <div class="container">

        <form action="/pages/file-upload" class="dropzone" id="my-awesome-dropzone">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>

        {{--<form action="/pages/file-upload" class="dropzone">--}}
        {{--<div class="fallback">--}}
            {{--<input name="file" type="file" multiple />--}}
        {{--</div>--}}
        {{--</form>--}}

    </div>

@endsection