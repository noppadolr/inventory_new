@extends('admin.layout.main')
@section('title','Manage Supplier')
@section('main')
    <div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            {{--                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>--}}
            {{--                <li class="breadcrumb-item active" aria-current="page"> Manage Supplier</li>--}}
            {{--                <li class="breadcrumb-item active" aria-current="page"> Supplier All</li>--}}
            <a href="{{route('supplier.add')}}" class="btn  btn-inverse-info" >Add Supplier</a>
        </ol>
    </nav>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">
                    {{--                        <a href="{{route('supplier.add')}}" class="btn btn-rounded btn-outline-info" style="float: right">Add Supplier</a>--}}
                    <h6 class="card-title">Supplier All Data</h6>
                    <br><br>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email Address</th>
                                <th>Address</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody style="font-size: 14px">
                            @foreach($suppliers as $key => $item)

                                <tr>
                                    <input type="hidden" class="supdeleteid" value="{{ $item->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->mobile_no }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <a href="{{ route('supplier.edit',$item->id) }}" class="btn btn-inverse-warning" title="Edit Data">
                                            <i class="me-1 icon-md" data-feather="edit"></i>

                                        </a>
{{--                                        <a href="{{ route('supplier.delete',$item->id) }}" class="btn btn-inverse-danger"--}}
{{--                                           title="Delete Data"--}}
{{--                                           id="delete">--}}
{{--                                            <i class="me-1 icon-md" data-feather="trash-2"></i>--}}
{{--                                        </a>{{ route('supplier/delete',$item->id) }}--}}
                                        <a href="javascript:void(0)"
                                           data-url="{{ route('supplier/delete',$item->id) }}" class="btn btn-inverse-danger delete-user"
                                           title="Delete Data"
{{--                                           id="myLink"--}}

                                           >
                                            <i class="me-1 icon-md" data-feather="trash-2"></i>
                                        </a>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @push('scripts')
{{--        <script src="{{asset('jquery-3.7.0.min.js')}}"></script>--}}

        <script type="text/javascript">
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                /*------------------------------------------
                --------------------------------------------
                When click user on Show Button
                --------------------------------------------
                --------------------------------------------*/
                $(document).on('click', '.delete-user', function() {

                    var userURL = $(this).data('url');
                    var trObj = $(this);

                    if (confirm("Are you sure you want to delete this user?") === true) {
                        $.ajax({
                            url: userURL,
                            type: 'DELETE',
                            dataType: 'json',
                            success: function(data) {
                                alert(data.success);
                                trObj.parents("tr").remove();
                                location.reload();
                            }
                        });
                    }

                });

            });

        </script>

        {{--        <script>--}}

{{--            $("a#myLink").click(function (e) {--}}

{{--                e.preventDefault();--}}
{{--                var id = $(this).closest("tr").find('.supdeleteid').val();--}}
{{--                // var token = $('meta[name="csrf-token"]').attr('content');--}}
{{--                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}
{{--                alert(id);--}}
{{--                // $.ajaxSetup({--}}
{{--                //     headers: {--}}
{{--                //         'token': $('meta[name="csrf-token"]').attr('content')--}}
{{--                //     }--}}
{{--                // });--}}

{{--                $.ajax({--}}
{{--                    method:"POST",--}}
{{--                    // header:{--}}
{{--                    //     'X-CSRF-TOKEN': token--}}
{{--                    // },--}}
{{--                    data: {_token: CSRF_TOKEN, message:$(".getinfo").val()},--}}
{{--                    dataType: 'JSON',--}}
{{--                    // url:"/supplier/delete/"+id,--}}
{{--                    url:"/supplier/delete/"+id,--}}

{{--                    --}}{{--data: {--}}
{{--                    --}}{{--    "_token": "{{ csrf_token() }}",--}}
{{--                    --}}{{--    dataType: 'json',--}}

{{--                    --}}{{--},--}}
{{--                    success:function (data){--}}
{{--                        console.log(data);--}}
{{--                    },--}}
{{--                });--}}
{{--            //     const swalWithBootstrapButtons = Swal.mixin({--}}
{{--            //         customClass: {--}}
{{--            //             confirmButton: 'btn btn-success',--}}
{{--            //             cancelButton: 'btn btn-danger me-2'--}}
{{--            //         },--}}
{{--            //         buttonsStyling: false,--}}
{{--            //     })--}}
{{--            //--}}
{{--            //     swalWithBootstrapButtons.fire({--}}
{{--            //         title: 'Are you sure?',--}}
{{--            //         text: "You won't be able to revert this!",--}}
{{--            //         icon: 'warning',--}}
{{--            //         showCancelButton: true,--}}
{{--            //         confirmButtonClass: 'me-2',--}}
{{--            //         confirmButtonText: 'Yes, delete it!',--}}
{{--            //         cancelButtonText: 'No, cancel!',--}}
{{--            //         reverseButtons: false--}}
{{--            //--}}
{{--            //     }).then((result) => {--}}
{{--            //         if (result.value) {--}}
{{--            //--}}
{{--            //--}}
{{--            //             swalWithBootstrapButtons.fire(--}}
{{--            //                 'Deleted!',--}}
{{--            //                 'Your file has been deleted.',--}}
{{--            //                 'success'--}}
{{--            //             )--}}
{{--            //             // location.reload();--}}
{{--            //         } else if (--}}
{{--            //             // Read more about handling dismissals--}}
{{--            //             result.dismiss === Swal.DismissReason.cancel--}}
{{--            //         ) {--}}
{{--            //             swalWithBootstrapButtons.fire(--}}
{{--            //                 'Cancelled',--}}
{{--            //                 'Your imaginary file is safe :)',--}}
{{--            //                 'error'--}}
{{--            //             )--}}
{{--            //         }--}}
{{--            //     })--}}
{{--            //--}}
{{--            //--}}
{{--            });--}}
{{--        </script>--}}

    @endpush

@endsection
