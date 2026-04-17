<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 
                            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <!-- Home -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- Static Pages -->
    @foreach ($pages as $page)
        <url>
            <loc>{{ $page['url'] }}</loc>
            <lastmod>{{ $page['updated_at']->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>{{ $page['priority'] }}</priority>
        </url>
    @endforeach

    <!-- Blog Posts -->
    @foreach ($blogs as $blog)
        <url>
            <loc>{{ url('/blog/' . $blog->slug) }}</loc>
            <lastmod>{{ $blog->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach

    <!-- City Title Guide URLs -->
    @php
        $cities = [
            'addison-texas',
            'balch-springs',
            'carrollton',
            'cedar-hill',
            'cockrell-hill',
            'combine',
            'coppell',
            'dallas',
            'desoto',
            'duncan',
            'farmers-branch',
            'ferris',
            'garland',
            'glenn-heights',
            'grand-prairie',
            'highlandpark',
            'hutchins',
            'irving',
            'lancaster',
            'lewisville',
            'mesquite',
            'oakcliff',
            'richardson',
            'rowlett',
            'seagoville',
            'sunnyvale',
        ];
    @endphp

    @foreach ($cities as $city)
        <url>
            <loc>{{ url('/how-to-get-your-title-in-' . $city) }}</loc>
            <lastmod>{{ now()->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    
    @php
        $locationCities = array_keys(config('fl_location_service_pages'));
    @endphp

@foreach ($locationCities as $location)
    <url>
        <loc>{{ url('/locations/' . $location) }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
@endforeach


</urlset>
