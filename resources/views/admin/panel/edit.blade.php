@extends('admin.layouts.master')

@section('header')
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h2 class="mb-0">
                <span class="text-capitalize">{!! $xPanel->entityNamePlural !!}</span>
                <small>{{ trans('admin.edit') }} {!! $xPanel->entityName !!}</small>
            </h2>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url($xPanel->route) }}"
                                               class="text-capitalize">{!! $xPanel->entityNamePlural !!}</a></li>
                <li class="breadcrumb-item active d-flex align-items-center">{{ trans('admin.edit') }}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="flex-row d-flex justify-content-center">
        @php
            $colMd = config('settings.style.admin_boxed_layout') == '1' ? ' col-md-12' : ' col-md-9';
			$settingsClass = (
                (
                    in_array(request()->segment(2), ['settings', 'homepage'])
                    && request()->segment(4) == 'edit'
                )
                || (
                    in_array(request()->segment(4), ['settings', 'homepage'])
                    && request()->segment(6) == 'edit'
                )
			) ? ' settings-edition' : '';
        @endphp
        <div class="col-sm-12{{ $colMd }}">
            <div class="row">
                <div class="col-lg-6">
                    @if ($xPanel->hasAccess('list'))
                        <a href="{{ url($xPanel->route) }}" class="btn btn-primary shadow">
                            <i class="fa fa-angle-double-left"></i> {{ trans('admin.back_to_all') }}
                            <span class="text-lowercase">{{-- $xPanel->entityNamePlural --}}</span>
                        </a>
                        <br><br>
                    @endif
                </div>
                <div class="col-lg-6 text-end">
                    @if ($xPanel->model->translationEnabled())
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary shadow dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ trans('admin.Language') }}:
                                {{ $xPanel->model->getAvailableLocales()[request()->input('locale') ? request()->input('locale') : app()->getLocale()] }}
                                &nbsp;
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($xPanel->model->getAvailableLocales() as $key => $locale)
                                    <a class="dropdown-item ps-3 pe-3 pt-1 pb-1"
                                       href="{{ url($xPanel->route . '/' . $entry->getKey() . '/edit') }}?locale={{ $key }}">
                                        {{ $locale }}
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            @if ($xPanel->hasUploadFields('update', $entry->getKey()))
                {{ html()->form('PUT', url($xPanel->route . '/' . $entry->getKey()))->acceptsFiles()->open() }}
            @else
                {{ html()->form('PUT', url($xPanel->route . '/' . $entry->getKey()))->open() }}
            @endif
            <div class="card border-top border-primary{{ $settingsClass }}">

                @if (!in_array($xPanel->getModel()->getTable(), ['settings', 'home_sections', 'domain_settings', 'domain_home_sections']))
                    <div class="card-header">
                        <h3 class="mb-0">{{ trans('admin.edit') }}</h3>
                    </div>
                @endif
                <div class="card-body">
                    load the view from the application if it exists, otherwise load the one in the package
                    @if (view()->exists('vendor.admin.panel.' . $xPanel->entityName . '.form_content'))
                        @include('vendor.admin.panel.' . $xPanel->entityName . '.form_content', ['fields' => $xPanel->getFields('update', $entry->getKey())])
                    @elseif (view()->exists('vendor.admin.panel.form_content'))
                        @include('vendor.admin.panel.form_content', ['fields' => $xPanel->getFields('update', $entry->getKey())])
                    @else
                        @php
                            $fields = $xPanel->getFields('update', $entry->getKey());

                            // Define the fields you want to exclude
                            $excludedFields = ['negotiable','post_type_id','tags','empty_line_01'];

                            // Filter out the excluded fields
                            $filteredFields = array_filter($fields, function($key) use ($excludedFields) {
                                return !in_array($key, $excludedFields);
                            }, ARRAY_FILTER_USE_KEY);
                        @endphp

                        @include('admin.panel.form_content',  ['fields' => $filteredFields])
                    @endif

                    @if(str_contains(request()->getRequestUri(), '/admin/posts'))
                        <div class="pickup_point">
                            <h2>Pickup Point Information:</h2>
                            @php $pickup=\App\Models\pickup_poin_info::where('post_id',$fields['id']['value'])->first(); @endphp
                            <table class="table">
                                <tr>
                                    <th>Address</th>
                                    <th>Time Slot</th>
                                </tr>
                                <tr>
                                    <td>{{!empty($pickup->address)?$pickup->address:'-'}}</td>
                                    <td>{{!empty($pickup->slot)?$pickup->slot:'-'}}</td>
                                </tr>
                            </table>

                        </div>

                        <div class="pickup_point">
                            <h2>Post Type Information:</h2>
                            @php $post=\App\Models\Post::where('id',$fields['id']['value'])->first(); @endphp
                            @if($post->agree_with==1)
                                <div class="alert alert-success" role="alert">
                                    {{__('Click Yes button when he/she post')}}
                                </div>

                            @else
                                <div class="alert alert-danger" role="alert">
                                    {{__('Click No button when he/she post')}}
                                </div>

                            @endif
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    @include('admin.panel.inc.form_save_buttons')
                </div>

            </div>
            {{ html()->form()->close() }}
        </div>
    </div>
@endsection

@section('after_styles')
@endsection

@section('after_scripts')
@endsection
