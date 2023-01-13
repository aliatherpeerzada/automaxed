<x-layout>

    <div class="row">
        <div class="col-md-12 d-flex flex-column mx-lg-0 mx-auto">
            <div class="card ">
                <div class="card-header pb-0 text-start">
                    <h4 class="font-weight-bolder">Update Login Crednetials</h4>
                </div>
                <div class="card-body">
                    <form role="form" id="form-setting" action="/update-cred" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>User Name</label>
                                    <input type="text" id="username" name="username" value="{{$data->username}}" class="form-control form-control-lg"
                                        placeholder="User Name" >
                                        <label id="user_name_error" style="color:red;display:none">User Name Is Required</label>
                                </div>

                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg"
                                        placeholder="Fill Password To Change Current Password" >
                                    </div>                               
                                </div>
                                <div class="mb-3">
                                    <label>Secret Phrase</label>
                                    <input type="text" id="secret" value="{{$data->secret}}" name="secret" class="form-control form-control-lg"
                                        placeholder="Secert Phrase" >
                                        <label id="secret_error" style="color:red;display:none">Secret Phrase Is Required</label>
                                    
                             
                                </div>
                     @csrf
                                <div class="text-center">
                                    <button type="button" id="btn" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Update Credentials</button>
                             
                                </div>

                        </div>


                     </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>

<script>
    $('#btn').click(function(){
        
  

   $username=$('#username').val();
   $secret=$('#secret').val();
   if($username==''){
$('#user_name_error').show();
return ;
   }else{
    $('#user_name_error').hide();

}  

if($secret==''){
$('#secret_error').show();
return ;
   }else{
    $('#secret_error').hide();
}

   $('#form-setting').submit();
    })
    </script>