@extends('admin.master')

@section('title', 'Create Categories')


@section('content')
 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Create a New Category</h1>

 <form action="{{ route('admin.categories.store') }}" method="POST">
@csrf

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name_en">English Name</label>
            <input type="text" name="name_en" id="name_en" class="form-control @error('name_en')
                is-invalid
            @enderror" placeholder="Name in English" value="{{ old('name_en') }}">
            @error('name_en')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="name_ar">Arabic Name</label>
            <input type="text" name="name_ar" id="name_ar" class="form-control @error('name_ar')
                is-invalid
            @enderror" placeholder="الاسم بالعربية" value="{{ old('name_ar') }}">
            @error('name_ar')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

    </div>
</div>
<button class="btn btn-success"><i class="fas fa-save"></i> {{ __('admin.add') }}</button>


</form>



@endsection
