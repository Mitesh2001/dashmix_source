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
                <h3 class="block-title">Dynamic Table <small>news</small></h3>
                <a href="{{route('news.create')}}" class="btn btn-outline-primary m-2">
                    <i class="bi bi-person-plus-fill"></i> Create News
                </a>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-responsive table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Headline</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Detail Report</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">News Image</th>
                            <th scope="col">Reported Date-Time</th>
                            <th scope="col">Reference</th>
                            <th scope="col">Status</th>
                            <th scope="col">Done By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newses as $news)
                        <tr class="text-center">
                            <td>{{$news->headline}}</td>
                            <td>{{$news->title}}</td>
                            <td>{{$news->category}}</td>
                            <td>{{$news->detail_report}}</td>
                            <td>
                                @if($news->thumbnail)
                                    <img class="border rounded" src="{{asset('thumbnail/'.$news->thumbnail)}}" height="60">
                                @endif
                            </td>
                            <td>
                                @if($news->news_image)
                                    <img class="border rounded" src="{{asset('news_image/'.$news->news_image)}}" height="60">
                                @else
                                    <img class="border rounded" src="https://image.flaticon.com/icons/png/512/21/21601.png" height="60">
                                @endif
                            </td>
                            <td>{{$news->reported_datetime}}</td>
                            <td>{{$news->status}}</td>
                            <td>{{$news->reference}}</td>
                            <td>{{$news->done_by}}</td>

                            <td>
                                <a href="{{route('news.edit',$news)}}">
                                    <i class="bi bi-pencil btn btn-primary"></i>
                                </a>
                                <form action="{{route('news.destroy',$news)}}" method="post">
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
