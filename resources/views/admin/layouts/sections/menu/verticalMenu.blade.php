<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="{{url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
        @include('_partials.macros',["width"=>25,"withbg"=>'#159E46'])
      </span>
      <span class="app-brand-text menu-text fw-bold ms-2">SSPL</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    @foreach ($menuData[0]->menu as $menu)

    {{-- adding active and open class if child is active --}}

    {{-- menu headers --}}
    @if (isset($menu->menuHeader))
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">{{ $menu->menuHeader }}</span>
    </li>

    @else

    {{-- active menu method --}}
    @php
    $activeClass = null;
    $currentRouteName = Route::currentRouteName();

    if ($currentRouteName === $menu->slug) {
        $activeClass = 'active';
    }
    elseif (gettype($menu->slug) === 'array') {
        foreach($menu->slug as $slug){
            if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
                $activeClass = 'active open';
            }
        }
    }
    elseif (isset($menu->submenu)) {
        if (gettype($menu->slug) === 'array') {
            foreach($menu->slug as $slug){
                if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
                    $activeClass = 'active open';
                }
            }
        }
        else{
            if (str_contains($currentRouteName,$menu->slug) and strpos($currentRouteName,$menu->slug) === 0) {
                $activeClass = 'active open';
            }
        }

    }
    @endphp

    {{-- main menu --}}
        @if (auth()->user()->hasRole('Employee') && in_array($menu->name,['Dashboard','Profile','Visit','Vendor','Order']))

            <li class="menu-item {{$activeClass}}">
            <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}" class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
                @isset($menu->icon)
                <i class="{{ $menu->icon }}"></i>
                @endisset
                <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
            </a>
            </li>
        @elseif (auth()->user()->hasRole('Admin'))
            <li class="menu-item {{$activeClass}}">
                <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}" class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
                    @isset($menu->icon)
                    <i class="{{ $menu->icon }}"></i>
                    @endisset
                    <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
                </a>
                @isset($menu->submenu)
                    @include('admin.layouts.sections.menu.submenu',['menu' => $menu->submenu])
                @endisset
            </li>
        @endif

    @endif
    @endforeach
  </ul>

</aside>
