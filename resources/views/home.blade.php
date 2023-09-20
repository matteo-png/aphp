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
            <h1>Bienvenue sur l'application Ap-Hp</h1>
          </div>
        
        </div>
      </div>
    </section>
<section class="content pb-3">
<img src="./../adminlte/img/img-aphp.png" alt="aphp image" width=100% height=100% >
</section>
</div>



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


@include('menu/script')

</body>
</html>
