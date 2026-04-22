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
<<<<<<< HEAD

    
=======
>>>>>>> 31331aed63788eb49a402f6393390448f59c0b89
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
