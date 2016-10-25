@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> All Users </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> All Members </li>
                <li><a href="../../public/dcm"><i class="fa fa-tachometer"></i></a></li>
            </ol>
        </div>

        <div class="conter-wrapper">
            <div class="row">
                <table class="table table-bordered" id="users-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>County</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                </table>
                @stop

                @push('scripts')
                <script>
                    $(function() {
                        $('#users-table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{!! route('datatables.data') !!}',
                            columns: [
                                { data: 'id', name: 'id' },
                                { data: 'name', name: 'username' },
                                { data: 'email', name: 'email' },
                                { data: 'county_id', name: 'county_id' },
                                { data: 'roles_id', name: 'roles_id' },
                                { data: 'created_at', name: 'created_at' },
                                { data: 'updated_at', name: 'updated_at' }
                            ]
                        });
                    });
                </script>
                @endpush
            </div>
        </div>
    </div>
@endsection
