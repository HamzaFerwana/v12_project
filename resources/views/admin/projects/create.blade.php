@extends('admin.master')

@section('title', 'Create Projects')

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.0.1/tinymce.min.js"></script>
<script>
 tinymce.init({
          selector: 'textarea',
	  plugins: ['code']
        });
</script>
{{-- <script>
    let category = document.getElementById('category');
    let old = '{{ old("category") }}';
    category.value = old;
</script> --}}
@stop

@section('content')
 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Create a New Project</h1>

 <form action="{{ route('admin.projects.store') }}" method="POST">
@csrf
{{--
description	status	budget	time --}}

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
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="description_en">English Description</label>
            <textarea name="description_en" placeholder="English Description">{{ old('description_en') }}</textarea>
            @error('description_en')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>



    <div class="col-md-6">
        <div class="mb-3">
            <label for="description_ar">Arabic Description</label>
            <textarea name="description_ar" placeholder="Arabic Description">{{ old('description_ar') }}</textarea>
            @error('description_ar')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="budget">Budget</label>
            <input type="text" name="budget" id="budget" class="form-control @error('budget')
                is-invalid
            @enderror" placeholder="Budget" value="{{ old('budget') }}">
            @error('budget')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="time">Time</label>
            <input type="text" name="time" id="time" class="form-control @error('time')
                is-invalid
            @enderror" placeholder="Time" value="{{ old('time') }}">
            @error('time')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

    </div>
    {{-- {{ old('category') == $category->id  ? 'selected' : '' }} --}}
<select name="category" id="category" class="form-control mb-3 @error('category')
        is-invalid
@enderror" >
    <option value="" selected disabled hidden> -- Selcet Category --</option>
  @foreach ($categories as $category)
   <option value="{{ $category->id }}"   {{ old('category') == $category->id  ? 'selected' : '' }}>{{ $category->trans_name }}</option>
  @endforeach
</select>
@error('category')
<small class="text-danger">{{ $errors->first('category') }}</small>
@enderror

</div>
<button class="btn btn-success"><i class="fas fa-save"></i> {{ __('admin.add') }}</button>


</form>



@endsection
