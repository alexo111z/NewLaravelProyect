@section('editarTareasModal')

{{ csrf_field() }}

<div class="modal principal" tabindex="-1" role="dialog" id="editarTareas" aria-labelledby="Editar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content color-body">
            <div class="modal-header">
                <h5 class="modal-title">Editar tareas</h5>
                {{-- <button class="modalCloseSpan" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">



                <p>There is no data (-v-)</p>



            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-primary" id="saveDataModal">Guardar</button>
                    <button type="button" class="btn btn-secondary"
                        id="closeModal" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
