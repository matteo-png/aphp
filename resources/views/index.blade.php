<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APHP</title>

    @include('menu/link')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('menu/navbar')

    @include('menu/aside')

    <div id="calendar"></div>

    @include('menu/footer')
</div>
<!-- ./wrapper -->
<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div id="detail" class="modal-content">
        </div>
    </div>
</div>


<script>


    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            events: '/events', // L'URL pour récupérer les événements depuis Laravel
    
        });
        
        calendar.render();
    });


</script>

@include('menu/script')

</body>
</html>
