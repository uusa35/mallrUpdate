@if($element->items->isNotEmpty())
    <div class="col-lg-12">
        <div style="display: flex; flex : 1; justify-content: center; align-items: center; flex-wrap: wrap; margin-top: 1rem; margin-bottom: 1rem;">
            @foreach($element->items as $item)
                <div class="text-center"
                     style="flex: 1; padding : 0.5rem; margin:0.2rem; max-width: 100px; border: 0.3px solid lightgrey; border-radius: 5px; justify-content: center; align-items: center; flex-direction: column; flex-wrap: nowrap">
                    <div>
                        <img class="text-center" style="width: 75px; height: 75px; max-width: 75px;"
                             src="{{ $item->categoryGroup->getImageThumbLinkAttribute() }}"
                             alt="{{ $item->categoryGroup->name  }}">
                    </div>
                    <div style="align-items: center; justify-content: center; font-size: x-small; align-self: center; padding-top: 0.2rem;">
                        <span class="text-center">{{ str_limit($item->categoryGroup->name,15,'')  }}</span>
                    </div>
                    <div>
                        <span class="text-center">{{ $item->value  }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
