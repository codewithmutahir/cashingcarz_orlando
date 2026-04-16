{{-- Latest Blogs --}}
<section class="co-blog-section" aria-labelledby="co-blog-title">
    <div class="container">
        <div class="co-blog-head">
            <h2 id="co-blog-title" class="co-blog-title">Latest news &amp; updates</h2>
            <p class="co-blog-sub">Stay current on towing tips, local regulations, and selling smarter in Central Florida.</p>
        </div>

        <div class="row g-4 blog-grid">
            @if(isset($latestBlogs) && count($latestBlogs) > 0)
                @foreach($latestBlogs as $blog)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <article class="co-blog-card">
                            <a href="{{ url('/blog/' . $blog->slug) }}" class="co-blog-card__img">
                                <img src="{{ asset('assets/img/placeholder-rect.jpg') }}"
                                     data-src="{{ asset('storage/' . $blog->photo) }}"
                                     alt="{{ $blog->title }}"
                                     class="img-fit lazyload"
                                     width="400"
                                     height="200">
                            </a>
                            <div class="co-blog-card__body">
                                <h3 class="co-blog-card__title">
                                    <a href="{{ url('/blog/' . $blog->slug) }}">{{ Str::limit($blog->title, 56) }}</a>
                                </h3>
                                <p class="co-blog-card__excerpt">{{ Str::limit(strip_tags($blog->description), 110) }}</p>
                                <div class="co-blog-card__meta">
                                    {{ $blog->created_at->format('M d, Y') }}
                                </div>
                                <a href="{{ url('/blog/' . $blog->slug) }}" class="co-blog-card__link">
                                    Read article <span aria-hidden="true">→</span>
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No blog posts yet — check back soon.</p>
                </div>
            @endif
        </div>

        @if(isset($latestBlogs) && count($latestBlogs) > 0)
            <div class="text-center mt-5">
                <a href="{{ url('/blog') }}" class="co-blog-all">View all articles</a>
            </div>
        @endif
    </div>
</section>
