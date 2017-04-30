// To see the resulted rich text you need to put the content inside an element with the class 'fr-view'

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/froala_editor.pkgd.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/froala_style.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/froala_editor.pkgd.min.js') }}"></script>
    <script>
        $(function() {
            $('textarea').froalaEditor()
        });
    </script>
@endsection