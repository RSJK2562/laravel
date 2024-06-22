<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

@if ($success = Session('success'))
    <script>
        $.notify("{{ $success }}", "success");
    </script>
@endif

@if ($error = Session('error'))
    <script>
        $.notify("{{ $error }}", "error");
    </script>
@endif

@if ($info = Session('info'))
    <script>
        $.notify("{{ $info }}", "info");
    </script>
@endif

