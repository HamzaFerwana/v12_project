@extends('admin.master')

@section('title', 'All Users')


@section('content')
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">All Users</h1>
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
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>

                        </thead>

                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->created_at->format('F d, Y') }}</td>
                                <td>

                                  <form class="d-inline" action="{{ route('admin.freelancers.destroy', $user->id) }}" method="POST">
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
