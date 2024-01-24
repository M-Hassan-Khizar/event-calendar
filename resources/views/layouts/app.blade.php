<head>
    <style>
        .notifyjs-corner {
            position: fixed;
            margin: 5px;
            z-index: 999999 !important;
        }
    </style>
    @yield('head')
</head>
<body>
    @yield('content')
    <script>
        var source = new EventSource("{{ URL('/sse-updates') }}");
        source.onmessage = function(event) {
            let ac = JSON.parse(event.data);
            $.notify(ac.message, 'success');
        }
    </script>
    @yield('script')
