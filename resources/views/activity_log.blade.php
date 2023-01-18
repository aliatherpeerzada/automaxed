<x-layout>
  
<div style="margin-top:55px !important;min-height:600px" class="table-responsive" >
    <table id="table"   >

        <thead>
            <tr>
                <td>ID</td>
                <td>License Key</td>
                <td>Customer Name</td>
                <td>Customer Email</td>
 <td>Country</td>
 <td>IP</td>
 <td>Hardware ID</td> 
 <td>Action Done</td>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    @php 
                    @endphp
                    <td>{{$data->id}}</td>
                    <td>{{ $data->license_key }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->country }}</td>
         
                    <td>{{ $data->ip }}</td>
                    <td>{{ $data->hardware_id }}</td>
         
                    <td>{{$data->status}}</td>
                 </tr>
            @endforeach
        </tbody>
        <table>



        </div>
        </x-layout>

        <script>
            $(document).ready( function () {
            $('#table').DataTable({
                responsive: true,
                dom: 'Bfrtip',
        buttons: [
            'csv', 'excel'
        ]
            });
        } );
        </script>
