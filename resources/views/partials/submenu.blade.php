@foreach ($childs as $child)
<div {{ count($child->childs) ? 'data-kt-menu-trigger="click"' : '' }}  class="menu-item{{ count($child->childs) ? 'menu-accordion' : ''}}">
    <span class="menu-link">
        <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
        </span>
        <span class="menu-title">{{ $child->name }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        @include('partials.submenu',['childs' => $child->childs])
    </div>
</div>
@endforeach

