@extends('front.layouts.layout')
@section('page_specific_css')
@endsection
@section('content')
    <div class="container">
        
        <div class="row justify-content-md-end justify-content-center my-3 align-items-center">
        @if (Session::has('message'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ Session::get('message') }}
        </div>
        @endif

        @if (Session::has('error_message'))
        <div class="alert alert-danger">
            <strong>Danger!</strong> {{ Session::get('error_message') }}
        </div>
        @endif
            <div class="row">
                <div class="col-lg-4 col-md-3 col-12 text-start ">
                    <div class="row justify-content-center">
                        <div class="month_title text-center">
                            {{-- Rc_mumbai --}}
                            {{-- {{$select_rc->name ?? ''}} --}}
                            {{-- {{ $select_rc_id ?? ''}} --}}
                            @php $data = getRcDetails($select_rc_id); @endphp
                            {{ $data->user_name ?? '' }}
                        </div>
                        <div class="yellow_hl my-2"></div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-9 col-12">
                    <div class="row justify-content-end align-items-center">
                        <form class="row justify-content-end" method="POST" id="filter_form" action="javascript::void(0)">
                            @csrf
                            <div class="col-auto">
                                <select class="form-select temp_select_input" name="select_temp"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>Select Template</option>
                                    @foreach ($templates as $k_t => $v_t)
                                        <option value="{{ encode5t($k_t) }}"
                                            @if ($k_t == $select_temp->id) selected @endif>{{ $v_t }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if (Session::get('role_details')->id == 1)
                                <div class="col-auto">
                                    {{-- @php $rc_details = getRcList(); @endphp --}}
                                    <select class="form-select rc_select_input" name="select_rc"
                                        aria-label="Default select example">
                                        <option value="" selected disabled>Select Regional Center</option>
                                        @foreach ($rc_details as $key => $val)
                                            <option value="{{ encode5t($val->user_id) }}"
                                                {{ $val->user_id == $select_rc_id ? 'selected' : '' }}>{{ $val->user_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @else
                                <input type="hidden" id="select_rc" name="select_rc" value="{{ encode5t(Session::get('rc_id')->rc_id) }}">
                                {{-- <input type="text" id="select_rc" name="select_rc" value="{{  }}"> --}}
                            @endif
                            <div class="col-auto">
                                <a class="btn btn-outline-success search_btn" href="javascript::void(0)">
                                    SEARCH
                                </a>
                                {{-- <button type="button" class="btn add_btn ">+ ADD</button> --}}
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="dashboard align-middle ">

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="dashboard-heading">
                            <th scope="col">S.No</th>
                            <th scope="col">MANAGE</th>

                            <th scope="col">STATUS</th>
                            <th scope="col">ACTION</th>



                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @foreach ($template_accessible->tempSection as $key => $value)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>
                                    @if (Session::get('role_details')->id == 1 ||
                                        strtotime($template_accessible->to_date) < strtotime(date('Y-m-d', time())))
                                        <a href="javascript:void(0)"><span
                                                class="text-decoration-underline">{{ $value->section->name ?? '' }}</span></a>
                                    @else
                                        <a href="{{ route($value->section->route, [encode5t($select_temp->id), $centers_id]) }}">
                                            <span  class="text-decoration-underline">{{ $value->section->name ?? '' }}</span>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if (strtotime($template_accessible->to_date) < strtotime(date('Y-m-d', time())))
                                        <div class="red_outline">EXPIRED</div>
                                    @else
                                        @if ($value->section->id == 1)
                                            @if ($infra_work)
                                                <div class="green_outline">COMPLETE</div>
                                            @else
                                                <div class="red_outline">INCOMPLETE</div>
                                            @endif
                                        @elseif($value->section->id == 2)
                                            @if ($finance)
                                                <div class="green_outline">COMPLETE</div>
                                            @else
                                                <div class="red_outline">INCOMPLETE</div>
                                            @endif
                                        @elseif($value->section->id == 3)
                                            @if ($procurement)
                                                <div class="green_outline">COMPLETE</div>
                                            @else
                                                <div class="red_outline">INCOMPLETE</div>
                                            @endif
                                        @elseif($value->section->id == 4)
                                            @if ($miscellaneous)
                                                <div class="green_outline">COMPLETE</div>
                                            @else
                                                <div class="red_outline">INCOMPLETE</div>
                                            @endif
                                        @elseif($value->section->id == 5)
                                            @if ($pending_demands)
                                                <div class="green_outline">COMPLETE</div>
                                            @else
                                                <div class="red_outline">INCOMPLETE</div>
                                            @endif
                                        @else
                                            <div class="red_outline">INCOMPLETE</div>
                                        @endif
                                    @endif

                                </td>
                                <td>
                                    <div class="d-flex justify-content-around align-items-center">
                                        <div>
                                            <a href="{{ url('admin/template-management/template-of-regional-center/' . encode5t($select_rc_id) . '/' . encode5t($select_temp->id) . '/' . encode5t($value->section->route_parameter). '/' . $centers_id) }}"
                                                class="text-decoration-none">
                                                <div><button type="button" class="border-0 eye-view"><img
                                                            src="{{ asset('public/front/themes/images/eye-fill-rc.svg') }}"
                                                            alt=""></button></div>
                                                <div>VIEW</div>
                                            </a>
                                        </div>

                                        @if (Session::get('role_details')->id != 1 &&
                                            strtotime($template_accessible->to_date) > strtotime(date('Y-m-d', time())))
                                            <div class="vl"></div>
                                            <div>

                                                {{-- <a href="{{ route($value->section->route, encode5t($select_temp->id)) }}" class="text-decoration-none"> --}}
                                                <a href="{{ route($value->section->route,[encode5t($select_temp->id), $centers_id]) }}" class="text-decoration-none">
                                                    <div><button type="button" class="border-0"><img
                                                                src="{{ asset('public/front/themes/images/edit.svg') }}"
                                                                alt=""></button></div>
                                                    <div>EDIT</div>
                                                </a>
                                            </div>
                                        @endif

                                        @if (Session::get('role_details')->id != 1 && Session::get('role_details')->id != 3 &&
                                            strtotime($template_accessible->to_date) > strtotime(date('Y-m-d', time())))
                                            <div class="vl"></div>
                                            <div>
                                                <a href="{{ route('temp.manage.perticularTempCopy',[encode5t($value->section->route_parameter), encode5t($select_temp->id), $centers_id]) }}" class="text-decoration-none" onclick="return confirm('Cloning will copy all the data from your previous template to Current one.')">
                                                {{-- <a href="{{ route('temp.manage.perticularTempCopy',[encode5t($value->section->route_parameter), encode5t($select_temp->id), $centers_id]) }}" class="text-decoration-none"> --}}
                                                    <div><button type="button" class="border-0"><img
                                                                src="{{ asset('public/front/themes/images/copy.svg') }}"
                                                                alt=""></button></div>
                                                    <div>CLONE</div>
                                                </a>
                                            </div>
                                        @endif

                                        <!-- Button trigger modal -->


                                        <!-- Modal -->
                                        {{-- <div class="modal fade" id="modal_{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}


                                        {{-- @if (Session::get('role_details')->id != 1 && strtotime($template_accessible->to_date) > strtotime(date('Y-m-d', time())))
                                            <div class="vl"></div>
                                            <div>


                                                <a href="{{ route($value->section->route, encode5t($select_temp->id)) }}"
                                                    class="text-decoration-none">
                                                    <div><button type="button" class="border-0"><img
                                                                src="{{ asset('public/front/themes/images/edit.svg') }}"
                                                                alt=""></button></div>
                                                    <div>EDIT</div>
                                                </a>
                                            </div>
                                        @endif --}}
                                    </div>
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
    <script src="{{ asset('public/front/js/templatemanagement/template_filter.js') }}"></script>
@endsection
