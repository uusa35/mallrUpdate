<div class="container-indent wrapper-social-icon">
    <div class="container">
        <ul class="tt-social-icon justify-content-center">
            @if($element->user->facebook)
                <li><a class="icon-g-64" href="{{ $element->user->facebook }}"></a></li>
            @endif
            @if($element->twitter)
                <li><a class="icon-g-66" href="{{ $element->user->twitter }}"></a></li>
            @endif
            @if($element->instagram)
                <li><a class="icon-g-70" href="{{ $lement->user->instagram }}"></a></li>
            @endif
            @if($element->user->youtube)
                <li><a href="{{ $element->user->youtube }}"><i class="fa fa-fw fa-youtube"></i></a></li>
            @endif
            @if($element->user->whatsapp)
                <li><a href="https://api.whatsapp.com/send?phone={{ $element->user->whatsapp }}&text={{ $element->name }}"><i class="fa fa-fw fa-whatsapp"></i></a></li>
            @endif
        </ul>
    </div>
</div>
