@extends('front.layouts.layout')
@section('page_specific_css')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-md-end justify-content-center my-3 align-items-center">
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
    
    <div class="rc_cards my-5 ">
        <div class="row justify-content-center  ">
            <div class="col-lg-4 col-md-6 col-12 px-md-5 px-0   ">
                <div class="rc_card py-5 ">
                    <div class="img  d-flex align-items-center justify-content-center">
                        <div class="rc_icon border rounded-circle mb-2">
                            <img src="{{ asset('public/front/themes/svg/athletes-rc.svg') }}" class="" alt="">
                        </div>
                    </div>
                    <div class="rc_card_heading text-center mt-2 ">
                        ATHLETES
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 px-md-5 px-0   ">
                <div class="rc_card py-5 ">
                    <div class="img  d-flex align-items-center justify-content-center">
                        <div class="rc_icon border rounded-circle mb-2">
                            <img src="{{ asset('public/front/themes/svg/Coaches-1.svg') }}" class="" alt="">
                        </div>
                    </div>
                    <div class="rc_card_heading text-center mt-2 ">
                        COACHES/ STAFF
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 px-md-5 px-0   ">
                <a href="{{ route('manage.infrastructure.index', encode5t($select_temp->id)) }}">
                    <div class="rc_card py-5 ">
                        <div class="img  d-flex align-items-center justify-content-center">
                            <div class="rc_icon border rounded-circle mb-2">
                                <img src="{{ asset('public/front/themes/svg/Traing.svg') }}" class="" alt="">
                            </div>
                        </div>
                        <div class="rc_card_heading text-center mt-2 ">
                            INFRASTRUCTURE
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12 px-md-5 px-0   ">
                <a href="{{ route('managefinance.index', encode5t($select_temp->id)) }}">
                    <div class="rc_card py-5">
                        <div class="img  d-flex align-items-center justify-content-center">
                            <div class="rc_icon border rounded-circle mb-2">
                                <img src="{{ asset('public/front/themes/svg/rupesss.svg') }}" class=""
                                    alt="">
                            </div>
                        </div>
                        <div class="rc_card_heading text-center mt-2 ">
                            FINANCES
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12 px-md-5 px-0   ">
                <a href="{{ route('manage.procurement.index', encode5t($select_temp->id)) }}">
                    <div class="rc_card py-5 ">
                        <div class="img  d-flex align-items-center justify-content-center">
                            <div class="rc_icon border rounded-circle mb-2">
                                <img src="{{ asset('public/front/themes/svg/shopping-cart-2-line.svg') }}" class=""
                                    alt="">
                            </div>
                        </div>
                        <div class="rc_card_heading text-center mt-2 ">
                            PROCUREMENT
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12 px-md-5 px-0">
                <a href="{{ route('manage.miscellaneous.index', encode5t($select_temp->id)) }}">
                    <div class="rc_card py-5 ">
                        <div class="img  d-flex align-items-center justify-content-center">
                            <div class="rc_icon border rounded-circle mb-2">
                                <img src="{{ asset('public/front/themes/svg/settings-5-line.svg') }}" class=""
                                    alt="">
                            </div>
                        </div>
                        <div class="rc_card_heading text-center mt-2 ">
                            MISCELLANEOUS
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12 px-md-5 px-0   ">
                <a href="{{ route('pendingdemands.index', encode5t($select_temp->id)) }}">
                    <div class="rc_card py-5">
                        <div class="img  d-flex align-items-center justify-content-center">
                            {{-- <div class="rc_icon border rounded-circle mb-2">
                    <img src="{{ asset('public/front/themes/svg/rupesss.svg')}}" class="" alt="">
                  </div> --}}
                        </div>
                        <div class="rc_card_heading text-center mt-2 ">
                            Pending Demands
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    </div>
@endsection
@section('page_specific_js')
    <script src="{{ asset('public/front/js/templatemanagement/template_filter.js') }}"></script>
@endsection
