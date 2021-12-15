@extends('layouts.dashboard')

@section('dashboard')
    @push('breadcrumb')
        @include('admin.includes.breadcrumbs', ['parent' => 'Categories', 'child' => 'Add category', 'route' => 'categories'])
    @endpush
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Add category</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach(config('app.languages') as $key => $language)
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label for="title[{{ $key }}]">Title ({{ $language }})</label>
                                        <input type="text"
                                               class="form-control input-default @error('title.'.$key) is-invalid @enderror"
                                               id="title[{{ $key }}]" placeholder="Title ({{ $language }})"
                                               name="title[{{ $key }}]" value="{{ old('title.'.$key) }}">
                                        @error('title.'.$key)
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-lg-12 col-12">
                                <label for="image">Image</label>
                                <div class="input-group custom_file_input">
                                    <div class="custom-file">
                                        <input type="file"
                                               class="custom-file-input @error('image') is-invalid @enderror"
                                               name="image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                @error('image')
                                <div class="invalid-feedback d-block mt-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
