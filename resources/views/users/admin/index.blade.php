<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin zone') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
                    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

                    
                    <div class="container">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
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
                                    {data:'btn'}
                                ]
                                
                            });
                        } );
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
