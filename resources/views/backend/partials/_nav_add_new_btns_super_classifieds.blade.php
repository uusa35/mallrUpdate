<li class="disabled">
    <a href="#" disabled="true" class="tooltips disabled" data-container="body"
       data-placement="{{ app()->isLocale('ar') ? 'left' : 'right' }}"
       data-original-title="{{ trans('message.classifieds') }}">
        <i class="icon-note"></i> {{ trans('general.classifieds') }}</a>
</li>
@can('index','classified')
    <li>
        <a href="{{ route('backend.classified.create') }}" class="tooltips" data-container="body"
           data-placement="{{ app()->isLocale('ar') ? 'left' : 'right' }}"
           data-original-title="{{ trans('message.new_classified') }}">
            <i class="icon-plus"></i> {{ trans('general.new_classified') }}</a>
    </li>
    <li>
        <a href="{{ route('backend.admin.group.create') }}" class="tooltips" data-container="body"
           data-placement="{{ app()->isLocale('ar') ? 'left' : 'right' }}"
           data-original-title="{{ trans('message.new_category_group') }}">
            <i class="icon-plus"></i> {{ trans('general.new_group') }}</a>
    </li>
    <li>
        <a href="{{ route('backend.admin.property.create') }}" class="tooltips" data-container="body"
           data-placement="{{ app()->isLocale('ar') ? 'left' : 'right' }}"
           data-original-title="{{ trans('message.new_property') }}">
            <i class="icon-plus"></i> {{ trans('general.new_property') }}</a>
    </li>
@endcan