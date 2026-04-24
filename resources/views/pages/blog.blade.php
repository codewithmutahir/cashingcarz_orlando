@extends('layouts.master')

@section('meta_title', 'Our Blog | Cashing Cars')
@section('meta_description', 'Explore our latest Article About Cash for Cars and expert tips on selling junk cars for top dollar. Get insights, deals, and more!')
@section('meta_keywords', 'Article About Cash for Cars')
@section('meta_robots', 'index, follow')

@section('content')
    <style>
        /* Essential grid-related styles */
        .blog-grid .card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .img-container {
            flex: 0 0 auto;
        }
        
        .card-content {
            flex: 1;
        }
        
        .img-fit {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
    <section class="pb-4 pt-5 mt-5 co-inner-page co-blog-index">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-4">Insurance Blog &amp; Tips</h1>
                    <!-- Blog Grid -->
                    <div class="row blog-grid g-4"> <!-- Added gutter spacing -->
                        @forelse($blogs as $blog)
                            <div class="col-xl-4 col-lg-6 col-md-6 mb-4"> <!-- Responsive columns -->
                                <div class="card h-100 shadow-none border rounded-0">
                                    <!-- Image Container -->
                                    <div class="img-container h-180px overflow-hidden">
                                           <a href="{{ route('client.single.blog.show', $blog->slug) }}" class="d-block h-100">
                                          <img src="{{ asset('assets/img/placeholder-rect.jpg') }}"
                                             data-src="{{ asset('storage').'/'.$blog->photo }}"
                                             alt="{{ $blog->title }}"
                                             class="img-fit lazyload" 
                                             style="height:250px; width:100%; object-fit:cover; object-position:center;">
                                         </a>

                                    </div>
                                    
                                    <!-- Card Content -->
                                    <div class="card-content p-3 d-flex flex-column">
                                        <h2 class="fs-5 fw-bold mb-3">
                                            <a href="{{ url('/blog/' . $blog->slug) }}"
                                               class="text-decoration-none text-dark">
                                                {{ Str::limit($blog->title, 50) }}
                                            </a>
                                        </h2>
                                        
                                        <div class="flex-grow-1">
                                            <p class="text-muted mb-3">
                                                {{ Str::limit(strip_tags($blog->description), 100) }}
                                            </p>
                                        </div>

                                        <div class="mt-auto">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    {{ $blog->created_at->format('M d, Y') }}
                                                </small>
                                                @if($blog->category)
                                                    <span class="badge bg-primary">
                                                        {{ $blog->category->category_name }}
                                                    </span>
                                                @endif
                                            </div>
                                            <a href="{{ url('/blog/' . $blog->slug) }}"
                                               class="btn btn-link text-decoration-none p-0 mt-2">
                                                Read More →
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <p class="text-muted mb-0">No articles published yet — check back soon.</p>
                            </div>
                        @endforelse
                    </div>
                    
                    <!-- Pagination -->
                    @if($blogs->isNotEmpty())
                    <div class="mt-4">
                        {{ $blogs->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection