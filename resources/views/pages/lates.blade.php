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
                <h3 class="block-title">Dynamic Table <small>Lates</small></h3>
                <a href="{{route('late.create')}}" class="btn btn-outline-primary m-2">
                    <i class="bi bi-person-plus-fill"></i> Create Late
                </a>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-responsive table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Full Name</th>
                            <th scope="col">Late Date</th>
                            <th scope="col">BirthDate</th>
                            <th scope="col">Gujarati Savant</th>
                            <th scope="col">Address</th>
                            <th scope="col">Shradhhanjali</th>
                            <th scope="col">Subhechhak</th>
                            <th scope="col">Notifications</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Status</th>
                            <th scope="col">Done By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lates as $late)
                        <tr class="text-center">
                            <td>{{$late->first_name.' '.$late->middle_name.' '.$late->last_name}}</>
                            <td>{{$late->birth_date}}</td>
                            <td>{{$late->late_date}}</td>
                            <td>{{$late->gujarati_savant}}</td>
                            <td>{{$late->address}}</td>
                            <td>{{$late->shradhhanjali}}</td>
                            <td>{{$late->subhechhak}}</td>
                            <td>{{$late->notifications}}</td>
                            <td>{{$late->contact}}</td>
                            <td>
                                @if($late->picture)
                                    <img class="border rounded" src="{{ asset('/late_picture/'.$late->picture) }}" height="60">
                                @endif
                            </td>
                            <td>{{$late->status}}</td>
                            <td>{{$late->done_by}}</td>
                            <td>
                                <a href="{{route('late.edit',$late)}}">
                                    <i class="bi bi-pencil btn btn-primary"></i>
                                </a>
                                <form action="{{route('late.destroy',$late)}}" method="post">
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
