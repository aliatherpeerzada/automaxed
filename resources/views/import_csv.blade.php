<x-layout>
<div class="mt-5">
    <form action="{{ route('import-csv') }}"   class=" mt-5  " method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" style="margin-top:100px !important" class=" form-control @error('file') is-invalid @enderror">
        @error('file')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        <div class="text-center">
        <button type="submit" class="btn mt-2 btn-primary">Upload</button>
        </div> </form>
        <div class="text-center">
            <a href="{{URL::asset('Automaxed.csv')}}" class="btn mt-2 btn-primary" download>Download Sample CSV</a>
            </div>
</div>
</x-layout>