@extends('admin.master')

@section('title', 'All Categories')


@section('content')
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">All Categories</h1>
                    @if (session('msg'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <table class="table table-hover table-bordered table-striped">
                        <thead>

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>

                        </thead>

                        <tbody>
                            @forelse ($categories as $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->trans_name }}</td>
                                <td>{{ $cat->slug }}</td>
                                {{-- <td>{{ $cat->created_at->diffforhumans() }}</td> --}}
                                <td>{{ $cat->created_at->format('F d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                  <form class="d-inline" action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST">
                                    @method('delete') @csrf
                                    <button onclick="confirm('Are You Sure?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No Data Found</td>
                            </tr>
                            @endforelse

                        </tbody>




                    </table>
@endsection


@section('scripts')

<script>

setTimeout(() => {

    $('.alert').fadeOut();

}, 3000);

</script>

@stop
