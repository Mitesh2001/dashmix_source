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
                <h3 class="block-title">Dynamic Table <small>Candidates</small></h3>
                <a href="{{route('candidate.create')}}" class="btn btn-outline-primary m-2">
                    <i class="bi bi-person-plus-fill"></i> Add Candidate
                </a>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-responsive table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">User Id</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Birth Details</th>
                            <th scope="col">Height-Weight</th>
                            <th scope="col">Education</th>
                            <th scope="col">Occupation</th>
                            <th scope="col">Father Details</th>
                            <th scope="col">Mother Details</th>
                            <th scope="col">Siblings</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Email</th>
                            <th scope="col">Resident Address</th>
                            <th scope="col">Native Address</th>
                            <th scope="col">Maternal Details</th>
                            <th scope="col">Hobbies</th>
                            <th scope="col">Expectation</th>
                            <th scope="col">Remark</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Status</th>
                            <th scope="col">Done By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidates as $candidate)
                        <tr class="text-center">
                            <td>{{$candidate->user_id}}</td>
                            <td>{{$candidate->first_name.' '.$candidate->middle_name.' '.$candidate->last_name}}</td>
                            <td>
                                Date : {{$candidate->birth_date}}<br>
                                Time : {{$candidate->birth_time}}<br>
                                Place : {{$candidate->birth_place}}
                            </td>
                            <td>
                                Height : {{$candidate->height}} <br>
                                Weight : {{$candidate->weight}}
                            </td>
                            <td>{{$candidate->education}}</td>
                            <td>{{$candidate->occupation}}</td>
                            <td>
                                Name :{{$candidate->father_name}}<br>
                                Occupation :{{$candidate->father_occupation}}<br>
                                Contact :{{$candidate->father_contact}}
                            </td>
                            <td>
                                Name :{{$candidate->mother_name}}
                                Occupation :{{$candidate->mother_occupation}}
                            </td>
                            <td>
                                Brothers: {{$candidate->brothers}} <br>
                                Sisters: {{$candidate->sisters}}
                            </td>
                            <td>{{$candidate->contact}}</td>
                            <td>{{$candidate->email}}</td>
                            <td>{{$candidate->resident_address}}</td>
                            <td>{{$candidate->native_address}}</td>
                            <td>
                                Maternal :{{$candidate->maternal}} <br>
                                place : {{$candidate->maternal_place}}
                            </td>
                            <td>{{$candidate->hobbies}}</td>
                            <td>{{$candidate->expectations}}</td>
                            <td>{{$candidate->remark}}</td>
                            <td>
                            @if($candidate->picture)
                                <img class="border rounded" src="{{asset('candidate_picture/'.$candidate->picture)}}" height="60">
                            @else
                                <img class="border rounded" src="https://www.pngkey.com/png/full/22-223848_businessman-vector-person-logo-png.png" height="60">{{$candidate->logo}}
                            @endif
                            </td>
                            <td>{{$candidate->status}}</td>
                            <td>{{$candidate->done_by}}</td>
                            <td>
                                <a href="{{route('candidate.edit',$candidate)}}">
                                    <i class="bi bi-pencil btn btn-primary"></i>
                                </a>
                                <form action="{{route('candidate.destroy',$candidate)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-archive-fill"></i>
                                    </button>
                                </form>
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
