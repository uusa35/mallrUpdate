@if($settings->facebook)
    <li>
        <a class="" target="_blank" href="{{ $settings->facebook }}">
            <i class="fa fa-fw fa-facebook"></i>
        </a>
    </li>
@endif
@if($settings->twitter)
    <li>
        <a class="" target="_blank" href="{{ $settings->twitter }}">
            <i class="fa fa-fw fa-twitter"></i>
        </a>
    </li>
@endif
@if($settings->instagram)
    <li>
        <a class="" target="_blank" href="{{ $settings->instagram }}">
            <i class="fa fa-fw fa-instagram"></i>
        </a>
    </li>
@endif
@if($settings->whatsapp)
    <li>
        <a class="" target="_blank"
           href="https://api.whatsapp.com/send?phone={{ $settings->whatsapp }}&text={{ env('APP_NAME') }}">
            <i class="fa fa-fw fa-whatsapp"></i>
        </a>
    </li>
@endif
@if($settings->youtube)
    <li>
        <a class="" target="_blank" href="{{ $settings->youtube }}">
            <i class="fa fa-fw fa-youtube"></i>
        </a>
    </li>
@endif