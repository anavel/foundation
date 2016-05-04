@extends('anavel::layouts.simple')

@section('body-classes')
    sidebar-collapse
@stop

@section('content')
    <div class="box box-default">
        <div class="box-header">
            <h3><i class="fa fa-file"></i>{{ trans('anavel::messages.file_browser_title') }}</h3>
        </div>
        <div class="box-body">
            <div class="row">
                @foreach ($files as $file)
                <div class="col-sm-4 col-md-2 img-preview" data-url="{{ $file['url'] }}" onclick="returnFileUrl(this)">
                    <img src="{{ $file['url'] }}" alt="">
                </div>
                @endforeach
            </div>
        </div>
    </div>
@stop

@section('footer-scripts')
    @parent

    <script>
        // Helper function to get parameters from the query string.
        function getUrlParam( paramName ) {
            var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
            var match = window.location.search.match( reParam );

            return ( match && match.length > 1 ) ? match[1] : null;
        }
        // Simulate user action of selecting a file to be returned to CKEditor.
        function returnFileUrl(element) {
            var funcNum = getUrlParam( 'CKEditorFuncNum' );
            var fileUrl = $(element).data('url');
            window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl );
            window.close();
        }
    </script>
@stop