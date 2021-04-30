@include('master')

<link rel="stylesheet" href="{{ asset('css/todoTable.css') }}">
<link rel="stylesheet" href="{{ asset('css/pagination.css') }}">

@yield('body')

<div class="bodyObjectsList">

    <div class="title">
        <h1>Lista de objetos</h1>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, ipsam? Voluptate pariatur, harum obcaecati blanditiis impedit molestias earum. Aspernatur adipisci asperiores vitae atque.</p>

    <div class="searchBar">
        <form action="{{ route('objects.search') }}" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="searchWord"
                placeholder="Buscar por tarea o descripción"
                aria-label="Buscar por tarea o descripción" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary buttonSearch" >Buscar</button>
            </div>
        </div>
        </form>
    </div>

    <div class="content-table">

        @if (!$tareas->isEmpty())
            <div class="display-table">
                <table class="table  table-dark">
                <thead>
                    <tr>
                        <th class="table-head">Tarea</th>
                        <th class="table-head">Descripción</th>
                        <th class="table-head">Estado</th>
                        <th class="table-head"></th>
                    </tr>
                </thead>

            @forelse($tareas as $tarea)
                <tr class="rowData">
                    <th class="table-text">{{$tarea->title}}</th>
                    <th class="table-text">{{$tarea->description}}</th>
                    <th class="table-text" value="{{$tarea->state}}">
                        @if ($tarea->state)
                            Completada
                        @else
                            Pendiente
                        @endif
                    </th>
                    <th>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="{{$tarea->id}}">
                        </div>
                    </th>
                </tr>
            @empty
                <p>No hay tareas disponibles :D</p>
            @endforelse
                <tr>
                    <th colspan="2"></th>
                    <th colspan="2">
                        <button type="button" class="btn btn-primary" id="btnModalEditor"
                            data-toggle="modal" data-target="#editarTareas">Editar</button>
                        <button type="button" class="btn btn-danger" id="btnDeleteTarea">Eliminar</button>
                    </th>
                </tr>
                </table>
            {{ $tareas->links('basicComponets.customPaginator') }}
            </div>
        @endif

        <button type="button" class="btn btn-primary" id="btnModalNew"
                        data-toggle="modal" data-target="#newTarea">Crear Tarea</button>

    </div>

    @include('crud.modalNewTarea')
    @yield('newTareaModal')

    @include('crud.modalEditTareas')
    @yield('editarTareasModal')

    <script src="{{ asset('js/OpenEditTareasModal.js') }}"></script>
    <script src="{{ asset('js/SaveDataTareasModal.js') }}"></script>
    <script src="{{ asset('js/DeleteTarea.js') }}"></script>
    <script src="{{ asset('js/OpenNewTareaModal.js') }}"></script>

</div>
