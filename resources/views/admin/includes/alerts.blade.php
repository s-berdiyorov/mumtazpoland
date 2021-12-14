@if ($message = Session::get('success'))
    <div class="alert alert-success mb-4">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
            <span>
                <i class="mdi mdi-close"></i>
            </span>
        </button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger mb-4">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
            <span>
                <i class="mdi mdi-close"></i>
            </span>
        </button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning mb-4">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
            <span>
                <i class="mdi mdi-close"></i>
            </span>
        </button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info mb-4">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
            <span>
                <i class="mdi mdi-close"></i>
            </span>
        </button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
            <span>
                <i class="mdi mdi-close"></i>
            </span>
        </button>
        Please check the form below for errors
    </div>
@endif
