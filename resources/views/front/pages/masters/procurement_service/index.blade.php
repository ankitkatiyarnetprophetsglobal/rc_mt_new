@extends('front.layouts.layout')
@section('page_specific_css')
<link rel="stylesheet" href="{{ asset('public/front/themes/css/jquery.dataTables.min.css') }}">
@endsection
@section('content')
<div class="manageTable">
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
    <h3 class="d-flex justify-content-between flex-wrap align-items-center">Procurement Service Details<a class="btn btn-outline-success" href="{{ route('procurement.service.create') }}"><i class="fa-solid fa-plus"></i>
            ADD</a></h3>
    <div class="table-responsive mt-3">
        <table class="table table-bordered pt-2" id="masterInfra">
            <thead>
                <tr>
                    <th>SN.NO</th>
                    <th>CENTERS</th>
                    <th>Title / Details</th>
                    <th>Expiry date of existing contract</th>
                    <th>Existing contract value</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($data->count())
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->centername->academy_name ?? '' }}</td>
                    <td>{{ $value->title ?? '' }}</td>
                    <td>{{ date('d-m-Y',strtotime($value->expiry_date_of_existing_contract)) ?? '' }}</td>
                    <td>{{ $value->existing_contract_value ?? '' }}</td>
                    <td>
                        @if($value->status)
                        <div class="green_outline">Active</div>
                        @else
                        <div class="red_outline">Inactive</div>
                        @endif
                    </td>

                    <td>

                        <a href="{{ route('procurement.service.edit', encode5t($value->id)) }}" class="actionbtn"><i class="fa-regular fa-pen-to-square"></i></a>
                        {{-- <a href="{{ route('procurement.service.delete', encode5t($value->id)) }}" class="actionbtn"><i class="fa-regular fa-trash-can"></i></a> --}}
                    </td>
                </tr>
                @endforeach
                @else
                <td colspan="5" class="text-center">{{__('No Data Found')}}</td>
                @endif

            </tbody>
        </table>
    </div>
</div>
@endsection
@section('page_specific_js')
<script src="{{ asset('public/front/themes/js/jquery.dataTables.min.js') }}"></script>
@endsection