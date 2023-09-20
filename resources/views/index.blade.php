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
                <button type="button" href="/events/create" class="btn btn-success create"  title="Ajout d'une tache" >
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
<div class="modal fade" tabindex="-1" id="test" data-bs-toggle="modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div id="detail" class="modal-content">
        </div>
    </div>
</div>


<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Détails de l'événement</h5>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                 <button id="deleteEventButton" type="button" class="btn btn-danger" data-bs-dismiss="modal">supprimer</button>
                <button type="button" class="btn btn-secondary closemodal" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
    let isAddModalOpen = false;

    $(() => {
        // Désactivez le gestionnaire d'événements FullCalendar lorsque la modale d'ajout est ouverte
        $('#detail').on('show.bs.modal', function () {
            isAddModalOpen = true;
        });

        // Réactivez le gestionnaire d'événements FullCalendar lorsque la modale d'ajout est fermée
        $('#detail').on('hidden.bs.modal', function () {
            isAddModalOpen = false;
        });

        // Gestionnaire d'événement pour le clic sur le bouton d'ajout
        $('.create').click(e => {
            if (isAddModalOpen) {
                e.stopPropagation(); // Empêche la propagation de l'événement click
            } else {
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
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');
        
        const calendar = new FullCalendar.Calendar(calendarEl, {
            
            events: '/events', // L'URL pour récupérer les événements depuis Laravel
            eventClick: function (info) {
                if (!isAddModalOpen) { // Vérifie si la modale d'ajout n'est pas ouverte
                    const event = info.event;


                    const modal = new bootstrap.Modal(document.getElementById('eventModal'));
                    const modalBody = document.querySelector('#eventModal .modal-body');

                    modalBody.innerHTML = `
                        <h5>${event.title}</h5>
                        <p>Date de début : ${event.start.toLocaleString()}</p>
                        <p>Date de fin : ${event.end.toLocaleString()}</p>
                        <p>Statut : ${event.extendedProps.statut}</p>
                    `;

                    modal.show();
    // JavaScript pour gérer la suppression d'un événement
    $('#deleteEventButton').click(function () {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet événement ?")) {
            const eventId = event.id;
            $.ajax({       
            method: 'DELETE',
            url: '/events/destroy/' + eventId,
            data: {
                 _token: '{{ csrf_token() }}'
            },
            success: function (data) {
               
            },
            error: function (xhr, status, error) {
                // Gérez les erreurs de suppression ici
            }
        });
    }
});
                }
            },
        });

        calendar.render();

    
    });


</script>




@include('menu/script')

</body>
</html>
