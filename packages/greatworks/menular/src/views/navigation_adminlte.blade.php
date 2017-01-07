@foreach ($menular['level1'] as $level1)
  @if ($level1->has_child)

    <li class="treeview">
      <a href="#">
        <i class="{{ $level1->icon_class }}"></i> <span>{{ $level1->name }}</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">

        @foreach($menular['level2'] as $level2)
          @if ($level2->parent_id == $level1->id)
            @if ($level2->has_child)

              <li>
                <a href="#"><i class="{{ $level2->icon_class }}"></i> {{ $level2->name }}
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">

                @foreach($menular['level3'] as $level3)
                    @if ($level3->parent_id == $level2->id)

                      <li>
                        <a href="{{ $level3->url }}">
                          <i class="{{ $level3->icon_class }}"></i> {{ $level3->name }}
                        </a>
                      </li>

                    @endif
                @endforeach

                </ul>
              </li>

            @else

              <li>
                <a href="{{ $level2->url }}">
                  <i class="{{ $level2->icon_class }}"></i> {{ $level2->name }}
                </a>
              </li>

            @endif
          @endif
        @endforeach

      </ul>
    </li>

  @else

    <li>
      <a href="{{ $level1->url }}">
        <i class="{{ $level1->icon_class }}"></i> <span>{{ $level1->name }}</span>
      </a>
    </li>

  @endif
@endforeach