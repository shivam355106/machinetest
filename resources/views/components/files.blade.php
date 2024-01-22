@section('css')
    @isset($css)
        @foreach ($css as $file)
            <?php $file .= '.css'; ?>
            <link rel="stylesheet" href="{{ asset($file) }}">
        @endforeach
    @endisset
@endsection
@section('js')
    @isset($js)
        @foreach ($js as $file)
            <?php $file .= '.js'; ?>
            <script defer="defer" src="{{ asset($file) }}"></script>
        @endforeach
    @endisset
@endsection
