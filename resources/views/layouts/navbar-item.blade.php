@php
    $have_sub_menu = count($item['children']);
    $is_first = $item['parent_id'] == 0 ? true : false;
    
    $menu_placement = $is_first ? 'bottom-start' : 'right-start';
    $menu_accordion = $is_first ? 'menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2' : 'menu-lg-down-accordion';
@endphp

<div @if ($have_sub_menu) data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
    data-kt-menu-placement="{{ $menu_placement }}" @endif
    class="menu-item {{ $menu_accordion }}">

    <a class="menu-link py-3" href="@if ($have_sub_menu) # @else {{ route($item['route']) }} @endif">
        <span class="menu-title">{{ $item['title'] }}</span>

        @if ($have_sub_menu)
            <span class="menu-arrow"></span>
        @endif
    </a>

    @if ($have_sub_menu)
        <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
            @foreach ($item['children'] as $child_item)
                @include('layouts.navbar-item', ['item' => $child_item])
            @endforeach
        </div>
    @endif
</div>
