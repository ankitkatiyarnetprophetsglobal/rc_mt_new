@extends('front.layouts.layout')
@section('page_specific_css')
    <link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
@endsection
@section('content')
    <div class="dashboard-monthly">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto my-2">
                    <h3>
                        Template Wise RC
                    </h3>
                </div>
                @if (Session::get('role_details')->id == 1)
                    <div class="col-auto my-2">
                        <a class="btn btn-outline-success" href="{{ route('temp.manage.create') }}">
                            <i class="fa-solid fa-plus"></i> ADD
                        </a>
                        {{-- <button type="button" class="btn add_btn ">+ ADD</button> --}}
                    </div>
                @endif
            </div>
            
            <div class="row justify-content-lg-end justify-content-md-end justify-content-center mb-2">
                <form class="row justify-content-end" method="POST" id="filter_form" action="javascript::void(0)">
                    @csrf
                    <div class="col-lg-auto col-md-6 col-6">
                        <select class="form-select temp_select_input" name="select_temp"
                            aria-label="Default select example">
                            <option value="" selected disabled>Select Template</option>
                            @foreach ($templates as $k_t => $v_t)
                                <option value="{{ encode5t($k_t) }}" @if($k_t == $select_temp->id) selected @endif>{{ $v_t }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if (Session::get('role_details')->id == 1)
                        <div class="col-lg-auto col-md-4 col-4">
                            <select class="form-select rc_select_input" name="select_rc"
                                aria-label="Default select example">
                                <option value="" selected disabled>Select Regional Center</option>
                                @foreach ($rc_details as $r_key => $r_val)
                                    <option value="{{encode5t($r_val->user_id)}}">{{$r_val->user_name}}</option>
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
                        {{-- <button type="button" class="btn add_btn ">+ ADD</button> --}}
                    </div>
                </form>
            </div>
            <div class="dashboard align-middle manageTable ">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover manageTable" id="temp_wise_rc">
                        <thead>
                            <tr class="dashboard-heading">
                                <th scope="col">S.No</th>
                                <th scope="col">NAME OF THE REGIONAL CENTER</th>
                                {{-- <th scope="col">STATUS</th> --}}
                                {{-- <th scope="col">ACTION</th> --}}
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach($data as $key => $value)
                            <tr>
                                
                                <td>{{$key+1}}</td>
                                <td>
                                    
                                    <a href="{{url('admin/template-management/template-of-regional-center/'.encode5t($value->rc_id).'/'.encode5t($select_temp->id))}}">
                                        <span class="text-decoration-underline">
                                            {{-- {{ $value->rc_id }} --}}
                                            {{-- getRcDetails($value->rc_id)['name'] --}}
                                            @php $data = getRcDetails($value->rc_id); @endphp
                                                {{ $data->user_name ?? '' }}
                                        </span>
                                    </a>
                                </td>


                                <!-- <td>
                                    {{-- {{dd($value->infraWork)}} --}}
                                @foreach($value->infraWork as $val)
                                
                                   @if($val->created_by == $value->rc_id)
                                     @if($val->form_status == 1)
                                    <div class="green_outline">Complete</div>
                                    @else
                                    <div class="red_outline">In-Complete</div>
                                    @endif
                                   @endif
                                @endforeach
                                </td> -->
                                {{-- <td>
                                    <div class="d-flex justify-content-around align-items-center">
                                        <div>
                                            <div><button type="button" class="border-0"><img src="{{ asset('front/themes/images/edit.svg') }}" alt=""></button></div>
                                            <div>EDIT</div>
                                        </div>
                                        <div class="vl"></div>
                                        <div>
                                            <div><button type="button" class="border-0"><img src="{{ asset('front/themes/images/delete.svg') }}" alt=""></button></div>
                                            <div>DELETE</div>
                                        </div>
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                           

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_specific_js')
    <script src="{{ asset('public/front/themes/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('public/front/js/templatemanagement/template_filter.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#temp_wise_rc').DataTable({});
        });
    </script>
@endsection
