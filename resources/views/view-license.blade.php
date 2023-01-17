<x-layout>
    <div class="row">
        <div class="col-md-12 d-flex flex-column mx-lg-0 mx-auto">
            <div class="card ">
           
                <div class="card-header pb-0 text-start d-flex justify-content-between">
                    <h4 class="font-weight-bolder">View License  </h4>      <a href="{{route('show-licenses')}}" class="btn btn-info ">Back</a> 
                </div>
                <div class="card-body">
                    <form role="form" id="license-form" action="/license/{{$license->id}}/update" method="POST">
                        @csrf
                        <div class="row">
                            <label> License Status</label>
                            <div class="roButton">
                                <ul>
                                    <li>
                                        <input type="radio"  @if($license->status==1) checked @else  @endif value="1">
                                        <span class="tickcheck">
                                            <i class="ni ni-check-bold"></i>
                                        </span>
                                    </li>

                                    <li>
                                        <input type="radio"   @if($license->status==0) checked @else  @endif value="0">
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
                                    <label  class="form-control form-control-lg">{{$license->customer_name}}</label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Customer Email</label>

                                    <label  class="form-control form-control-lg">{{$license->customer_email}}</label>
   
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>License Key</label>
                                    <label  class="form-control form-control-lg">{{$license->license_key}}</label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Allowed Activities</label>
                                    <label  class="form-control form-control-lg">{{$license->allowed_activities}}</label>
   
                                </div>

                            </div>
                        </div>


                        <div class="mb-3">
                            <label>Expiry Date</label>
                            <label  class="form-control form-control-lg">{{$license->expiry_date}}</label>
                        </div>
                        <div class="mb-3">
                            <label>Note</label>
                            <textarea placeholder="Notes" name="note" class="form-control form-control-lg" disabled>{{$license->note}}</textarea>
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
