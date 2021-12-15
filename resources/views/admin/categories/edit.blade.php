@extends('layouts.dashboard')

@section('dashboard')
    @push('breadcrumb')
        @include('admin.includes.breadcrumbs', ['parent' => 'Categories', 'child' => 'Edit category', 'route' => 'categories'])
    @endpush
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update category</h4>
                </div>

                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="card-body">
                        <div class="row">
                            @foreach(config('app.languages') as $key => $language)
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label for="title[{{ $key }}]">Title ({{ $language }})</label>
                                        <input type="text"
                                               class="form-control input-default @error('title.'.$key) is-invalid @enderror"
                                               id="title[{{ $key }}]" placeholder="Title ({{ $language }})"
                                               name="title[{{ $key }}]"
                                               value="{{ $category->getTranslation('title', $key) }}">
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
                                               name="image" value="{{ $category->image }}">
                                        <label class="custom-file-label">{{ $category->image }}</label>
                                    </div>
                                </div>
                                @error('image')
                                <span class="invalid-feedback d-block mt-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="card-body">--}}
                    {{--                        <div class="row">--}}
                    {{--                            <div class="col-lg-6 col-12">--}}
                    {{--                                <div class="form-group">--}}
                    {{--                                    <label for="title">Title</label>--}}
                    {{--                                    <input type="text"--}}
                    {{--                                           class="form-control input-default @error('title') is-invalid @enderror"--}}
                    {{--                                           id="title" name="title"--}}
                    {{--                                           placeholder="Title" value="{{ $category->title }}">--}}
                    {{--                                    @error('title')--}}
                    {{--                                    <span class="invalid-feedback" role="alert">--}}
                    {{--                                        <strong>{{ $message }}</strong>--}}
                    {{--                                    </span>--}}
                    {{--                                    @enderror--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="col-lg-6 col-12">--}}
                    {{--                                <label for="image">Image</label>--}}
                    {{--                                <div class="input-group custom_file_input">--}}
                    {{--                                    <div class="custom-file">--}}
                    {{--                                        <input type="file" class="custom-file-input" value="{{ $category->image }}">--}}
                    {{--                                        <label class="custom-file-label">Choose file</label>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
