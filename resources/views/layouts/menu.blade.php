@if(!isset($innerLoop))
<ul class="nk-nav nk-nav-right hidden-md-down" data-nav-mobile="#nk-nav-mobile">
    @else
        <ul class="dropdown-menu">
            @endif

            @php
                if (Voyager::translatable($items)) {
                    $items = $items->load('translations');
                }
            @endphp

            @foreach ($items as $item)
                @php
                    $originalItem = $item;
                    if (Voyager::translatable($item)) {
                        $item = $item->translate($options->locale);
                    }

                    $listItemClass = url($item->link()) == url()->current() ? 'active' : null;
                    $linkAttributes =  null;
                    $styles = null;
                    $icon = null;
                    $caret = null;

                    // Background Color or Color
                    if (isset($options->color) && $options->color == true) {
                        $styles = 'color:'.$item->color;
                    }
                    if (isset($options->background) && $options->background == true) {
                        $styles = 'background-color:'.$item->color;
                    }

                    // With Children Attributes
                    if(!$originalItem->children->isEmpty()) {
                        $linkAttributes =  'class="dropdown-toggle" data-toggle="dropdown"';
                        $caret = '<span class="caret"></span>';

                        if(url($item->link()) == url()->current()){
                            $listItemClass = 'dropdown active';
                        }else{
                            $listItemClass = 'dropdown';
                        }
                    }

                    // Set Icon
                    if(isset($options->icon) && $options->icon == true){
                        $icon = '<i class="' . $item->icon_class . '"></i>';
                    }

                @endphp

                <li class="{{ $listItemClass }}">
                    <a href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}" {!! $linkAttributes or '' !!}>
                        {!! $icon !!}
                        <span>{{ $item->title }}</span>
                        {!! $caret !!}
                    </a>
                    @if(!$originalItem->children->isEmpty())
                        @include('layouts.menu', ['items' => $originalItem->children, 'options' => $options, 'innerLoop' => true])
                    @endif
                </li>
            @endforeach

        </ul>

</ul>