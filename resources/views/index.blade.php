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
    <div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Planning</h1>
          </div>
          <div class="col-sm-6 d-none d-sm-block">


            <ol class="breadcrumb float-sm-right">
                <span> Ajouter&nbsp;</span>
                <button type="button" href="/events/create" class="btn btn-success create" title="Ajout d'une tache" >
                    <i class="fa fa-solide fa-plus" ></i>
                </button>
            </ol>
          </div>
        </div>
      </div>
    </section>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(() => {
        $('.create').click(e => {
            let that = e.currentTarget;
            e.preventDefault();
            $.ajax({
                method: $(that).attr('method'),
                url: $(that).attr('href'),
                data: $(that).serialize()
            })
                .done((data) => {
                    $('#detail').html(data);
                    $('.modal').modal('show');
                })
        });
    });
</script>

@include('menu/script')

</body>
</html>
