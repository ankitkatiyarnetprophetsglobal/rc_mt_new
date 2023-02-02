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

    <h3 class="d-flex justify-content-between flex-wrap align-items-center">Miscellaneous Master
        <a class="btn btn-outline-success" href="{{ route('masters.miscmaster.create') }}">
            <i class="fa-solid fa-plus"></i> ADD
        </a>
    </h3>

    <div class="table-responsive mt-3">
        <table class="table table-bordered pt-2" id="masterfinance">
            <thead>
                <tr>
                    <th>SN.NO</th>
                    <th>CENTER</th>
                    <th>Details of the OA/WP/CWP/CP/SLP</th>
                    <th>Name of the Court</th>
                    <th>Brief issue involved in the Court case</th>
                    <th>Name of the parties</th>
                    <th>Name of the Counsel</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->centername->academy_name ?? '' }}</td>
                    <td>{{ $value->detail_cwp_slp ?? '' }}</td>
                    <td>{{ $value->court_name ?? '' }}</td>
                    <td>{{ $value->court_case ?? '' }}</td>
                    <td>{{ $value->parties_name ?? '' }}</td>
                    <td>{{ $value->counsel_name ?? '' }}</td>
                    <td>
                        <a href="{{ route('masters.miscmaster.edit', encode5t($value->id)) }}" class="actionbtn"><i class="fa-regular fa-pen-to-square"></i></a>
                        {{--<a href="{{ route('masters.miscmaster.delete', encode5t($value->id)) }}" class="actionbtn"><i class="fa-solid fa-trash-can"></i></a> --}}
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