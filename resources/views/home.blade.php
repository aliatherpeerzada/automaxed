<x-layout >
    <div class="row">
        <div class="col-md-12 d-flex flex-column mx-lg-0 mx-auto">
            <div class="card ">
                <div class="card-header pb-0 text-start">
                    <h4 class="font-weight-bolder">Add New License</h4>
                </div>
                <div class="card-body">
                    <form role="form" action="{{route('add-license')}}" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Customer Name</label>
                                    <input type="text" id="customer_name" class="form-control form-control-lg"
                                        placeholder="Customer Name" aria-label="Password">
                                        <label id="customer_name_error" style="color:red">Customer Name Is Required</label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Customer Email</label>

                                    <input type="text" id="customer_email" class="form-control form-control-lg"
                                        placeholder="Customer Email" aria-label="Email">
                                        <label id="customer_email_error" style="color:red">Customer Email Is Required</label>
                           
                                    </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>License Key</label>
                                    <input type="text" id="license_key" class="form-control form-control-lg" placeholder="License Key"
                                        aria-label="Password">
                                                     <label id="license_key_error" style="color:red">License Key Is Required</label>
                           
                                </div>
        
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Allowed Activities</label>
        
                                    <input type="number" min="1" class="form-control form-control-lg" placeholder="Allowed Activities"
                                        aria-label="Password">
                                </div>
                                
                            </div>
                        </div>


                        <div class="mb-3">
                            <label>Expiry Date</label>

                            <input type="date" id="expiry_date" class="form-control form-control-lg" min="{{date('Y-m-d')}}" placeholder="Expiry Date"
                                aria-label="Password">
                                <label id="expiry_date_error" style="color:red">Expiry Date Is Required</label>
                           
                        </div>
                        <div class="mb-3">
                            <label>Note</label>
                            <textarea placeholder="Notes" class="form-control form-control-lg" ></textarea>
                        </div>


                        <div class="text-center">
                            <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Add License
                                in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>