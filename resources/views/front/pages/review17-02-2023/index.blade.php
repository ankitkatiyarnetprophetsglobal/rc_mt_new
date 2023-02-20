@extends('front.layouts.layout')
@section('page_specific_css')

<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
<style>
    .rc-new-container thead{
    background-color: #000080;
    color: white;
    min-width: 120px !important;
}
</style>
@endsection
@section('content')
<div class="container rc-new-container">
      <div class="row">
        <h2 class="text-underline text-center my-5">
          Review of NCOEs based on the Data of Last Five Year
        </h2>
      </div>

      <div class="row">
        <h3 class="text-underline mb-4">
          General Guidelines for filling up of data
        </h3>
        <ol>
          <li class="mb-2">Utmost care may be taken while the information is filled.</li>
          <li class="mb-2">
            NCOEs Heads should ensure that correct information is given, and he
            will be accountable for all information.
          </li class="mb-2">
          <li class="mb-2">
            Wherever the rating is to be made, the same may be made on a 5-point
            scale with the following: -

            <div class="table-responsive py-3">
                <table class="table table-bordered">
                    <thead class="text-center align-middle">
                        <tr>
                            <th>5</th>
                            <th>Excellent</th>
                        </tr>
                        <tr>
                            <th>4</th>
                            <th>Very Good</th>
                        </tr>
                        <tr>
                            <th>3</th>
                            <th>Good</th>
                        </tr>
                        <tr>
                            <th>2</th>
                            <th>Average</th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>Poor</th>
                        </tr>
                    </thead>
                </table>
            </div>
          </li>
          <li class="mb-2">
            It is proposed to constitute a Committee by NCOEs Heads which consists of coaches and administrative staff working in the NCOE to come out with a logical rating on each parameter.  Accommodation facilities, kitchen, recreation hall etc. to be supported by photos and videos.
          </li>
        </ol>
      </div>

      <div class="row">
        <h3 class="text-underline mb-4">
            PROCEDURE TO FILL THE ACHIEVEMENT
        </h3>
        <ol>
          <li class="mb-2">
            <div class="table-responsive py-3">
                <table class="table table-bordered">
                    <thead class="text-center align-middle">
                        <tr>
                            <th>Category 1</th>
                            <th>Olympics, world championship/ cup, Commonwealth games, Asian games.</th>
                        </tr>
                        <tr>
                            <th>Category 2</th>
                            <th>All other international championship / competitions conducted by the respective federations.</th>
                        </tr>
                        <tr>
                            <th>Category 3</th>
                            <th>: Any other international exposure undertaken by the Athlete. </th>
                        </tr>
                        
                    </thead>
                </table>
            </div>
          </li>
          <li class="mb-2">
            If an Athlete is shifted from one NCOE to another in the middle of academic year, achievement to be reflected in the NCOE where he spent more time.
          </li class="mb-2">
          <li class="mb-2">
            The Athlete who won the international medal is to be reflected in the international participation also
        
          </li>
          <li class="mb-2">   Since most of the international tournament is held after the National coaching camp, total no. of athletes undergone training in the national coaching camp is to be reflected at column no – 1.17 or 1.18 as the case may be.   
        </li>
        <li class="mb-2">
               It is mandatory that, all disciplines of NCOE are to be reflected in reply to each questionnaire irrespective of achievements. For NIL achievement, ”0” to be added instead of keeping it blank for that discipline.
        </li>
        <li class="mb-2">
            Since the admission to the centre is generally based on the academic year strength and achievement is to be reflected on academic year only than the calendar year i.e., 2018-19, 2019-20, 2020-21, 2021-22 etc. In the case of 2022-23 achievement made up to January 15th, 2023.
        </li>
        <li class="mb-2">
            National level competition means the competition conducted by respective Federation at National level/Khelo India Games/School Games conducted by SGFI/All India Inter-University conducted by the AIU.
        </li>
        <li class="mb-2">Number of sportspersons participated at National/International level can be added for the different tournaments i.e., if an athlete participated in Sr. National, All India Inter-University and Jr. National, count is to be there even though it is a single athlete. If the same athlete participated in more than one event in a single tournament, total medal won may be considered.</li>
       <li class="mb-2">Zonal tournament conducted by the Association or AIU may not be counted as National level achievement.</li>
        <li class="mb-2">While filling the column 3.5 and 3.6, general observation may be given with a view to give future direction. </li>
    </ol>
      </div>

      <!-- Next -->
      <div class="row justify-content-center my-3">
        <div class="col-auto">
        <a href="{{url('review/part-one/step-one/')}}">
          <button type="button" class="d-block mx-auto btn btn-primary">
            Part 1
          </button>
        </a>
        </div>
        <div class="col-auto">
        <a href="{{url('review/part-two/')}}">
          <button type="button" class="d-block mx-auto btn btn-primary">
            Part 2
          </button>
        </a>
        </div>
		<div class="col-auto">
        <a href="{{url('review/part-three/')}}">
          <button type="button" class="d-block mx-auto btn btn-primary">
            Part 3
          </button>
        </a>
        </div>
      </div>
    </div>
<!-- <a href="{{url('review/part-one/step-one/'.encode5t(Session::get('rc_id')->rc_id))}}"><button>Next</button></a> -->

@endsection
@section('page_specific_js')
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>

@endsection