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
                           {{-- <td>ID</td> --}}
                            <td>Product Name</td>
                            <td>License Key </td>
                            <td>Allowed Activations</td>
                            <td>Customer Name</td>
                            <td>Customer Email</td>
                            <td>Expiry Date</td>
                            <td>Status</td>
                            <td>Note</td>
                            {{-- <td>View</td> --}}
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($licenses as $license)
                            <tr>
                                {{-- <td>{{ $license->id }}</td> --}}
                          
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
                                        <td><a href="/license/{{ $license->id }}/edit" class="btn btn-info"><i
                                            class="fa fa-pencil-alt" style="color:white"></i>
                                    </a></td>
                                    <td>
                                    <form action="/license-delete/{{ $license->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger "><i class="fa fa-trash"
                                                aria-hidden="true"></i>
        
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    <table>

            </div>

        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modal-license-import-export" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-database pe-2"></i>Import &amp; Export Licenses</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container p-0">
                        <h3>Export</h3>
                        <p>Here you can export all licenses as CSV or XLSX file. Great for excel and other spreadsheet editors.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3"><a class="btn btn-success link-light" href="{{route('export.spatie')}}">Export All Licenses as XLSX<i class="fas fa-file-excel ps-2"></i></a></div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3"><a class="btn btn-success link-light" href="{{route('export.csv')}}">Export All Licenses as CSV<i class="fas fa-file-csv ps-2"></i></a></div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <h3>Import</h3>
                    <p>Here you can import licenses in bulk. Click here to <a href="#">download sample import file</a>.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 pt-2"><input type="file" name="license_import_file"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><button class="btn btn-primary link-light" type="submit">Import Licenses<i class="fas fa-upload ps-2"></i></button></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
   </div>

</x-layout>

<script>
    $(document).ready(function() {
        $('#dtable').DataTable({
            
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
