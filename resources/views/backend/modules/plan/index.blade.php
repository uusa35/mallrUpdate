@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">
                            @section('title')
                                {{ Route::currentRouteName() }} {{ (!is_null(request()->has('type'))) ? request()->type : null }}
                            @show
                        </span>
                    </div>
                </div>
                <div class="portlet-body">
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>duration</th>
                            <th>price</th>
                            <th>sale_price</th>
                            <th>on_sale</th>
                            <th>is_paid</th>
                            <th>images</th>
                            <th>offer</th>
                            <th>branches</th>
                            <th>label</th>
                            <th>show_first</th>
                            {{--<th>extra_fees</th>--}}
                            <th>active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>duration</th>
                            <th>price</th>
                            <th>sale_price</th>
                            <th>on_sale</th>
                            <th>is_paid</th>
                            <th>images</th>
                            <th>offer</th>
                            <th>branches</th>
                            <th>label</th>
                            <th>show_first</th>
                            {{--<th>extra_fees</th>--}}
                            <th>active</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->name }}</td>
                                <td>{{ $element->duration }}</td>
                                <td>{{ $element->price }}</td>
                                <td>{{ $element->sale_price }}</td>
                                <td>
                                    <span class="label {{ activeLabel($element->on_sale) }}">{{ activeText($element->on_sale,'On Sale') }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->is_paid) }}">{{ activeText($element->is_paid,'Paid') }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->has_images) }}">{{ activeText($element->has_images,'Has Images') }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->has_offer) }}">{{ activeText($element->has_offer,'Has Offer') }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->has_branches) }}">{{ activeText($element->has_branches,'Has Branches') }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->has_label) }}">{{ activeText($element->has_label,'Has Label') }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->show_first) }}">{{ activeText($element->show_first,'Show First') }}</span>
                                </td>
                                {{--<td>{{ $element->extra_fees }}</td>--}}
                                <td>
                                    <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.plan.edit',$element->id) }}">
                                                    <i class="fa fa-fw fa-user"></i>edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.activation',['model' => 'plan','id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-check-circle"></i> toggle active</a>
                                            </li>
                                            <li>
                                                <div class="col-lg-12">
                                                    <form method="post"
                                                          action="{{ route('backend.plan.destroy',$element->id) }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="delete"/>
                                                        <button type="submit" class="btn btn-sm red">
                                                            <i class="fa fa-remove"></i>delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection