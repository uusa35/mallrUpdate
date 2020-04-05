<li class="disabled">
    <a href="#" disabled="true" class="tooltips disabled" data-container="body"
       data-placement="{{ app()->isLocale('ar') ? 'left' : 'right' }}"
       data-original-title="{{ trans('message.create_your_new_items_list') }}">
        <i class="icon-note"></i> {{ trans('general.create_your_new_items_list') }}</a>
</li>
@can('service.create')
    <li>
        <a href="{{ route('backend.service.create') }}" class="tooltips" data-container="body"
           data-placement="{{ app()->isLocale('ar') ? 'left' : 'right' }}"
           data-original-title="{{ trans('message.new_service') }}">
            <i class="icon-plus"></i> {{ trans('general.new_service') }}</a>
    </li>
@endcan
@can('timing.create')
    <li>
        <a href="{{ route('backend.timing.create') }}" class="tooltips" data-container="body"
           data-placement="{{ app()->isLocale('ar') ? 'left' : 'right' }}"
           data-original-title="{{ trans('message.new_timing') }}">
            <i class="icon-plus"></i> {{ trans('general.new_timing') }}</a>
    </li>
@endcan
@can('product.create')
    <li>
        <a href="{{ route('backend.product.create') }}" class="tooltips" data-container="body"
           data-placement="{{ app()->isLocale('ar') ? 'left' : 'right' }}"
           data-original-title="{{ trans('message.new_product') }}">
            <i class="icon-plus"></i> {{ trans('general.new_product') }}</a>
    </li>
    @can('collection.create')
        <li>
            <a href="{{ route('backend.collection.create') }}" class="tooltips" data-container="body"
               data-placement="{{ app()->isLocale('ar') ? 'left' : 'right' }}"
               data-original-title="{{ trans('message.new_collection') }}">
                <i class="icon-plus"></i> {{ trans('general.new_collection') }}</a>
        </li>
    @endcan
    @can('classified.create')
        <li>
            <a href="{{ route('backend.classified.create') }}" class="tooltips" data-container="body"
               data-placement="{{ app()->isLocale('ar') ? 'left' : 'right' }}"
               data-original-title="{{ trans('message.new_classified') }}">
                <i class="icon-plus"></i> {{ trans('general.new_classified') }}</a>
        </li>
    @endcan
@endcan