@extends('layouts.master')
@section('content')
    <style>
        /* Layout Fixes */
        .gutters-16 {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-16 > [class*="col-"] {
            padding-right: 8px;
            padding-left: 8px;
        }

        /* Blog Content Styles */
        .blog-content {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #444;
            font-weight: 400;
        }

        .blog-content p {
            margin-bottom: 1.5rem;
        }

        .blog-content h1 { font-size: 2.1rem; }
        .blog-content h2 { font-size: 1.8rem; }
        .blog-content h3 { font-size: 1.4rem; }

        /* Sidebar Fixes */
        .recent-posts-sidebar {
            position: sticky;
            top: 20px;
            height: fit-content;
        }

        .recent-post-item {
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .sidebar-image {
            width: 80px;
            height: 80px;
            min-width: 80px;
            object-fit: cover;
            border-radius: 6px;
        }

        /* Responsive Fixes */
        @media (max-width: 992px) {
            .recent-posts-sidebar {
                margin-top: 2rem;
                position: static;
            }
            
            .gutters-16 {
                margin-right: -12px;
                margin-left: -12px;
            }
            
            .blog-content h1 { font-size: 2rem; }
            .blog-content h2 { font-size: 1.75rem; }
            .blog-content h3 { font-size: 1.5rem; }
        }
        
        
        /* Add this to your CSS file or in a <style> tag */
.blog-content {
    font-family: inherit; /* Maintain site font */
    line-height: 1.6;
}

.blog-content p {
    margin-bottom: 1em;
}

.blog-content ul, .blog-content ol {
    display: block;
    list-style-type: disc;
    margin-left: 20px;
    margin-bottom: 15px;
}

/* Target list items and add bullet points */
.blog-content li {
    display: list-item !important;
    list-style-type: disc !important;
    margin-left: 20px !important;
    margin-bottom: 8px !important;
}

/* Fix span formatting inside list items */
.blog-content li span {
    display: inline !important;
}

/* Ensure paragraph-wrapped lists still display as lists */
.blog-content p li {
    display: list-item !important;
}

.blog-content strong, 
.blog-content b {
    font-weight: bold;
}

.blog-content em, 
.blog-content i {
    font-style: italic;
}

.blog-content h1, 
.blog-content h2, 
.blog-content h3, 
.blog-content h4 {
    margin: 1.5em 0 1em;
    font-weight: bold;
}

.blog-content table {
    border-collapse: collapse;
    width: 100%;
    margin: 1em 0;
}

.blog-content table td, 
.blog-content table th {
    border: 1px solid #ddd;
    padding: 8px;
}
        
        
    </style>

    <section class="py-4 mt-2 co-inner-page co-blog-single">
        <div class="container">
            <div class="row gutters-16 justify-content-center">

                <!-- Main Blog Content -->
                <div class="col-xxl-7 col-lg-8">
                    <div class="mb-4">
                        <div class="mb-4">
                            <h1 class="display-5 fw-bold mb-3">
                                {{ $blog->title }}
                            </h1>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-muted me-3">
                                        {{ $blog->created_at->format('M d, Y') }}
                                    </span>
                                    @if($blog->category)
                                        <span class="badge bg-primary">
                                            {{ $blog->category->category_name }}
                                        </span>
                                    @endif
                                </div>
                                <div class="aiz-share"></div>
                            </div>
                        </div>

                        <img src="{{ asset('assets/img/placeholder-rect.jpg') }}"
                             data-src="{{ asset('storage').'/'.$blog->photo }}"
                             alt="{{ $blog->title }}"
                             class="img-fluid lazyload w-100 rounded-3 mb-5">

                        <div class="blog-content">
                           {!! $blog->description !!}
                        </div>
                        
                       
                    </div>
                </div>

                <!-- Recent Posts Sidebar -->
                <div class="col-xxl-5 col-lg-4">
                    <div class="recent-posts-sidebar">
                        <div class="p-4 border rounded-3 bg-light">
                            <h3 class="h5 fw-bold mb-4">{{ __('Recent Posts') }}</h3>
                            <div class="row g-3">
                                @foreach($recent_blogs as $recent_blog)
                                <div class="col-12">
                                    <div class="recent-post-item">
                                        <div class="d-flex align-items-start">
                                            <a href="{{ url('/blog/' . $blog->slug) }}" 
                                               class="flex-shrink-0 me-3">
                                                <img src="{{ asset('assets/img/placeholder-rect.jpg') }}"
                                                     data-src="{{ asset('storage').'/'.$recent_blog->photo }}"
                                                     alt="{{ $recent_blog->title }}"
                                                     class="sidebar-image lazyload">
                                            </a>
                                            <div class="flex-grow-1">
                                                <h4 class="h6 fw-bold mb-1">
                                                    <a href="{{ url('/blog/' . $blog->slug) }}"
                                                       class="text-dark">
                                                        {{ Str::limit($recent_blog->title, 50) }}
                                                    </a>
                                                </h4>
                                                <div class="small text-muted">
                                                    {{ $recent_blog->created_at->format('M d, Y') }}
                                                </div>
                                                @if($recent_blog->category)
                                                <div class="mt-1">
                                                    <small class="badge bg-primary">
                                                        {{ $recent_blog->category->category_name }}
                                                    </small>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection