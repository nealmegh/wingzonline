
<ul class="nav navbar-nav">
    @foreach ($menu as $item)
        @if (1 > count($item->childs))
            <li id="{{ $item->id }}">
                <a href="{!! $item->link !!}">
                    {!! $item->title !!}
                </a>
            </li>
        @else
            <li id="{{ $item->id }}" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {!! $item->title !!} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    @unless ($item->link == '#' && ! empty($item->link))
                        <li>
                            <a href="{!! $item->link !!}">
                                {!! $item->title !!}
                            </a>
                        </li>
                        <li class="divider"></li>
                    @endunless
                    @foreach ($item->childs as $child)
                        <?php $grands = $child->childs; ?>
                        <li class="{!! (! empty($grands) ? "dropdown-submenu" : "normal") !!}">
                            <a href="{!! $child->link !!}">
                                {!! $child->title !!}
                            </a>
                            @if (! empty($child->childs))
                                <ul class="dropdown-menu">
                                    @foreach ($child->childs as $grand)
                                        <li>
                                            <a href="{!! $grand->link !!}">
                                                {!! $grand->title !!}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
    @endforeach
</ul>