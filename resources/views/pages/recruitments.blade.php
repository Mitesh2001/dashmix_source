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
                <h3 class="block-title">Dynamic Table <small>Recruitments</small></h3>
                <a href="{{route('recruitment.create')}}" class="btn btn-outline-primary m-2">
                    <i class="bi bi-plus-lg"></i> Create Recruitments
                </a>
            </div>
            @foreach ($recruitments as $recruitment)
            <div class="modal fade" id="Modal-{{$recruitment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                {{$recruitment->title}}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="shadow rounded p-5">
                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Headline</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$recruitment->headline}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-8">
                                        <label class="form-label">Title</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$recruitment->title}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Category</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$recruitment->category}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Description</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$recruitment->description}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Skills</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$recruitment->skills}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Education Qualification</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$recruitment->education_quailification}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Reported datetime</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$recruitment->reported_datetime}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Reference Url</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$recruitment->reference_url}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <div class="border border-primary px-3 py-2 rounded text-box-height">
                                            {{$recruitment->status}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="{{route('recruitment.edit',$recruitment)}}">
                                <button type="button" class="btn btn-primary">Edit Recruitment</button>
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
                            <th scope="col">Title</th>
                            <th scope="col">Skills</th>
                            <th scope="col">Thumbnail</>
                            <th scope="col">Reference Url</th>
                            <th scope="col">Reported Date-Time</th>
                            <th scope="col">Status</th>
                            <th scope="col">Done By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recruitments as $recruitment)
                        <tr class="text-center">
                            <td>{{$recruitment->title}}</td>
                            <td>{{$recruitment->skills}}</td>
                            <td>
                            @if($recruitment->thumbnail)
                                <img class="border rounded" src="{{asset('thumbnail/'.$recruitment->thumbnail)}}" height="60">
                            @else
                                <img class="border rounded" src="https://donatepoints.aircanada.com/img/no_image_available.jpg" height="60">
                            @endif
                            </td>
                            <td>{{$recruitment->reference_url}}</td>
                            <td>{{$recruitment->reported_datetime}}</td>
                            <td>{{$recruitment->status}}</td>
                            <td>{{$recruitment->done_by}}</td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-info mx-2" data-toggle="modal" data-target="#Modal-{{$recruitment->id}}">
                                        <i class="bi bi-aspect-ratio"></i>
                                    </button>
                                    <a href="{{route('recruitment.edit',$recruitment)}}" class="btn btn-primary mx-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{route('recruitment.destroy',$recruitment)}}" method="post">
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
