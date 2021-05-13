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
                <a href="{{route('person.index')}}" class="btn btn-primary m-2">
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
                            <input name="email" type="email" class="form-control" placeholder="Enter email" value="{{$person->email}}" readonly>
                            <small class="text-danger">
                                @error('email')
                                    <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mr-3">
                            <label class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password" value="{{$person->password}}">
                            <small class="text-danger">
                                @error('password')
                                    <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Mobile Number</label>
                            <input name="mobile_number" type="tel" class="form-control" placeholder="Mobile Number" value="{{$person->mobile_number}}">
                            <small class="text-danger">
                                @error('mobile_number')
                                    <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Gender</label><br>
                            <select class="browser-default custom-select" name="gender">
                                <option value="">Select Gender</option>
                                <option value="Male"
                                <?php
                                    if ($person->gender == "Male") {
                                        echo 'selected';
                                    }
                                ?>
                                >Male</option>
                                <option value="Female"
                                <?php
                                    if ($person->gender == "Female") {
                                        echo 'selected';
                                    }
                                ?>
                                >Female</option>
                            </select>
                            <small class="text-danger">
                                @error('gender')
                                    <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Birth Date</label>
                            <input name="birth_date" type="date" class="form-control" max="{{date('Y-m-d')}}" value="{{$person->birth_date}}">
                                <small class="text-danger">
                                    @error('birth_date')
                                        <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                    @enderror
                                </small>
                        </div>
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Role Id</label>
                            <input name="role_id" type="role_id" class="form-control" placeholder="Roll Id" value="{{$person->role_id}}">
                                <small class="text-danger">
                                    @error('role_id')
                                        <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                    @enderror
                                </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mr-2">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" rows="1" name="address" placeholder="Address..." >{{$person->address}}</textarea>
                                <small class="text-danger">
                                    @error('address')
                                        <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                    @enderror
                                </small>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" placeholder="City" value="{{$person->city}}">
                                <small class="text-danger">
                                    @error('city')
                                        <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                    @enderror
                                </small>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Pincode</label>
                            <input type="number" name="pincode" class="form-control" placeholder="xxxxxx" value="{{$person->pincode}}">
                                <small class="text-danger">
                                    @error('pincode')
                                        <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                    @enderror
                                </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-11">
                            <label class="form-label">Picture</label>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="pictureInput">
                                <label class="custom-file-label" for="pictureInput">Choose file</label>
                                <small class="text-danger">
                                    @error('file')
                                        <span class="text-red-500 text-xs"><i class="fa fa-bug"></i> {{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-5 mx-3">Update User</button>
                    <a href="{{route('person.index')}}" class="btn btn-secondary my-5 mx-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
