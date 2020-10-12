@if($element->items->isNotEmpty())
    <div class="col-lg-12">
        <div style="display: flex; flex : 1; justify-content: center; align-items: center; flex-wrap: wrap; margin : 1rem">
            @foreach($element->items as $item)
                <div class="text-center" style="padding : 0.5rem">
                    <img class="img-xs text-center" src="{{ $item->categoryGroup->getImageThumbLinkAttribute() }}"
                         alt="{{ $item->categoryGroup->name  }}">
                    <div>
                        <div class="col-lg-12">
                            <span class="text-center">{{ $item->categoryGroup->name  }}</span>
                        </div>
                        <div class="col-lg-12">
                        <span class="text-center">{{ $item->value  }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
