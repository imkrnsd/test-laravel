<script>
    $(document).ready(function() {
        @if (session('alert.status'))
            show_alert_dialog(`{{ session('alert.status') }}`, `{{ session('alert.message') }}`);
        @endif

        @if ($errors->any())
            var status = `01`;
            var message = ``;
            @foreach ($errors->all() as $error)
                message += `{{ $error }}<br/>`;
            @endforeach
            message += ``;
            show_alert_dialog(status, message);
        @endif

        @if (request()->get('alert_status'))
            show_alert_dialog("{{ request()->get('alert_status') }}", "{{ request()->get('alert_message') }}");
        @endif

    });

    function show_alert_dialog(status, message) {
        if (!(typeof message === "string" || message instanceof String)) {
            message = message.responseText;
        }

        // message = message.replace(/(\r\n|\n|\r)/g, " ");

        if (status == "00") {
            Swal.fire({
                title: "Berhasil",
                html: message,
                icon: "success",
            });
        } else if (status == "000") {
            Swal.fire({
                title: "Info",
                html: message,
                icon: "info",
            });
        } else {
            Swal.fire({
                title: "Proses Gagal",
                html: message,
                icon: "warning",
            });
        }
    }
</script>
