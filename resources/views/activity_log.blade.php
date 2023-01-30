<x-layout>
   



{{-- new section --}}

<h3 class="text-dark mb-4"><i class="fas fa-bolt px-2 text-primary"></i>User Activity Log<a class="ps-3" href="#" data-bs-target="#modal-activity-log-export" data-bs-toggle="modal">Click to Export</a></h3>
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Activity Overview</p>
    </div>
    <div class="card-body">
        <div style="min-height:600px" class="table-responsive">
            <table id="dtable" class="table text-center" data-order="[]" style="width:100%">
    
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Product Name</td>
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
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->license_product_name }}</td>
                            <td>{{ $data->license_key }}</td>
                            <td>{{ $data->license_customer_name }}</td>
                            <td>{{ $data->license_customer_email }}</td>
                            <td>{{ $data->license_customer_country }}</td>
    
                            <td>{{ $data->license_customer_ip }}</td>
                            <td>{{ $data->license_hardware_id }}</td>
    
                            <td>{{ $data->license_action_status}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <table>
    
    
    
        </div>
    </div>
</div>
</div>
<div class="modal fade" tabindex="-1" id="modal-activity-log-export" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-bolt pe-2"></i>Export Activity Log</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container p-0">
                    <h3>Export</h3>
                    <p>Here you can export all activities as CSV or XLSX file. Great for excel and other spreadsheet editors.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3"><a class="btn btn-success link-light" href="{{route('activity.excel')}}">Export All Activities as XLSX<i class="fas fa-file-excel ps-2"></i></a></div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><a class="btn btn-success link-light" href="{{route('activity.csv')}}">Export All Activities as CSV<i class="fas fa-file-csv ps-2"></i></a></div>
                        </div>
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