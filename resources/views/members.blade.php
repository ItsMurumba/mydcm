@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> All Users </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> AU </li>
                <li><a href="../../public/dcm"><i class="fa fa-tachometer"></i></a></li>
            </ol>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit User</h4>
                    </div>
                    <div align="center" class="modal-body">
                        <form method ="post" action="/editmember" class="form-horizontal" >
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('users') ? ' has-error' : '' }}">
                                <label for="users" class="col-md-4 control-label">User Name</label>

                                <div class="col-md-6">

                                    {{ Form::select('users', $users, (isset($data['users'])) ? $data['users'] : null, array('id' => 'users')) }}

                                    @if ($errors->has('users'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('users') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                                <label for="county" class="col-md-4 control-label">County</label>

                                <div class="col-md-6">

                                    {{ Form::select('county', $county, (isset($data['county'])) ? $data['county'] : null) }}

                                    @if ($errors->has('county'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('county') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <label for="role" class="col-md-4 control-label">User Role</label>

                                <div class="col-md-6">

                                    {{ Form::select('role', $role, (isset($data['role'])) ? $data['role'] : null) }}

                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('role') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="conter-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <div class="panel-control pull-right hidden">
                                    <a class="panelButton"><i class="fa fa-refresh"></i></a>
                                    <a class="panelButton"><i class="fa fa-minus"></i></a>
                                    <a class="panelButton"><i class="fa fa-remove"></i></a>
                                </div>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit User</button>

                            <!-- Modal -->
                            <table id="datatable">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>UserName</th>
                                    <th>Email</th>
                                    <th>County</th>
                                    <th>Role</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>UserName</th>
                                    <th>Email</th>
                                    <th>County</th>
                                    <th>Role</th>

                                </tr>
                                </tfoot>
                            </table>
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="alert-link close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'users/serverSide'
            });
        });

//        var editor; // use a global for the submit and return data rendering in the examples
//
//        $(document).ready(function() {
//            editor = new $.fn.DataTable.Editor({
//                ajax: "users/serverSide",
//                table: "#datatable"
////                display: 'envelope',
////                fields: [{
////                    label: "ID:",
////                    name: "id"
////                }, {
////                    label: "UserName:",
////                    name: "username"
////                }, {
////                    label: "Email:",
////                    name: "email"
////                }, {
////                    label: "Role:",
////                    name: "role"
////                }
////                ]
//            });
//
//            // Edit record
//            $('#datatable').on('click', 'a.editor_edit', function (e) {
//                e.preventDefault();
//
//                editor
//                        .title('Edit record')
//                        .buttons({
//                            "label": "Update", "fn": function () {
//                                editor.submit()
//                            }
//                        })
//                        .edit($(this).closest('tr'));
//            });
//
//            // Delete a record
//            $('#datatable').on('click', 'a.editor_remove', function (e) {
//                e.preventDefault();
//
//                editor
//                        .title('Edit record')
//                        .message("Are you sure you wish to delete this row?")
//                        .buttons({
//                            "label": "Delete", "fn": function () {
//                                editor.submit()
//                            }
//                        })
//                        .remove($(this).closest('tr'));
//            });
//
//
//            $('#datatable').DataTable({
//                ajax: "users/serverSide",
//                columns: [
////                    {data: "id"},
////                    {data: "username"},
////                    {data: "email"},
////                    {data: "role"},
//                    {
//                        data: null,
//                        className: "center",
//                        defaultContent: '<a href="" class="editor_edit">Edit</a> / <a href="" class="editor_remove">Delete</a>'
//                    }
//                ]
//            });
//        });
    </script>
@stop