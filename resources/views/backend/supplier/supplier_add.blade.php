@extends('admin.layout.main')
@section('title','Add Supplier')
@section('main')
    <script src="{{asset('jquery-3.7.0.min.js')}}"></script>
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Manage Supplier</li>
                <li class="breadcrumb-item active" aria-current="page"> Add Supplier</li>
            </ol>
        </nav>

        <div class="row profile-body">


            <!-- middle wrapper start -->
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Supplier</h6>
                            <br>
                            <form id="myForm" class="forms-sample" method="POST" action="{{ route('supplier.store') }}" >
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Supplier Name</label>
                                    <div class="col-sm-9 form-group">
                                        <input type="text"
                                               class="form-control "
                                               id="name"
                                               name="name" >
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="mobile_no" class="col-sm-3 col-form-label">Supplier Phone</label>
                                    <div class="col-sm-9 form-group">
                                        <input  type="text"
                                                class="form-control "
                                                id="mobile_no"
                                                name="mobile_no" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-3 col-form-label">Email Address</label>
                                    <div class="col-sm-9 form-group">
                                        <input  type="email"
                                                class="form-control "
                                                id="email"
                                                name="email" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-sm-3 col-form-label">Supplier Address</label>
                                    <div class="col-sm-9 form-group">
                                        <input  type="text"
                                                class="form-control "
                                                id="address"
                                                name="address" >
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-outline-warning   me-2">Add Supplier</button>

                            </form>

                        </div>
                    </div>



                </div>
            </div>
            <!-- middle wrapper end -->

        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    name: {
                        required : true,
                    },
                    mobile_no: {
                        required : true,
                    },
                    email: {
                        required : true,
                    },
                    address: {
                        required : true,
                    },

                },
                messages :{
                    name: {
                        required : 'Please Enter Supplier Name',
                    },
                    mobile_no: {
                        required : 'Please Enter Supplier Mobile Number',
                    },
                    email: {
                        required : 'Please Enter Supplier Email Address',
                    },
                    address: {
                        required : 'Please Enter Supplier Address',
                    },


                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>


@endsection




