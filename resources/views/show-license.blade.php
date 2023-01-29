<x-layout>
    @php
        $status = ['Not Activated', 'Activated'];
        
    @endphp

    <h3 class="text-dark mb-4"><i class="fas fa-database px-2 text-primary"></i>Show All Licenses<a class="ps-3"
            href="#" data-bs-target="#modal-license-import-export" data-bs-toggle="modal">Click to Import &amp;
            Export</a></h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Licenses Overview</p>
        </div>
        <div class="card-body  " style="width:100% !important">

            <div class=" mt-2 table-responsive">
                <table id="dtable" class="table my-0" width="100%" data-order="[]">

                    <thead>
                        <tr role="row">
                            <td></td>{{-- <td>ID</td> --}}
                            <td>Product Name</td>
                            <td>License Key </td>
                            <td>Allowed Activations</td>
                            <td>Customer Name</td>
                            <td>Customer Email</td>
                            <td>Expiry Date</td>
                            <td>Status</td>
                            <td>Note</td>
                            {{-- <td>View</td> --}}
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($licenses as $license)
                            <tr>
                                {{-- <td>{{ $license->id }}</td> --}}
                                <td><a href="/license/{{ $license->id }}/edit" class="btn btn-info"><i
                                    class="fa fa-pencil-alt" style="color:white"></i>
                            </a>
                            <form action="/license-delete/{{ $license->id }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger mt-1"><i class="fa fa-trash"
                                        aria-hidden="true"></i>

                                </button>
                            </form>
                        </td>
                                <td>{{ $license->license_product_name }}</td>
                                <td>{{ $license->license_key }}</td>
                                <td>{{ $license->license_used_activations }}/{{ $license->license_allowed_activations }}
                                </td>
                                <td>{{ $license->license_customer_name }}</td>
                                <td>{{ $license->license_customer_email }}</td>
                                <td>{{ date('d-m-Y', strtotime($license->license_expiry_date)) }}</td>
                                <td>
                                    {{ $status[$license->license_status] }} </td>
                                <td>{{ $license->license_note }}</td>
                                {{-- <td><a href="/license/{{ $license->id }}/view" class="btn btn-info"> <i class="fa fa-eye"
                                                aria-hidden="true"></i>
            
                                        </a></td> --}}


                            </tr>
                        @endforeach
                    </tbody>
                    <table>

            </div>

        </div>
    </div>



</x-layout>

<script>
    $(document).ready(function() {
        $('#dtable').DataTable({
            rowReorder: {
            selector: 'td:nth-child(2)'
        },
            responsive: true

        });
    });
</script>
<style>
    div.dataTables_paginate {
        float: right !important;
        margin-top: 10px;
    }
    .dataTables_filter{
        float:right !important;
    }
</style>
