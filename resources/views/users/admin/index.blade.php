<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin zone') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background: url({{asset('storage/fondologo1.png')}}) fixed">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-message2></x-alert-message2>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
                    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

                    <style>
                        table a{
                            color: black;
                        }
                        table a:last-child{
                            color: red;
                        }
                    </style>
                    <div class="container" style="overflow-x:scroll">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Ciudad</th>
                                    <th>Foto</th>
                                    <th>Tipo</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#example').DataTable({
                                "serverSide":true,
                                "ajax":"{{url('api/users')}}",
                                "columns":[
                                    {data:'id'},
                                    {data:'name'},
                                    {data:'email'},
                                    {data:'ciudad'},
                                    {data:'fot'},
                                    {data:'tipo'},
                                    {data:'btn'},
                                ],
                                "language":{
                                    "info": "_TOTAL_ usuarios",
                                    "search":"Buscar",
                                    "paginate":{
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    },
                                    "lengthMenu": 'Mostrar <select>'+
                                        '<option>10</option>'+
                                        '<option value="25" selected>25</option>'+
                                        '<option value="50">50</option>'+
                                        '<option value="100">100</option>'+
                                        '<option value="200">200</option>'+
                                        '<option value="-1">Todos</option>'+
                                        '</select> usuarios',
                                    "loadingRecords": "Cargando...",
                                    "procesing": "Procesando...",
                                    "emptyTable":"No hay datos",
                                    "infoEmpty":"",
                                    "infoFiltered":"",
                                    "zeroRecords":"No hay coincidencias con esas características"
                                }

                            });
                        } );
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
