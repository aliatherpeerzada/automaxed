@if (session()->has('message'))
    {{-- @if (true) --}}


    <div id="notification" x-init="test()">
<input type="hidden" id="hidden_message" value="{{ session('message') }}" />                
    </div>
    <script>
        function test() {
            Toastify({
  text: $('#hidden_message').val(),
  duration: 3000,
  newWindow: true,
  close: true,
  gravity: "bottom", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
 // stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  },
  onClick: function(){} // Callback after click
}).showToast();
         

         
        }
    
    </script>

    
@endif

