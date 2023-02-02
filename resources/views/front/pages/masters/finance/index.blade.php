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

    <h3 class="d-flex justify-content-between flex-wrap align-items-center">Status under SAI BLOCK GRANTS (Rs. in crores)<a class="btn btn-outline-success" href="{{ route('finance.create') }}"><i class="fa-solid fa-plus"></i> ADD</a></h3>

    <div class="table-responsive mt-3">
        <table class="table table-bordered pt-2" id="masterfinance">
            <thead>
                <tr>
                    <th>SN.NO</th>
                    <th>CENTERS</th>
                    <th>Scheme</th>
                    <th>Budget Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->centername->academy_name ?? '' }}</td>
                    <td>{{ $value->scheme_name ?? '' }}</td>
                    <td>{{ $value->budget_cost ?? '' }}</td>
                    <td>
                        <a href="{{ route('finance.edit', encode5t($value->id)) }}" class="actionbtn"><i class="fa-regular fa-pen-to-square"></i></a>
                        {{-- <a href="{{ route('finance.delete', encode5t($value->id)) }}" class="actionbtn"><i class="fa-solid fa-trash-can"></i></a> --}}
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<!--close common-card-->
@endsection

@section('page_specific_js')

<script src="{{ asset('public/front/themes/js/jquery.dataTables.min.js') }}"></script>

<script>
    $(document).ready(function() {

        $('#masterfinance').DataTable({});
    });
</script>

@endsection