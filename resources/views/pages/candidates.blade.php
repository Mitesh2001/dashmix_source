@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
    <style>
        .text-box-height{
            height: 42px;
            cursor:not-allowed;
        }
    </style>
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
                <h3 class="block-title">Dynamic Table <small>Candidates</small></h3>
                <a href="{{route('candidate.create')}}" class="btn btn-outline-primary m-2">
                    <i class="bi bi-plus-lg"></i> Create Candidate
                </a>
            </div>
            @foreach ($candidates as $candidate)
            <div class="modal fade" id="Modal-{{$candidate->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                {{$candidate->first_name.' '.$candidate->middle_name.' '.$candidate->last_name}}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <div class="shadow rounded p-5">
                            <div class="row my-3">
                                <div class="col-md-4">
                                    <label class="form-label">First Name</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->first_name}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Middle Name</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->middle_name}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Last Name</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->last_name}}
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-4">
                                    <label class="form-label">Birth Date</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->birth_date}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Birth Time</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->birth_time}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Birth Place</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->birth_place}}
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label class="form-label">Height</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->height}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Weight</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->weight}}
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label class="form-label">Education</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->education}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Occupation</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->occupation}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label class="form-label">Father Name</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->father_name}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mother Name</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->mother_name}}
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label class="form-label">Father Occupation</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->father_occupation}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mother Occupation</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->mother_occupation}}
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-5">
                                    <label class="form-label">Father Contact</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->father_contact}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Brothers</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->brothers}}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Sisters</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->sisters}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label class="form-label">Email address</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->email}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Contact Number</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->contact}}
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label class="form-label">Resident Address</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->resident_address}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Native Address</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->native_address}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label class="form-label">Maternal</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->maternal}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Maternal place</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->maternal_place}}
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label class="form-label">Hobbies</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->hobbies}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Expectations</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->expectations}}
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label class="form-label">Remark</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->remark}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <div class="border border-primary px-3 py-2 rounded text-box-height">
                                        {{$candidate->education}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="{{route('candidate.edit',$candidate)}}">
                            <button type="button" class="btn btn-primary">Edit candidate</button>
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
                            <th scope="col">Contact</th>
                            <th scope="col">Resident Address</th>
                            <th scope="col">Remark</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Status</th>
                            <th scope="col">Done By</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidates as $candidate)
                        <tr class="text-center">
                            <td>{{$candidate->user_id}}</td>
                            <td>{{$candidate->first_name.' '.$candidate->middle_name.' '.$candidate->last_name}}</td>
                            <td>{{$candidate->contact}}</td>
                            <td>{{$candidate->resident_address}}</td>
                            <td>{{$candidate->remark}}</td>
                            <td>
                            @if($candidate->picture)
                                <img class="border rounded" src="{{asset('candidate_picture/'.$candidate->picture)}}" height="60">
                            @endif
                            </td>
                            <td>{{$candidate->status}}</td>
                            <td>{{$candidate->done_by}}</td>
                            <td>
                                <div class=" d-flex">
                                    <button type="button" class="btn btn-info mx-2" data-toggle="modal" data-target="#Modal-{{$candidate->id}}">
                                        <i class="bi bi-aspect-ratio"></i>
                                    </button>
                                    <a href="{{route('candidate.edit',$candidate)}}" class="btn btn-primary mx-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{route('candidate.destroy',$candidate)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-2">
                                            <i class="fa fa-user-minus"></i>
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
