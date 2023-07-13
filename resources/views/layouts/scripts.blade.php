<script>
    var hostUrl = "assets/";
</script>
<script src="{{ asset('metronic/demo2/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('metronic/demo2/assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('metronic/demo2/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('metronic/demo2/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('metronic/demo2/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('metronic/demo2/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('metronic/demo2/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('metronic/demo2/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('metronic/demo2/assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('metronic/demo2/assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
<script src="{{ asset('metronic/demo2/assets/js/custom/utilities/modals/users-search.js') }}"></script>
{{-- input only can numeric --}}
{{-- example : https://github.com/SamWM/jquery-numeric/blob/master/test.html --}}
<script src="{{ asset('js/numeric.js') }}"></script>
<script src="{{ asset('js/theme.js') }}" defer></script>
<script src="{{ asset('js/script.js') }}"></script>
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
</script>
