@extends('admin.layout.main')
@section('title','Admin Profile')

@section('main')
            <div class="row profile-body">
                {{--            <!-- left wrapper start -->--}}
                <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">

                                <div>
                                    <img class="wd-70 rounded-circle" src="{{ (!empty($adminData->photo))? url('upload/adminImages/'.$adminData->photo):url('upload/no_image.jpg') }}"  alt="profile">
                                    <span class="h4 ms-3">{{ $adminData->name }}</span>
                                </div>

                            </div>

                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                                <p class="text-muted">{{ $adminData->name }}</p>
                            </div>
                            <hr>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">User Name:</label>
                                <p class="text-muted">{{ $adminData->username }}</p>
                            </div>
                            <hr>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">email:</label>
                                <p class="text-muted">{{ $adminData->email }}</p>
                            </div>
                            <hr>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">phone:</label>
                                <p class="text-muted">
                                    @if(empty($adminData->phone))
                                        -
                                    @else
                                        {{ $adminData->phone }}
                                    @endif
                                </p>
                            </div>
                            <hr>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                                <p class="text-muted">
                                    @if(empty($adminData->address))
                                        -
                                    @else
                                        {{ $adminData->address }}
                                    @endif
                                </p>
                            </div>
                            <hr>

                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                                @if(empty($adminData->created_at))
                                    <p class="text-muted"> - </p>
                                @else
                                    <p class="text-muted">{{$adminData->created_at->thaidate()}}</p>
                                    <p class="text-muted">{{$adminData->created_at->thaidate('H:i:s น.')}}</p>
                                @endif
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Updated:</label>
                                @if(empty($adminData->updated_at))
                                    <p class="text-muted"> - </p>
                                @else
                                    <p class="text-muted">{{$adminData->updated_at->thaidate()}}</p>
                                    <p class="text-muted">{{$adminData->updated_at->thaidate('H:i:s น.')}}</p>
                                @endif
                            </div>


                        </div>
                    </div>
                </div>
                {{--            <!-- left wrapper end -->--}}
                {{--            <!-- middle wrapper start -->--}}
                <div class="col-md-8 col-xl-8 middle-wrapper">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title">Update User Profile</h6>
                                <hr>
                                <br>
                                <br>

{{--                                <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">--}}
                                    <form class="forms-sample" method="POST" action="{{route('store/profile')}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control"
                                                   id="name"
                                                   name="name"
                                                   value="{{$adminData->name}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control"
                                                   id="username"
                                                   name="username"
                                                   value="{{$adminData->username}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email"
                                                   class="form-control"
                                                   id="email"
                                                   name="email"
                                                   value="{{$adminData->email}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control"
                                                   id="phone"
                                                   name="phone"
                                                   value="{{$adminData->phone}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control"
                                                   id="address"
                                                   name="address"
                                                   value="{{$adminData->address}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="image">Photo</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" name="photo" id="image">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="image"></label>
                                        <div class="col-sm-10">
                                            <img id="showImage" class="wd-100 rounded-circle" src="{{ (!empty($adminData->photo))? url('upload/adminImages/'.$adminData->photo):url('upload/no_image.jpg') }}"  alt="profile">
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary me-2">Update Profile</button>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
                {{--            <!-- middle wrapper end -->--}}

            </div>

            @endsection
        @push('scripts')
            <script src="{{asset('jquery-3.7.0.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });

            @if(Session::has('profileupdated'))
            $(document).ready( function () {
                showSwal('profileupdated');
            });
            @endif

        </script>
        @endpush




