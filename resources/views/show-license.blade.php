<x-layout>
    @php
        $status = ['Not Activated', 'Activated'];
        
    @endphp
    <div style="margin-top:55px !important;min-height:600px" class="table-responsive" >
    <table id="table" class="display"  >

        <thead>
            <tr>
                <td>ID</td>
                <td>Customer Name</td>
                <td>Customer Email</td>
                <td>Allowed Activities</td>
                <td>Expiry Date</td>
                <td>Status</td>
                <td>Note</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($licenses as $license)
                <tr>
                    <td>{{$license->id}}</td>
                    <td>{{ $license->customer_name }}</td>
                    <td>{{ $license->customer_email }}</td>
                    <td>{{ $license->allowed_activities }}</td>
                    <td>{{ $license->expiry_date }}</td>
                    <td>{{ $status[$license->status] }}</td>
                    <td>{{ $license->note }}</td>
                    <td><a href="/license/{{$license->id}}/edit" > <i class="fa fa-pencil-square-o btn btn-success" aria-hidden="true"></i>
                    </a></td>
                    <td>
                        <form action="/license-delete/{{$license->id}}" method="post">
@csrf
<button type="submit" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i>

</button>
</form>
                    </td>
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
