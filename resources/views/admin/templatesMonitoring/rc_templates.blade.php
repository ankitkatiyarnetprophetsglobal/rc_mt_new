@extends('front.layouts.layout')
@section('page_specific_css')
    <link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto my-2">
                <h3>
                  RC Wise Templates 
                </h3>
            </div>
            <div class="col-auto my-2">
                <a class="btn btn-outline-success" href="{{ route('temp.manage.create') }}">
                    <i class="fa-solid fa-plus"></i> ADD
                </a>
                {{-- <button type="button" class="btn add_btn ">+ ADD</button> --}}
            </div>
        </div>
        <div class="row justify-content-lg-end justify-content-md-end justify-content-center mb-2">
            <form class="row justify-content-end" method="POST" id="filter_form" action="javascript::void(0)">
                @csrf
                <div class="col-lg-auto col-md-6 col-6">
                    <select class="form-select temp_select_input" name="select_temp"
                        aria-label="Default select example">
                        <option value="" selected disabled>Select Template</option>
                        @foreach ($templates as $k_t => $v_t)
                            <option value="{{ encode5t($k_t) }}">{{ $v_t }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-auto col-md-4 col-4">
                    {{-- @php $rc_details = getRcList(); @endphp --}}
                    <select class="form-select rc_select_input" name="select_rc" aria-label="Default select example">
                        <option value="" selected disabled>Select Regional Center</option>
                            @foreach($rc_details as $key => $val)
                                {{-- {{ dd($val->user_id) }} --}}
                                {{-- {{ dd($val->user_name) }} --}}
                                <option value="{{encode5t($val->user_id)}}"  @if($val->user_id == $select_rc) selected @endif>{{$val->user_name}}</option>
                            @endforeach
                        {{-- @foreach ($rc_details as $r_key => $r_val)
                            <option value="{{ $r_key }}" @if($r_key == $select_rc->id) selected @endif>{{ $r_val }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="col-lg-auto col-md-2 col-4">
                    <a class="btn btn-outline-success search_btn" href="javascript::void(0)">
                        SEARCH
                    </a>
                    {{-- <button type="button" class="btn add_btn ">+ ADD</button> --}}
                </div>
            </form>
        </div>
        <div class="dashboard align-middle ">
            <div class="table-responsive manageTable">
                <table class="table table-bordered table-hover manageTable " id="rc_wise_temp_table">
                    <thead>
                        <tr class="dashboard-heading">
                            <th scope="col">S.No</th>
                            <th scope="col">TITLE/NAME OF TEMPLATE</th>
                            <th scope="col">DURATION</th>
                            <th scope="col">STATUS</th>
                            {{-- <th scope="col">ACTION</th> --}}
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($data as $key => $value)
                            <tr>
                                <td scope="row ">{{ $key + 1 }}</td>
                                <td><a href="{{url('admin/template-management/template-of-regional-center/'.encode5t($select_rc).'/'.encode5t($value->id))}}"><span
                                            class="text-decoration-underline">{{ $value->name ?? '' }}</span></a></td>
                                <td>{{ date('d-m-Y', strtotime($value->from_date)) }} -
                                    {{ date('d-m-Y', strtotime($value->to_date)) }}</td>
                           
                                <td>
                                    @if (strtotime($value->to_date) < strtotime(date('Y-m-d',time())))
                                        <div class="red_outline">EXPIRED</div>
                                    @elseif(strtotime($value->from_date) > strtotime(date('Y-m-d',time())))
                                        <div class="yellow_outline">UPCOMING</div>
                                    @else
                                        <div class="green_outline">ACTIVE</div>
                                    @endif

                                </td>
                                {{-- <td>
                                    <div class="d-flex justify-content-around align-items-center">
                                        <div>
                                            <div><button type="button" class="border-0"><img
                                                        src="{{ asset('front/themes/images/edit.svg') }}"
                                                        alt=""></button></div>
                                            <div>EDIT</div>
                                        </div>
                                        <div class="vl"></div>
                                        <div>
                                            <div><button type="button" class="border-0"><img
                                                        src="{{ asset('front/themes/images/delete.svg') }}"
                                                        alt=""></button></div>
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
@endsection
@section('page_specific_js')
    <script src="{{ asset('public/front/themes/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('public/front/js/templatemanagement/template_filter.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#rc_wise_temp_table').DataTable({});
        });
    </script>
    
@endsection
