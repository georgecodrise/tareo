@php
    $menus = [
        (object) [
            'id' => 1,
            'name' => 'Inicio',
            'icon' => '<i class="ki-duotone ki-home-2 fs-2">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                </i>',
            'position' => 1,
            'route_name' => 'app.index',
            'pattern_name' => null,
            'status' => 1,
            'menus_details' => [],
            'route' => route('app.index'),
            'active' => request()->routeIs('app.index'),
        ],

        (object) [
            'id' => 2,
            'name' => 'Tablas de ayuda',
            'icon' => '<i class="ki-duotone ki-data fs-2">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                    <i class="path3"></i>
                                    <i class="path4"></i>
                                    <i class="path5"></i>
                                </i>',
            'position' => 2,
            'route_name' => null,
            'pattern_name' => 'app.example.*',
            'status' => 1,
            'menus_details' => [
                (object) [
                    'id' => 1,
                    'name' => 'Ejemplos',
                    'route_name' => 'app.example.index',
                    'icon' => null,
                    'position' => 1,
                    'status' => 1,
                    'route' => route('app.example.index'),
                    'active' => request()->routeIs('app.example.index'),
                ],
            ],
            'route' => null,
            'active' => request()->routeIs('app.example.*'),
        ],
    ];
@endphp

@foreach ($menus as $menu)
    @empty(!$menu->menus_details)
        @php
            $menus_details = $menu->menus_details;
        @endphp

        <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if ($menu->active) here show @endif">
            <span class="menu-link">
                <span class="menu-icon">
                    {!! $menu->icon !!}
                </span>
                <span class="menu-title">{{ $menu->name }}</span>
                <span class="menu-arrow"></span>
            </span>

            <div class="menu-sub menu-sub-accordion">
                @foreach ($menus_details as $menu_detail)
                    <div class="menu-item">
                        <a class="menu-link @if ($menu_detail->active) active @endif" href="{{ route($menu_detail->route_name) }}">
                            <span class="menu-bullet">
                                @empty($menu_detail->icon)
                                    <span class="bullet bullet-dot"></span>
                                @else
                                    {!! $menu_detail->icon !!}
                                @endempty
                            </span>
                            <span class="menu-title">
                                {{ $menu_detail->name }}
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="menu-item">
            <a class="menu-link @if ($menu->active) active @endif" href="{{ route($menu->route_name) }}">
                <span class="menu-icon">
                    {!! $menu->icon !!}
                </span>
                <span class="menu-title">
                    {{ $menu->name }}
                </span>
            </a>
        </div>
    @endempty
@endforeach
