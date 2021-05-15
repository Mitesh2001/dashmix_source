@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">

@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Dynamic Table <small>Employees</small></h3>
                <a href="{{route('employee.create')}}" class="btn btn-outline-primary m-2">
                    <i class="bi bi-plus-lg"></i> Create Employee
                </a>
            </div>
            @foreach ($employees as $employee)
            <div class="modal fade" id="Modal-{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                {{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="shadow rounded p-5">
                                <div class="row my-3">
                                    <div class="form-group col-md-4">
                                        <label class="form-label">First Name</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$employee->first_name}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label">Middle Name</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$employee->middle_name}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label">Last Name</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$employee->last_name}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Office</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$employee->office}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Category</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$employee->category}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Designation</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$employee->designation}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Contact Number</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$employee->contact}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Email</label><br>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$employee->email}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Address</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$employee->address}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Status</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$employee->status}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="{{route('employee.edit',$employee)}}">
                                <button type="button" class="btn btn-primary">Edit Employee</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="block-content block-content-full">
                <table class="table table-responsive table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">User Id</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Office</th>
                            <th scope="col">Category</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Address</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Status</th>
                            <th scope="col">Done By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr class="text-center">
                            <td>{{$employee->user_id}}</td>
                            <td>{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}</td>
                            <td>{{$employee->office}}</td>
                            <td>{{$employee->category}}</td>
                            <td>{{$employee->contact}}</td>
                            <td>{{$employee->address}}</td>
                            <td>
                            @if($employee->logo)
                                <img class="border rounded" src="{{asset('employee_logo/'.$employee->logo)}}" height="60">
                            @else
                                <img class="border rounded" src="https://donatepoints.aircanada.com/img/no_image_available.jpg" height="60">
                            @endif
                            </td>
                            <td>{{$employee->status}}</td>
                            <td>{{$employee->done_by}}</td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-info mx-2" data-toggle="modal" data-target="#Modal-{{$employee->id}}">
                                        <i class="bi bi-aspect-ratio"></i>
                                    </button>
                                    <a href="{{route('employee.edit',$employee)}}" class="btn btn-primary mx-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{route('employee.destroy',$employee)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-2">
                                            <i class="bi bi-archive-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
