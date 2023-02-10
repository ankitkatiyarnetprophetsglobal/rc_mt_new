<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="assets/css/design.css">
  </head>
  <body>
    
    <div class="container-scroller">
        <div align="center">
            <div>
            <a href="{{url('/downloadPDF')}}">Download PDF</a>    

            </div>
            
          <h3 class="text-center mt-3">Data Display</h3>
            <table id="receptTBL" style="width:100px;">
              <thead>  
                <tr>
                    <th >Guest Room AC Count</th>
                    <th >Guest Room AC Male</th>
                    <th >Guest Room AC Female</th>
                    <th >Rating</th>
                    <th >Date</th>
                    <th >Image</th>
                </tr>
                </thead>  
        <tbody>

                @foreach($data as $data)
                <tr align="center">
                    <td>{{$data->facilities_guest_room_ac_count}}</td>
                    <td>{{$data->facilities_guest_room_area_male}}</td>
                    <td>{{$data->facilities_guest_room_area_female}}</td>
                    <td>{{$data->facilities_guest_room_rating}}</td>
                    <td>{{$data->facilities_guest_room_nonac_ac_count}}</td>
                    <td>{{$data->facilities_guest_room_nonac_ac_count}}</td>
                    
                </tr>
                @endforeach
        </tbody>
            </table>
        </div>
    </div>
  </body>
</html>