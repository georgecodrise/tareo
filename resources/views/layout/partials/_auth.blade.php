<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
    @include('layout.partials.theme-mode._init-auth')

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img class="mx-auto mw-100 w-150px w-lg-400px mb-10 mb-lg-20"
                        src="{{ asset('assets/media/svg/illustrations/undraw_visionary_technology.svg') }}" alt="" />
                </div>
            </div>

            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                            @yield('content')
                        </div>

                        @include('layout.partials.footer._init-auth')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
