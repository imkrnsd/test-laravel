<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
        <div class="page-title d-flex flex-column me-3">
            <h1 class="d-flex text-white fw-bold my-1 fs-3">{{ $title ?? 'No Title' }}</h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                @foreach ($breadcrumbs ?? [] as $key => $breadcrumb)
                    <li class="breadcrumb-item text-white opacity-75">
                        <a href="{{ $breadcrumb[1] }}" class="text-white text-hover-primary">{{ $breadcrumb[0] }}</a>
                    </li>

                    @if ($key === array_key_last($breadcrumbs))
                        &nbsp;
                    @else
                        <li class="breadcrumb-item">
                            <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
