<div class="container">
    <div class="col-xl-12 content-box layout-section">
        <div class="row row-featured row-featured-category">
            <div class="col-xl-12 box-title no-border">
                <div class="inner">
                    <h2>
                        <span class="title-3">{{ t('Browse by') }} <span
                                    style="font-weight: bold;">{{ __('Brand') }}</span></span>
                        <a href="{{ \App\Helpers\UrlGen::sitemap() }}" class="sell-your-item">
                            {{ t('View more') }} <i class="fas fa-bars"></i>
                        </a>
                    </h2>
                </div>
            </div>


            @foreach(\App\Models\Brand::orderby('name','ASC')->get() as $brand)

                <div class="col-lg-2 col-md-3 col-sm-4 col-6 f-category">
                    <a href="#">
                        <img src="{{asset('storage').'/'.$brand->photo}}" class="lazyload img-fluid"
                             alt="{{ $brand->name }}">
                        <h6>
                            {{ $brand->name }}
                            @if (config('settings.list.count_categories_listings'))
                                &nbsp;({{ \App\Models\Post::where('car_brand_id',$brand->id)->count('car_brand_id')??0}}
                                )
                            @endif
                        </h6>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>