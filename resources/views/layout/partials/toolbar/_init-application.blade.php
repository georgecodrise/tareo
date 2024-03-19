@if (count($breadcrumbs))
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-10">
        <div id="kt_app_toolbar_container"
            class="app-container  container-fluid d-flex flex-stack flex-wrap flex-md-nowrap ">
            <div data-kt-swapper="true" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}"
                data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_toolbar_container'}"
                class="page-title d-flex flex-column justify-content-center flex-wrap me-3 mb-5 mb-lg-0">
                @if (count($breadcrumbs) > 1)
                    <h1 class="page-heading d-flex text-dark fw-bold fs-2 flex-column justify-content-center my-0">
                        {{ end($breadcrumbs)->name }}
                    </h1>
                @endif

                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if (!$loop->first)
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                        @endif

                        <li class="breadcrumb-item">
                            @isset($breadcrumb->route)
                                <a href="{{ $breadcrumb->route }}" class="text-muted text-hover-primary">
                                    {{ $breadcrumb->name }}
                                </a>
                            @else
                                <span class="fw-bold">
                                    {{ $breadcrumb->name }}
                                </span>
                            @endisset
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="d-flex align-items-center overflow-auto">
            </div>
        </div>
    </div>
@endif
