<x-layout>
    @php
        $status = ['Not Activated', 'Activated'];
        
    @endphp
    <div style="margin-top:55px !important;min-height:600px" class="table-responsive">
      
        <table id="table" class="display">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Allowed Activities</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                    <th>Note</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($licenses as $license)
                    <tr>
                        <td>{{ $license->id }}</td>
                        <td>{{ $license->customer_name }}</td>
                        <td>{{ $license->customer_email }}</td>
                        <td>{{ $license->allowed_activities }}</td>
                        <td>{{ $license->expiry_date }}</td>
                        <td>
                            <div class="roButton">
                                <ul>
                                    <li style="display:{{ $license->status == 0 ? 'none' : '' }}">
                                        <input type="radio" {{ $license->status == 1 ? 'checked' : '' }} value="1">

                                        <span class="tickcheck">
                                            <i class="ni ni-check-bold"></i>
                                        </span>
                                    </li>

                                    <li style="display:{{ $license->status == 1 ? 'none' : '' }}">
                                        <input type="radio" {{ $license->status == 0 ? 'checked' : '' }} value="0">

                                        <span class="crosscheck">
                                            <i class="ni ni-fat-remove"></i>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>{{ $license->note }}</td>
                        <td><a href="/license/{{ $license->id }}/view" class="btn btn-info"> <i class="fa fa-eye"
                                    aria-hidden="true"></i>

                            </a></td>

                        <td><a href="/license/{{ $license->id }}/edit"> <i
                                    class="fa fa-pencil-square-o btn btn-success" aria-hidden="true"></i>
                            </a></td>
                        <td>
                            <form action="/license-delete/{{ $license->id }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"
                                        aria-hidden="true"></i>

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
    $(document).ready(function() {
        $('#table').DataTable({
            responsive: true,
            order:[],
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel'
            ]
        });
    });
</script>

<style>
    .roButton ul li {
        display: inline-block;
        margin-right: 15px;
        position: relative;
    }

    .roButton ul li span {
        width: 50px;
        height: 50px;
        border: 1px solid #c5c5c5;
        border-radius: 50%;
        display: grid;
        place-items: center;
        font-size: 22px;
        #c5c5c5;
    }

    .roButton ul li input {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
    }

    .roButton ul li input:checked~span.tickcheck {
        background-color: #11BF05;
        color: #fff;
    }

    .roButton ul li input:checked~span.crosscheck {
        background-color: #E52F4A;
        color: #fff;
    }
</style>
