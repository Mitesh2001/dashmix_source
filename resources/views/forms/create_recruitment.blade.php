@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Create <small>Recruitement</small></h3>
                <a href="{{route('recruitment.index')}}" class="btn btn-primary m-2">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
            <div class="block-content block-content-full">
                <form action="{{route('recruitment.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Headline</label>
                            <textarea name="headline" rows="2" class="form-control" placeholder="Headline..."></textarea>
                            <small class="text-danger">
                                @error('headline')
                                    <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label class="form-label">Title</label>
                            <input name="title" type="text" class="form-control" placeholder="Title">
                            <small class="text-danger">
                                @error('title')
                                    <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Category</label>
                            <input name="category" type="text" class="form-control" placeholder="Category">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="3" class="form-control" placeholder="Description..."></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Skills</label>
                            <input name="skills" type="text" class="form-control" placeholder="Skills">
                            <small class="text-danger">
                                @error('skills')
                                    <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Education Qualification</label>
                            <input name="education_quailification" type="text" class="form-control" placeholder="Education Qualification">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Thumbnail</label>
                            <div class="custom-file">
                                <input type="file" name="thumbnail" class="custom-file-input" id="thumbnailInput">
                                <label class="custom-file-label" for="thumbnailInput">Choose Thumbnail</label>
                            </div>
                            <small class="text-danger">
                                @error('thumbnail')
                                    <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">News Image</label>
                            <div class="custom-file">
                                <input type="file" name="news_image" class="custom-file-input" id="imageInput">
                                <label class="custom-file-label" for="imageInput">Choose Image</label>
                            </div>
                            <small class="text-danger">
                                @error('news_image')
                                    <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Reference Url</label>
                            <input name="reference_url" type="text" class="form-control" placeholder="Reference Url">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Status</label>
                            <input name="status" type="text" class="form-control" placeholder="Status">
                        </div>
                        <!-- <div class="form-group col-md-6">
                            <label class="form-label">Reported datetime</label>
                            <input name="reported_datetime" type="datetime-local" class="form-control">
                        </div> -->
                    </div>
                    <button type="submit" class="btn btn-primary my-5 mx-3">Create Recruitement</button>
                    <a href="{{route('recruitment.index')}}" class="btn btn-secondary my-5 mx-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
