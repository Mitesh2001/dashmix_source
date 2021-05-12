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
                <h3 class="block-title">Edit <small>Person</small></h3>
                <a href="{{route('pages.datatables')}}" class="btn btn-primary m-2">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
            <div class="block-content block-content-full">
                <form action="{{route('person.update',$person)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-11">
                            <label class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter email" value="{{$person->email}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mr-3">
                            <label class="form-label">Password</label>
                            <input name="password" type="text" class="form-control" placeholder="Password" value="{{$person->password}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Mobile Number</label>
                            <input name="mobile_number" type="tel" class="form-control" placeholder="Mobile Number" value="{{$person->mobile_number}}">
                        </div>
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender" value="Male"
                                    <?php
                                        if ($person->gender == 'Male') {
                                            echo 'checked';
                                        }
                                    ?>
                                    >Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender" value="Female"
                                    <?php
                                        if ($person->gender == 'Female') {
                                            echo 'checked';
                                        }
                                    ?>
                                    >Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Birth Date</label>
                            <input name="birth_date" type="date" class="form-control" max="{{date('Y-m-d')}}" value="{{$person->birth_date}}">
                        </div>
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Role Id</label>
                            <input name="role_id" type="role_id" class="form-control" placeholder="Roll Id" value="{{$person->role_id}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" rows="1" name="address" placeholder="Address..." >{{$person->address}}</textarea>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" placeholder="City" value="{{$person->city}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Pincode</label>
                            <input type="number" name="pincode" class="form-control" placeholder="xxxxxx" value="{{$person->pincode}}">
                        </div>
                    </div>
                    <div class="form-row col-md-11">
                        <label class="form-label">Picture</label>
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="pictureInput">
                            <label class="custom-file-label" for="pictureInput">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-5 mx-3">Update User</button>
                    <a href="{{route('pages.datatables')}}" class="btn btn-secondary my-5 mx-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
