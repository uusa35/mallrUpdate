<div class="container-indent wrapper-social-icon">
    <div class="container">
        <ul class="tt-social-icon justify-content-center">
            @if($element->user->facebook)
                <li><a class="icon-g-64" href="{{ $element->user->facebook }}"></a></li>
            @endif
            @if($element->twitter)
                <li><a class="icon-g-66" href="http://www.twitter.com/"></a></li>
            @endif
            @if($element->instagram)
                <li><a class="icon-g-70" href="{{ $lement->instagram }}"></a></li>
            @endif
            @if($element->user->youtube)
                <li><a href="{{ $element->youtube }}"><i class="fa fa-fw fa-youtube"></i></a></li>
            @endif
            @if($element->user->whatsapp)
                <li><a href="{{ $element->whatsapp }}"><i class="fa fa-fw fa-whatsapp"></i></a></li>
            @endif
        </ul>
    </div>
</div>
