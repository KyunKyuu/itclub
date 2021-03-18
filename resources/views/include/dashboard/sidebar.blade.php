
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/">ITCLUB </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">ITC</a>
          </div>
          <ul class="sidebar-menu">
              @foreach (Section() as $section)
                <li class="menu-header">{{$section->name}}</li>
                @foreach (Menu($section->id) as $menu)
                    @if ($menu->type == 'dynamic')
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="{{$menu->icon}}"></i><span>{{$menu->name}}</span></a>
                            <ul class="dropdown-menu">
                                @foreach (Submenu($menu->id) as $submenu)
                                    <li><a class="nav-link text-capitalize" href="{{$submenu->url}}" >{{$submenu->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li>
                            <a class="nav-link" href="{{$menu->url}}"><i class="{{$menu->icon}}"></i> <span>{{$menu->name}}</span></a>
                        </li>
                    @endif
                @endforeach
              @endforeach
          </ul>
        </aside>
      </div>
