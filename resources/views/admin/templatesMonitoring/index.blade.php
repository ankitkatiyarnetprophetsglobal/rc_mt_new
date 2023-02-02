@extends('front.layouts.layout')
@section('page_specific_css')
    <link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-md-end justify-content-center my-3">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto my-2">
                        <h3>
                            TEMPLATES
                        </h3>
                    </div>
                    @if (Session::get('role_details')->id == 1)
                        <div class="col-auto my-2">
                            <a class="btn btn-outline-success" href="{{ route('temp.manage.create') }}">
                                <i class="fa-solid fa-plus"></i> ADD
                            </a>
                        </div>
                    @endif
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            <strong>Success!</strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    @if (Session::has('error_message'))
                        <div class="alert alert-danger">
                            <strong>Error!</strong> {{ Session::get('error_message') }}
                        </div>
                    @endif
                </div>
                <div class="row justify-content-lg-end justify-content-md-end justify-content-center">
                    <form class="row justify-content-end"  id="filter_form">

                        <div class="col-lg-auto col-md-6 col-6">
                            <select class="form-select temp_select_input" name="select_temp"
                                aria-label="Default select example">
                                <option value="" selected disabled>Select Template</option>
                                @foreach ($templates as $k_t => $v_t)
                                    <option value="{{ encode5t($k_t) }}">{{ $v_t }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if (Session::get('role_details')->id == 1)
                            <div class="col-lg-auto col-md-4 col-4">
                                <select class="form-select rc_select_input" name="select_rc"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Select Regional Center</option>
                                    @foreach ($rc_details as $r_key => $r_val)
                                        <option value="{{ encode5t($r_val->user_id) }}">{{ $r_val->user_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <input type="hidden" id="select_rc" name="select_rc" value="{{ encode5t(Session::get('rc_id')->rc_id) }}">
                            {{-- <input type="text" id="select_rc" name="select_rc" value="{{  }}"> --}}
                        @endif

                        <div class="col-lg-auto col-md-2 col-4">
                            <a class="btn btn-outline-success search_btn" href="javascript::void(0)">
                                SEARCH
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="dashboard align-middle manageTable ">

        <div class="table-responsive manageTable">
            <table class="table table-bordered table-hover manageTable" id="template_table">
                <thead>
                    <tr class="dashboard-heading">
                        <th scope="col">S.No</th>
                        <th scope="col">TITLE/NAME OF TEMPLATE</th>
                        <th scope="col">DURATION</th>
                        <th scope="col">REGIONAL CENTER</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ACTION</th>


                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    @foreach ($data as $key => $value)
                        <tr>
                            <td scope="row ">{{ $key + 1 }}</td>
                            <td><a href="{{url('admin/template-management/template-wise-regional-center/'.encode5t($value->id))}}"><span
                                        class="text-decoration-underline">{{ $value->name ?? '' }}</span></a></td>
                            <td>{{ date('d-m-Y', strtotime($value->from_date)) }} -
                                {{ date('d-m-Y', strtotime($value->to_date)) }}</td>
                            <td>
                                <button type="button" class="border-0" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop_{{ $key }}">
                                    <img src="{{ asset('public/front/themes/images/eye-fill.svg') }}" alt="">
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop_{{ $key }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">

                                                <button type="button" class="btn-close border-0" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body ">
                                                <table class="table text-start table-bordered">
                                                    <thead class="dashboard-heading">
                                                        <tr>
                                                            <th scope="col">S.No</th>
                                                            <th scope="col">NAME OF THE REGIONAL CENTER</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
{{--
                                                        @foreach ($value->tempForRc as $k => $val)
                                                            <tr class="border-0">
                                                                <th scope="row" class="modal-border">
                                                                    {{ $k + 1 }}</th>
                                                                <td colspan="2" class="border-0">
                                                                    @php $data = getRcDetails($val->rc_id); @endphp
                                                                    {{ $data->user_name ?? '' }}
                                                                </td>

                                                            </tr>
                                                        @endforeach --}}

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                @if ($value->to_date < date('Y-m-d'))
                                    <div class="red_outline">EXPIRED</div>
                                @elseif($value->from_date > date('Y-m-d'))
                                    <div class="yellow_outline">UPCOMING</div>
                                @else
                                    <div class="green_outline">ACTIVE</div>
                                @endif

                            </td>
                            <td>
                                @if(Session::get('role_details')->id == 1)
                                <div class="d-flex justify-content-around align-items-center">
                                    <div>
                                        <button type="button" class="border-0">
                                            <div>
                                                <a href="{{ route('temp.manage.edit', encode5t($value->id)) }}"
                                                    class="actionbtn">
                                                    <img src="{{ asset('public/front/themes/images/edit.svg') }}"
                                                        alt=""></i>
                                                    <div>EDIT</div>
                                                </a>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="vl"></div>
                                    <div>
                                        <div><button type="button" class="border-0 delete_temp"
                                                data-id="{{ $value->id }}"><img
                                                    src="{{ asset('public/front/themes/images/delete.svg') }}" alt="">
                                                <div>DELETE</div>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
@section('page_specific_js')
    <script src="{{ asset('public/front/themes/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/front/js/templatemanagement/template_filter.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#template_table').DataTable({

            });
            $('.delete_temp').on('click', function() {
                let id = $(this).data("id");
                $.ajax({
                    method: "GET",
                    url: baseurl + "/admin/template-management/deleteById/" + id,
                    success: function(response) {
                        if (response.status == true) {
                            swal("Message", response.message, "success");
                            window.location.href = baseurl + "/admin/template-management/index";
                        } else {
                            swal("Message", response.message, "error");
                        }
                    }
                });
            });
        });
    </script>
@endsection
