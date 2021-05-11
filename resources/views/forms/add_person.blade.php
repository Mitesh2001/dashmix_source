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
                <h3 class="block-title">Create <small>Person</small></h3>
                <a href="{{route('pages.datatables')}}" class="btn btn-primary m-2">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
            <div class="block-content block-content-full">
                <form action="">
                    <div class="form-row">
                        <div class="form-group col-md-11">
                            <label class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mr-3">
                            <label class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group col-md-5 mr-3">
                            <label class="form-label">Confirm Password</label>
                            <input name="confirm_password" type="text" class="form-control" placeholder="Confirm password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Mobile Number</label>
                            <input name="mobile_number" type="tel" class="form-control" placeholder="Mobile Number">
                        </div>
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender"/>Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender"/>Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Birth Date</label>
                            <input name="birth_date" type="date" class="form-control" max="{{date('Y-m-d')}}">
                        </div>
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Role Id</label>
                            <input name="number" type="role_id" class="form-control" placeholder="Roll Id">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" rows="1" name="address" placeholder="Address..."></textarea>
                        </div>
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Pincode</label>
                            <input type="number" name="pincode" class="form-control" placeholder="xxxxxx">
                        </div>
                    </div>
                    <div class="form-row col-md-11">
                        <label class="form-label">Picture</label>
                        <div class="custom-file">
                            <input type="file" name="picture" class="custom-file-input" id="pictureInput">
                            <label class="custom-file-label" for="pictureInput">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-5 mx-3">Create User</button>
                    <a href="{{route('pages.datatables')}}" class="btn btn-secondary my-5 mx-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
