@extends('admin.master')

@section('title', 'Create Categories')


@section('content')
 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Edit a Category</h1>

 <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">

@csrf @method('PUT')



<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name_en">English Name</label>
            <input type="text" name="name_en" id="name_en" class="form-control @error('name_en')
                is-invalid
            @enderror" placeholder="Name in English" value="{{ old('name_en',  $category->en_name) }}">
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
            @enderror" placeholder="الاسم بالعربية" value="{{ old('name_ar', $category->ar_name) }}">
            @error('name_ar')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

    </div>
</div>
<button class="btn btn-success"><i class="fas fa-save"></i> Edit</button>


</form>



@endsection
