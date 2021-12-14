<div class="row page-titles mx-0">
    <div class="col-12 p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Admin Panel</li>
            @if(isset($child))
                <li class="breadcrumb-item"><a href="{{ route('admin.'.$route.'.index') }}">{{ $parent }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $child }}</a></li>
            @else
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $parent }}</a></li>
            @endif
        </ol>
    </div>
</div>
