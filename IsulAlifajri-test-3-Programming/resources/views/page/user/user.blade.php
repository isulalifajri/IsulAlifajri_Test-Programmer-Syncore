@extends('layout.app')

@section('content')
    <h3 class="my-3">Halaman Users</h3>

    <!-- START DATA -->
    <div class="dropdown my-2">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Select Option
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="{{ route('users.export') }}" onclick="return confirm('Yakin Ingin Export Data?')">Export to Excel</a></li>
        </ul>
    </div>
    <div class="card">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h3>List Data User</h3>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-sortable">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Username</th>
                            <th class="col-md-2">Email</th>
                            <th class="col-md-2">Role</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END DATA -->

@endsection

@push('js')

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(function() {
            $('#myTable').DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url : '{{ route('users.data') }}',
                type: 'GET'
            },
            columns: [
                    {
                        data: null,
                        class: "align-top",
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { data: 'username', name: 'username' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, },
                    ],
                    lengthMenu: [5, 10, 25, 50, 100],
                    pageLength: 5
            });
        });
    </script>
    
@endpush

