@php
    $post ??= [];
@endphp
<div class="container {{ !empty($topAdvertising) ? 'mt-3' : 'mt-2' }}">
    <div class="row">
        <div class="col-md-12">

            <nav aria-label="breadcrumb" role="navigation" class="float-start">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('country.name') }}</a></li>
                    @if (is_array($catBreadcrumb) && count($catBreadcrumb) > 0)
                        @foreach($catBreadcrumb as $key => $value)
                            <li class="breadcrumb-item">
                                <a href="{{ $value->get('url') }}">
                                    {!! $value->get('name') !!}
                                </a>
                            </li>
                        @endforeach
                    @endif
                    <li class="breadcrumb-item active"
                        aria-current="page">{{ str(data_get($post, 'title'))->limit(70) }}</li>
                </ol>
            </nav>



        </div>
    </div>
</div>
<div class="items-details">
    <ul class="nav nav-tabs" id="itemsDetailsTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active"
                    id="item-details-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#item-details"
                    role="tab"
                    aria-controls="item-details"
                    aria-selected="true"
            >
                <span class="title-3 lh-base">{{ t('listing_details') }}</span>
            </button>
        </li>
        @if (config('plugins.reviews.installed'))
            <li class="nav-item" role="presentation">
                <button class="nav-link"
                        id="item-{{ config('plugins.reviews.name') }}-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#item-{{ config('plugins.reviews.name') }}"
                        role="tab"
                        aria-controls="item-{{ config('plugins.reviews.name') }}"
                        aria-selected="false"
                >
					<span class="title-3 lh-base">
						{{ trans('reviews::messages.Reviews') }} ({{ data_get($post, 'rating_count', 0) }})
					</span>
                </button>
            </li>
        @endif
    </ul>

    {{-- Tab panes --}}
    <div class="tab-content p-3 mb-3" id="itemsDetailsTabsContent">
        <div class="tab-pane show active" id="item-details" role="tabpanel" aria-labelledby="item-details-tab">
            <div class="row pb-3">
                <div class="items-details-info col-md-12 col-sm-12 col-12 enable-long-words from-wysiwyg">

                    <div class="row">
                        {{-- Location --}}
                        <div class="col-md-6 col-sm-6 col-6">
                            <h4 class="fw-normal p-0">
                                <span class="fw-bold"><i class="bi bi-geo-alt"></i> {{ t('location') }}: </span>
                                <span>
									<a href="{!! \App\Helpers\UrlGen::city(data_get($post, 'city')) !!}">
										{{ data_get($post, 'city.name') }}
									</a>
								</span>
                            </h4>
                        </div>

                        {{-- Price / Salary --}}
                        <div class="col-md-6 col-sm-6 col-6 text-end">
                            <h4 class="fw-normal p-0">
								<span class="fw-bold">
									{{ data_get($post, 'price_label') }}
								</span>
                                <span>
									{!! data_get($post, 'price_formatted') !!}
                                    @if (data_get($post, 'negotiable') == 1)
                                        <small class="label bg-success"> {{ t('negotiable') }}</small>
                                    @endif
								</span>
                            </h4>
                        </div>
                    </div>
                    <hr class="border-0 bg-secondary">

                    {{-- Description --}}
                    <div class="row">
                        <div class="col-12 detail-line-content">
                            {!! data_get($post, 'description') !!}
                        </div>
                    </div>
                    @php
                        $other=\App\Models\Post_others_info::where('post_id',$post['id'])->first();
                    @endphp
                    @if($other)
                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <label for="">What's the mileage on your car</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_mileage}}"
                                       id="" readonly>

                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="">Do you have the title in hand?</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_title}}"
                                       id="" readonly>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <label for="">Does your car have a clean title?</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_title_clear}}"
                                       id="" readonly>

                            </div>
                            <div class="col-md-6 mb-2">

                                <label for="">Where will we pick up your car?</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_pickup_point}}"
                                       id="" readonly>


                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <label for="">Do you own the car</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_owner}}"
                                       id="" readonly>


                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="">Are all of the wheels and tires inflated and on
                                    your car?</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_wheels}}"
                                       id="" readonly>

                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <label for="">Is the car’s battery working and do you have a
                                    working key?</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_battery}}"
                                       id="" readonly>

                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="">Can you start and drive your car?</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_start}}"
                                       id="" readonly>

                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <label for="">Condition of your car engine transmission?</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_condition}}"
                                       id="" readonly>


                            </div>
                            <div class="col-md-6 mb-2">

                                <label for="">Does your car have exterior damage?</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_exterior_damage}}"
                                       id="" readonly>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <label for="">Are there any exterior parts missing or damaged?</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_exterior_missing}}"
                                       id="" readonly>

                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="">Does your car have its catalytic converter?</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_catalytic}}"
                                       id="" readonly>

                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">

                                <label for="">Does the interior of your car have missing parts?</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_interior}}"
                                       id="" readonly>

                            </div>
                            <div class="col-md-6 mb-2">

                                <label for="">Has your car ever been in a flood or fire</label>
                                <input class="form-control"
                                       placeholder="" type="text"
                                       name="car_mileage"
                                       value="{{$other->car_flood}}"
                                       id="" readonly>
                            </div>
                        </div>

                    @endif

                    {{-- Custom Fields --}}
                    @includeFirst([config('larapen.core.customizedViewPath') . 'post.show.inc.details.fields-values', 'post.show.inc.details.fields-values'])

                    {{-- Tags --}}
                    @if (!empty(data_get($post, 'tags')))
                        <div class="row mt-3">
                            <div class="col-12">
                                <h4 class="p-0 my-3"><i class="bi bi-tags"></i> {{ t('Tags') }}:</h4>
                                @foreach(data_get($post, 'tags') as $iTag)
                                    <span class="d-inline-block border border-inverse bg-light rounded-1 py-1 px-2 my-1 me-1">
										<a href="{{ \App\Helpers\UrlGen::tag($iTag) }}">
											{{ $iTag }}
										</a>
									</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Actions --}}
                    {{--                    @if (!auth()->check() || (auth()->check() && auth()->id() != data_get($post, 'user_id')))--}}
                    {{--                        <div class="row text-center h2 mt-4">--}}
                    {{--                            <div class="col-4">--}}
                    {{--                                @if (auth()->check())--}}
                    {{--                                    @if (auth()->user()->id == data_get($post, 'user_id'))--}}
                    {{--                                        <a href="{{ \App\Helpers\UrlGen::editPost($post) }}">--}}
                    {{--                                            <i class="far fa-edit" data-bs-toggle="tooltip" title="{{ t('Edit') }}"></i>--}}
                    {{--                                        </a>--}}
                    {{--                                    @else--}}
                    {{--                                        {!! genEmailContactBtn($post, false, true) !!}--}}
                    {{--                                    @endif--}}
                    {{--                                @else--}}
                    {{--                                    {!! genEmailContactBtn($post, false, true) !!}--}}
                    {{--                                @endif--}}
                    {{--                            </div>--}}
                    {{--                            @if (isVerifiedPost($post))--}}
                    {{--                                <div class="col-4">--}}
                    {{--                                    <a class="make-favorite" id="{{ data_get($post, 'id') }}" href="javascript:void(0)">--}}
                    {{--                                        @if (auth()->check())--}}
                    {{--                                            @if (!empty(data_get($post, 'savedByLoggedUser')))--}}
                    {{--                                                <i class="fas fa-bookmark" data-bs-toggle="tooltip"--}}
                    {{--                                                   title="{{ t('Remove favorite') }}"></i>--}}
                    {{--                                            @else--}}
                    {{--                                                <i class="far fa-bookmark" data-bs-toggle="tooltip"--}}
                    {{--                                                   title="{{ t('Save listing') }}"></i>--}}
                    {{--                                            @endif--}}
                    {{--                                        @else--}}
                    {{--                                            <i class="far fa-bookmark" data-bs-toggle="tooltip"--}}
                    {{--                                               title="{{ t('Save listing') }}"></i>--}}
                    {{--                                        @endif--}}
                    {{--                                    </a>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-4">--}}
                    {{--                                    <a href="{{ \App\Helpers\UrlGen::reportPost($post) }}">--}}
                    {{--                                        <i class="far fa-flag" data-bs-toggle="tooltip"--}}
                    {{--                                           title="{{ t('Report abuse') }}"></i>--}}
                    {{--                                    </a>--}}
                    {{--                                </div>--}}
                    {{--                            @endif--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}
                    <div class="text-center">
                        <a href="{{route('checkouts',$post['id'])}}"
                           class="btn btn-primary text-center">{{__('Buy Now')}}</a>
                    </div>
                </div>

            </div>
        </div>

        @if (config('plugins.reviews.installed'))
            @if (view()->exists('reviews::comments'))
                @include('reviews::comments')
            @endif
        @endif
    </div>

    {{--    <div class="content-footer text-start">--}}
    {{--        @if (auth()->check())--}}
    {{--            @if (auth()->user()->id == data_get($post, 'user_id'))--}}
    {{--                <a class="btn btn-default" href="{{ \App\Helpers\UrlGen::editPost($post) }}">--}}
    {{--                    <i class="far fa-edit"></i> {{ t('Edit') }}--}}
    {{--                </a>--}}
    {{--            @else--}}
    {{--                {!! genPhoneNumberBtn($post) !!}--}}
    {{--                {!! genEmailContactBtn($post) !!}--}}
    {{--            @endif--}}
    {{--        @else--}}
    {{--            {!! genPhoneNumberBtn($post) !!}--}}
    {{--            {!! genEmailContactBtn($post) !!}--}}
    {{--        @endif--}}
    {{--    </div>--}}
</div>
