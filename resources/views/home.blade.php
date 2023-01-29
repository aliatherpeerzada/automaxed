<x-layout>
    <h3 class="text-dark mb-4"><i class="fas fa-key px-2 text-primary"></i>Add New License</h3>
    <div class="row mb-3">
        <div class="col-lg-8 col-xl-12">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">License Settings</p>
                        </div>
                        <div class="card-body">
                            <form action="{{route('add-license')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xxl-12">
                                        <div class="form-check form-switch mb-2" style="font-size: 1.2rem;"><input class="form-check-input" type="checkbox" id="license_switch" checked="" name="license_status"><label class="form-check-label text-success" for="license_switch" id="heading"><strong><span id="switch-text">the license is enabled</span>,<span id="expired"> it is not expired </span>,  it has been used on 0 out of <span id="usage">1</span> computers</strong></label></div>
                                        <p class="mb-1">If the license is enabled the compiled bot can be used with it.&nbsp;If the license is disabled or expired the compiled bot stops working.&nbsp;You can enable and disable licenses anytime. Keep in mind that also the expiry date of the license must be in the future for a license to be valid</p>
                                        <hr>
                                    </div>
                                    <div class="col-xl-4 col-xxl-4">
                                        <div class="mb-3">
                                            <label class="form-label text-primary" for="license_product_name"><strong>Product Name</strong></label>
                                            <input class="form-control  @error('license_product_name') is-invalid @enderror" type="text"  placeholder="Product Name" name="license_product_name" value="{{ old('license_product_name') }}" required>
                                            @error('license_product_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                        </div>
                                        </div>
                                    <div class="col-xl-4 col-xxl-4">
                                        <div class="mb-3">
                                            <label class="form-label text-primary" for="license_expiry_date"><strong>Expiry Date </strong></label>
                                            <input class="form-control" value="<?php echo date('Y-m-d', strtotime('tomorrow')); ?>" id="date"  type="date" name="license_expiry_date" required></div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-4">
                                        <div class="mb-3">
                                            <label class="form-label text-primary" for="license_allowed_activations"><strong>Allowed Activations</strong></label>
                                            <input class="form-control" type="number" value="1" name="license_allowed_activations" id="allowed" min="1" max="1000000" required></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label text-primary" for="license_key"><strong>License Key</strong> <button type="button" class='btn btn-outline-info' id="generate"><i class="fas fa-sync-alt"></i></button>   </label>
                                            <input class="form-control" type="text" id="license-key" placeholder="License Key" value="{{ old('license_key') }}" name="license_key" required="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-6">
                                        <div class="mb-3">
                                            <label class="form-label text-primary" for="license_customer_name"><strong>Customer Name</strong></label>
                                            <input class="form-control" type="text" id="username-4" value="{{ old('license_customer_name') }}" placeholder="Customer Name" name="license_customer_name" required></div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-6">
                                        <div class="mb-3"><label class="form-label text-primary" for="license_customer_email"><strong>Customer Email</strong></label><span class="p-1 small">(optional)</span>
                                            <input class="form-control" type="email" id="email" placeholder="Customer Email" value="{{ old('license_customer_email') }}" name="license_customer_email"></div>
                                    </div>
                                </div>
                                <div class="mb-3"><label class="form-label text-primary" for="license_notes"><strong>Notes</strong></label><span class="p-1 small">(optional)</span>
                                    <textarea class="form-control" id="signature" rows="5" name="license_notes" placeholder="Notes">{{ old('license_notes') }}</textarea></div>
                                <div class="mb-3"><button class="btn btn-primary" type="submit">Create and Save License</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
    $(document).ready(function(){

        $("#allowed").attr({
   "min" : 1
});

$('#allowed').change(function(){
    $('#usage').html($('#allowed').val());
});

$('#allowed').keyup(function(){
    $('#usage').html($('#allowed').val());
});




      $("#generate").click(function(){
  var xhr=   $.ajax({
        type: "get",
        url: "/generateuuid",
        success: function (uuid) {
//            $('#chatroom').empty();
            $('#license-key').val(uuid);
        }
    });

    });
    

$('#license_switch').click(function() {
error();
});


$('#date').change(function() {
   
error();

});


function error(){

    var date = new Date($('#date').val()) ;
    var today = new Date();
var error1=0;
var error2=0;
var error3=0;

if(date > today)
{
    $('#expired').html("it is not expired");
error1=0;
  }else{
$('#expired').html("it is expired");
error1=1;
}

if ($('#license_switch').is(':checked')) {
$('#switch-text').html("the license is enabled");
error2=0;

  }else{
$('#switch-text').html("the license is disabled");
error2=1;
}


if(error1==1 || error2==1 || error3==1){
    $('#heading').removeClass('text-success');
        $('#heading').addClass('text-danger');
    }else{
    if($('#heading').hasClass('text-danger')){
    $('#heading').removeClass('text-danger'); 
          $('#heading').addClass('text-success');

}

}


}

});



    </script>