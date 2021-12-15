@extends('layouts.dashboard')

@section('dashboard')
    @push('breadcrumb')
        @include('admin.includes.breadcrumbs', ['parent' => 'Categories'])
    @endpush
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Categories</h4>

                    <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary float-right">
                        <i class="fa fa-plus color-muted"></i> Add category
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col" class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>
                                        <div class="image-wrapper text-center">
                                            <img class="rounded" src="{{ asset("$category->image_path") }}" width="80"
                                                 height="80" alt="">
                                        </div>
                                    </td>
                                    <td>{{ $category->title }}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                               class="btn btn-success">
                                                <i class="fa fa-pencil color-muted"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteCategory_{{$category->id}}">
                                                <i class="fa fa-trash color-danger"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                    <div class="modal fade" id="deleteCategory_{{$category->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Delete category: {{ $category->title }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <p>Are you sure you want to delete this record?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3">No records found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
