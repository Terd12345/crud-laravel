@extends('layouts.app')

@section('content')

<br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('action'))
                    <script>
                        @if (session('action') == 'add')
                            Swal.fire({
                                icon: 'success',
                                title: 'Category Added!',
                                text: 'The new category has been successfully added.',
                                timer: 2000,
                                showConfirmButton: false,
                                background: '#e6ffe6',
                            });
                        @elseif (session('action') == 'update')
                            Swal.fire({
                                icon: 'success',
                                title: 'Category Updated!',
                                text: 'The category details have been successfully updated.',
                                timer: 2000,
                                showConfirmButton: false,
                                background: '#e6f7ff',
                            });
                        @elseif (session('action') == 'delete')
                            Swal.fire({
                                icon: 'warning',
                                title: 'Category Deleted!',
                                text: 'The category has been successfully deleted.',
                                timer: 2000,
                                showConfirmButton: false,
                                background: '#fff3e6',
                            });
                        @endif
                    </script>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Record List
                            
                            {{-- <input type="text" id="searchBar" class="form-control w-50 float-end" placeholder="Search Categories..."> --}}
                            <a href="{{ url('category/create') }}" class="btn btn-primary float-end">Add New List</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>{{ $category->status == 1 ? 'Visible' : 'Hidden' }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success">Edit</a>
                                            <a href="{{ route('category.show', $category->id) }}" class="btn btn-primary">Show</a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline deleteForm">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger deleteButton">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-4">
                    {{ $categories->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.deleteButton').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>

@endsection
