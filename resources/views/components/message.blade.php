@if(session()->has('message'))

<div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show" class="well bg-warning text-white text-center mt-3 rounded">{{session('message')}}</div>



@endif


