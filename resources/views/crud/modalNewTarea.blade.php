@section('newTareaModal')

<div class="modal principal" tabindex="-1" role="dialog" id="newTarea" aria-labelledby="Editar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content color-body">

            <form method="POST" action="{{ route('objects.new') }}">
                @csrf

            <div class="modal-header">
                <h5 class="modal-title">Crear nueva tarea</h5>
            </div>
            <div class="modal-body-new">

                <div class="newContent">
                    <div class="createNewTarea-fill">
                        <div class="md-form-new">
                            <label for="newTareaTitle">Tarea</label>
                            <input type="text" id="newTareaTitle" name="newTareaTitle" class="form-control" value="">
                        </div>

                        <div class="md-form-new">
                            <label for="formDes">Descripción</label>
                            <textarea id="newTareaDesc" name="newTareaDesc" class="md-textarea form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div>
                    <button type="submit" class="btn btn-primary" id="createNewTarea">Guardar</button>
                    <button type="button" class="btn btn-secondary"
                        id="closeModalNew" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>


@endsection
