<x-layout>
@php
// dd($license);

$error1=0;
$error2=0;
$error3=0;
$result=0;
$expiry = date('Y-m-d', strtotime($license->license_expiry_date));
$today=date("Y-m-d");
$expire_text='it is not expired';
$activated_text="the license is enabled";
$allowed=$license->license_allowed_activations;
$used=$license->license_used_activations;
if($license->license_status!=1){
    $activated_text="the license is disabled";
    $error1=1;
}
if ($expiry <= $today){
    $expire_text='it is expired';
$error2=1;
}

if((int)$used>=(int)$allowed){
    $error3=1;
}

if($error1==1||$error2==1||$error3==1)
{
    $result=1;
}

@endphp
    <h3 class="text-dark mb-4"><i class="fas fa-key px-2 text-primary"></i>Update License</h3>
    <div class="row mb-3">
        <div class="col-lg-8 col-xl-12">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">License Settings</p>
                        </div>
                        <div class="card-body">
                            <form action="/license/{{$license->id}}/update" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xxl-12">
                                        <div class="form-check form-switch mb-2" style="font-size: 1.2rem;">
                                        <input class="form-check-input" type="checkbox" id="license_switch" @if($license->license_status==1) checked  @endif  name="license_status">
                                        <label class="form-check-label @if($result==1)text-danger @else text-success @endif" for="license_switch" id="heading"><strong><span id="switch-text">{{$activated_text}}</span>,<span id="expired"> {{$expire_text}} </span>,  it has been used on <span class='used-activation'>{{$used}}</span> out of <span id="usage">{{$allowed}}</span> computers</strong></label></div>
                                        
                                        <p class="mb-1">If the license is enabled the compiled bot can be used with it.&nbsp;If the license is disabled or expired the compiled bot stops working.&nbsp;You can enable and disable licenses anytime. Keep in mind that also the expiry date of the license must be in the future for a license to be valid</p>
                                       
                                       
                                        <hr>
                                    </div>
                                    <div class="col-xl-4 col-xxl-4">
                                        <div class="mb-3">
                                            <label class="form-label text-primary" for="license_product_name"><strong>Product Name</strong></label>
                                            <input class="form-control  @error('license_product_name') is-invalid @enderror" type="text"  placeholder="Product Name" name="license_product_name" value="{{ $license->license_product_name }}" required>
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
                                            <input class="form-control" value="<?php echo date('Y-m-d', strtotime($license->license_expiry_date)); ?>" id="date"  type="date" name="license_expiry_date" required></div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-4">
                                        <div class="mb-3">
                                            <label class="form-label text-primary" for="license_allowed_activations"><strong>Allowed Activations</strong></label>
                                            <input class="form-control" type="number" value="{{$license->license_allowed_activations}}" name="license_allowed_activations" id="allowed" min="1" max="1000000" required></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label text-primary" for="license_key"><strong>License Key</strong> 
                                                {{-- <button type="button" class='btn btn-outline-info' id="generate"><i class="fas fa-sync-alt"></i></button>  --}}
                                              </label>
                                            <input class="form-control" type="text" id="license-key" placeholder="License Key" value="{{$license->license_key}}" name="license_key" required="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label text-primary" ><strong>Used Allowed Activations</strong></label><span class="p-1 small">(<a href="#" onclick="reset({{$license->id}})" >click to reset</a>)</span>
                                        <input disabled class="form-control used" id="used_activation_input" value="{{$license->license_used_activations}}"  ></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-6">
                                        <div class="mb-3">
                                            <label class="form-label text-primary" for="license_customer_name"><strong>Customer Name</strong></label>
                                            <input class="form-control" type="text" id="username-4" value="{{ $license->license_customer_name }}" placeholder="Customer Name" name="license_customer_name" required></div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-6">
                                        <div class="mb-3"><label class="form-label text-primary" for="license_customer_email"><strong>Customer Email</strong></label><span class="p-1 small">(optional)</span>
                                            <input class="form-control" type="email" id="email" placeholder="Customer Email" value="{{ $license->license_customer_email }}" name="license_customer_email"></div>
                                    </div>
                                </div>
                                <div class="mb-3"><label class="form-label text-primary" for="license_notes"><strong>Notes</strong></label><span class="p-1 small">(optional)</span>
                                    <textarea class="form-control" id="signature" rows="5" name="license_notes" placeholder="Notes">{{$license->license_notes}}</textarea></div>
                                <div class="mb-3"><button class="btn btn-primary" type="submit">Update License</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
        function reset(id){
           var allowed= parseInt($('#usage').html());
           var used=parseInt($('.used-activation').html());

            if($('#used_activation_input').val() != 0)
    { 
        $.ajax({
        type: "get",
        url: "/reset-activation/"+id,
        success: function (data) {
if(allowed==used){
    
    $('#heading').removeClass('text-danger'); 
    $('#heading').addClass('text-success');   
}
            $('#used_activation_input').val(0);
            $('.used-activation').html(0);

        }
    });
        
        
    }

}

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