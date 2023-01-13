<x-layout>
    <div class="row">
        <div class="col-md-12 d-flex flex-column mx-lg-0 mx-auto">
            <div class="card ">
                <div class="card-header pb-0 text-start">
                    <h4 class="font-weight-bolder">Add New License</h4>
                </div>
                <div class="card-body">
                    <form role="form" id="license-form" action="{{ route('add-license') }}" method="POST">
                        @csrf
                        <div class="row">
                            <label> License Status</label>
                            <div class="roButton">
                                <ul>
                                    <li>
                                        <input type="radio" name="status" value="1">
                                        <span class="tickcheck">
                                            <i class="ni ni-check-bold"></i>
                                        </span>
                                    </li>

                                    <li>
                                        <input type="radio" checked name="status" value="0">
                                        <span class="crosscheck">
                                            <i class="ni ni-fat-remove"></i>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Customer Name</label>
                                    <input type="text" id="customer_name" name="customer_name" class="form-control form-control-lg @error('customer_name') is-invalid @enderror"
                                        placeholder="Customer Name" aria-label="Password">
                                        @error('customer_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                    <label id="customer_name_error" style="display:none;color:red">Customer Name Is
                                        Required</label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Customer Email</label>

                                    <input type="text" id="customer_email" name="customer_email" class="form-control form-control-lg @error('customer_email') is-invalid @enderror"
                                        placeholder="Customer Email" aria-label="Email">
                                        @error('customer_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                        <label id="customer_email_error" style="display:none;color:red">Customer Email Is
                                        Required</label>

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>License Key</label>
                                    <input type="text" id="license_key" name="license_key" class="form-control form-control-lg @error('license_key') is-invalid @enderror"
                                        placeholder="License Key" aria-label="Password">
                                        @error('license_key')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label id="license_key_error" style="display:none;color:red">License Key Is Required</label>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Allowed Activities</label>

                                    <input type="number" name="activity" id="activity" min="1"
                                        class="form-control form-control-lg @error('activity') is-invalid @enderror" placeholder="Allowed Activities"
                                        aria-label="Password">
                                        @error('activity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label id="activity_error" style="display:none;color:red">Allowed Activity Is Required</label>
                                </div>

                            </div>
                        </div>


                        <div class="mb-3">
                            <label>Expiry Date</label>

                            <input type="date" id="expiry_date" name="expiry_date" class="form-control form-control-lg @error('expiry_date') is-invalid @enderror"
                                min="{{ date('Y-m-d') }}" placeholder="Expiry Date" aria-label="Password">
                                @error('expiry_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label id="expiry_date_error" style="display:none;color:red">Expiry Date Is Required</label>

                        </div>
                        <div class="mb-3">
                            <label>Note</label>
                            <textarea placeholder="Notes" name="note" class="form-control form-control-lg"></textarea>
                        </div>


                        <div class="text-center">
                            <button type="button" id="btn"
                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Add License
                                in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>
<script>
    $('#btn').click(function() {
        let flag = 0;
        $customer_name = $('#customer_name').val();
        $customer_email = $('#customer_email').val();
        $license_key = $('#license_key').val();
        $activity = $('#activity').val();
        $expiry_date = $('#expiry_date').val();

        if ($customer_name == '') {
            $('#customer_name_error').show();
            flag = 1;
        } else {
            $('#customer_name_error').hide();

        }

        if ($customer_email == '') {
            $('#customer_email_error').show();
            flag = 1;
        } else {
            $('#customer_email_error').hide();
        }

        if ($license_key == '') {
            $('#license_key_error').show();
            flag = 1;
        } else {
            $('#license_key_error').hide();
        }

        if ($activity == '') {
            $('#activity_error').show();
            flag = 1;
        } else {
            $('#activity_error').hide();
        }

        if ($expiry_date == '') {
            $('#expiry_date_error').show();
            flag = 1;
        } else {
            $('#expiry_date_error').hide();
        }

        if (flag == 1) {
            return;
        }


$('#license-form').submit();


    })
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
