<x-layout>
  
<div style="margin-top:55px !important;min-height:600px" class="table-responsive" >
    <table id="table" class="display"  >

        <thead>
            <tr>
                <td>ID</td>
                <td>Action By</td>
                <td>Customer Name</td>
                <td>Customer Email</td>
 <td>License Status</td>
                <td>Action Done</td>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    @php 
$Action_by = DB::table('users')->where('id',$data->user_id)->pluck('username')->first();
$license_data = DB::table('licenses')->where('id',$data->license_id)->first();
                    @endphp
                    <td>{{$data->id}}</td>
                    <td>{{ $Action_by }}</td>
                    <td>{{ $license_data->customer_name }}</td>
                    <td>{{ $license_data->customer_email }}</td>
                    <td>{{ $license_data->status==1?"Activated":"Not Activated" }}</td>
         
         
                    <td>{{$data->status}}</td>
                 </tr>
            @endforeach
        </tbody>
        <table>



        </div>
        </x-layout>

        <script>
            $(document).ready( function () {
            $('table').DataTable({
                responsive: true,
                
            });
        } );
        </script>
