<script src="//unpkg.com/alpinejs" defer></script>
@if(session()->has('message'))
{{-- @if(true) --}}
<div  id="notification"
 x-init="test()" 
class="d-flex align-items-center bg-success rounded  text-center "  style="position:absolute;top: 10%;right: 0px;left: 0;margin: auto;height:50px;width: 400px;z-index: 9;min-width: 200px;">
    <div class="d-flex flex-column flex-grow-1 mr-2" >
        <p class="fw-bolder text-white font-size-lg m-0 mr-2 pl-3">
            {{session('message')}}</p>
    </div>
</div>
<script>
    function test(){
      setTimeout(() => {
        
        $('#notification').attr("style", "display: none !important");
        // alert();
      }, 3000);
    }
    </script>
@endif


@if(session()->has('error'))
{{-- @if(true) --}}
<div  id="notification"
 x-init="test()" 
class="d-flex align-items-center bg-success rounded  text-center "  style="position:absolute;top: 10%;right: 0px;left: 0;margin: auto;height:50px;width: 400px;z-index: 9;min-width: 200px;">
    <div class="d-flex flex-column flex-grow-1 mr-2" >
        <p class="fw-bolder text-white font-size-lg m-0 mr-2 pl-3">
            {{session('message')}}</p>
    </div>
</div>
<script>
    function test(){
      setTimeout(() => {
        
        $('#notification').attr("style", "display: none !important");
        // alert();
      }, 3000);
    }
    </script>
@endif