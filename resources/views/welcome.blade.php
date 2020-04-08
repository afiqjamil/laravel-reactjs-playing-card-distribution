<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Playing Card Distribution</title>

    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="example"></div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
