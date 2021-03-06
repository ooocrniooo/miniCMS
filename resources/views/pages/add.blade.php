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
                    <div class="panel-heading">Add Page</div>

                    <div class="panel-body">

                        {!! Form::open([
                        'url' => 'pages/save',
                        'role' => 'form',
                        'files' =>true,
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                        'style'=>'overflow: auto'
                        ]) !!}
                        <input type="hidden" name="pageoption" value="add">
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
                                {!! Form::text('slug', null, ['class' => 'form-control textpage', 'name' => 'slug']) !!}
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
                            {!! Form::textarea('description', null, ['class'=>'form-control textpagedescription']); !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                                {!! Form::label('keywords', 'Keywords') !!}
                            </div>
                            <div class="col-md-10">
                                {!! Form::text('keywords', null, ['class' => 'form-control textpagetitle']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                            {!! Form::label('category', 'Category') !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('category', null, ['class' => 'form-control textpage']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                            {!! Form::label('visible', 'Visible') !!}
                            </div>
                            <div class="col-md-6">
                                Yes
                            {!! Form::radio('visible', '1'); !!}
                                No
                            {!! Form::radio('visible', '0'); !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-2">
                            {!! Form::label('featured', 'Featured') !!}
                            </div>
                            <div class="col-md-6">
                                Yes
                            {!! Form::radio('featured', '1'); !!}
                                No
                            {!! Form::radio('featured', '0'); !!}
                            </div>
                        </div>

                        <div class="col-md-12 l-gutter">
                            <label>Featured Picture</label>
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

                        {{--<div class="col-lg-12 text-center">--}}
                            {{--<form action="pages/upload" class="dropzone" id="upload">--}}
                                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}
                            {{--</form>--}}
                        {{--</div>--}}

                    </div>


                </div>
            </div>
        </div>
    </div>


    {{--<script>--}}
        {{--$(document).ready(function() {--}}

            {{--//Dropzone.js Options - Upload an image via AJAX.--}}
            {{--Dropzone.options.myDropzone = {--}}
                {{--uploadMultiple: false,--}}
                {{--// previewTemplate: '',--}}
                {{--addRemoveLinks: true,--}}
                {{--// maxFiles: 1,--}}
                {{--dictDefaultMessage: '',--}}
                {{--init: function() {--}}
                    {{--this.on("addedfile", function(file) {--}}
                        {{--// console.log('addedfile...');--}}
                    {{--});--}}
                    {{--this.on("thumbnail", function(file, dataUrl) {--}}
                        {{--// console.log('thumbnail...');--}}
                        {{--$('.dz-image-preview').hide();--}}
                        {{--$('.dz-file-preview').hide();--}}
                    {{--});--}}
                    {{--this.on("success", function(file, res) {--}}
                        {{--console.log('upload success...');--}}
                        {{--$('#img-thumb').attr('src', res.path);--}}
                        {{--$('input[name="pic_url"]').val(res.path);--}}
                    {{--});--}}
                {{--}--}}
            {{--};--}}
            {{--var myDropzone = new Dropzone("#my-dropzone");--}}

            {{--$('#upload-submit').on('click', function(e) {--}}
                {{--e.preventDefault();--}}
                {{--//trigger file upload select--}}
                {{--$("#my-dropzone").trigger('click');--}}
            {{--});--}}

        {{--});--}}

        {{--//we want to manually init the dropzone.--}}
        {{--Dropzone.autoDiscover = false;--}}

    {{--</script>--}}
@endsection