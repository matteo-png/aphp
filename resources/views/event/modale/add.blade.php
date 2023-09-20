<!-- Modal -->
<div class="modal fade" id="AddTache" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajout d'un event  </h5>
            </div>
            {!! Form::open(['route' => 'events.store']) !!}
            <div class="modal-body">
                {!! Form::label('title','titre:') !!}     {!! Form::text('title',null,['class'=> 'form-control']) !!}
                
                <br>
                {!! Form::label('start','start:') !!}{!! Form::datetimeLocal('start',null,['class'=> 'form-control']) !!}
                <br>
                {!! Form::label('end','end:') !!}{!! Form::datetimeLocal('end',null,['class'=> 'form-control']) !!}
                <br>

            </div>

            <div class="modal-footer">
                {!! Form::submit('valider',['class'=> 'btn btn-primary']) !!}
                <button type="button" class="btn btn-secondary closemodal" data-bs-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    $(function(){
        $('.closemodal').click(function() {
            $('.modal').modal('hide')
        })
    })
</script>
