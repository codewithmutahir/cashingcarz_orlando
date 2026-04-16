@extends('admin.layouts.master')
@section('header')
    <div class="row page-titles">
        <div class="col-md-6 col-12 align-self-center">
            <h2 class="mb-0">
                {{ __('Blog') }}
            </h2>
        </div>
        <div class="col-md-6 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
                <li class="breadcrumb-item active d-flex align-items-center">{{ __('Blog') }}</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <style>
        .close {
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
        }

        .close:not(:disabled):not(.disabled) {
            cursor: pointer;
        }

        .modal-header .close {
            padding: 1rem;
            margin: -1rem -1rem -1rem auto;
        }

        button.close {
            padding: 0;
            background-color: transparent;
            border: 0;
            -webkit-appearance: none;
        }
    </style>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> Please fix the following issues:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Blog List</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $key=>$blog)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    <img style="width: 150px;height: 80px;object-fit: fill;"
                                         src="{{asset('storage').'/'.$blog->photo}}" alt=""></td>
                              <td>
    <a href="{{ url('/blog/' . $blog->slug) }}">
        {{ $blog->title }}
    </a>
</td>

                                <td>
                                    {!! \Illuminate\Support\Str::limit($blog->description,120) !!}
                                </td>
                                
                                <td>
                                     <a href="javascript:void(0)" class="btn btn-xs btn-primary edit-blog-btn"
   data-id="{{$blog->id}}" 
   data-title="{{ $blog->title }}" 
   data-photo="{{ $blog->photo }}"
   data-slug="{{ $blog->slug ?? $blog->title }}"
   data-meta-title="{{ $blog->meta_title ?? '' }}"
   data-meta-description="{{ $blog->meta_description ?? '' }}"
   data-meta-keywords="{{ $blog->meta_keywords ?? '' }}"
   data-og-title="{{ $blog->og_title ?? '' }}"
   data-og-description="{{ $blog->og_description ?? '' }}"
   data-og-type="{{ $blog->og_type ?? 'website' }}"
   data-og-url="{{ $blog->og_url ?? '' }}"
   data-og-image="{{ $blog->og_image ?? '' }}">
   <i class="far fa-edit"></i> Edit
</a>

<!-- Add this hidden div for each blog's description -->
<div id="blog-description-{{$blog->id}}" style="display: none;">
    @php echo htmlspecialchars_decode($blog->description) @endphp
</div>
                                </td>

                                <td>
                                    <a href="javascript:void(0)"
                                       class="btn btn-xs btn-danger d-flex gap-2" data-button-type="delete"
                                       onclick="delete_modal('{{route('admin.blogpost.destroy',$blog->id)}}')">
                                        <i class="far fa-trash-alt"></i> Delete
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>
                    {{$blogs->links()}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <form action="{{route('admin.blogpost.store')}}" method="post" enctype="multipart/form-data" id="blogForm">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" name="blog_id" id="blog_id" value="">
                <div class="card">
                    <div class="card-header">
                        <h5 id="formTitle">Create A New Blog</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control mb-2" id="title"
                                   aria-describedby="emailHelp" name="title" placeholder="Enter title" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control mb-2" id="slug"
                                   name="slug" placeholder="Enter slug" required>
                            <small class="form-text text-muted">The slug will be used in the URL (e.g., example-blog-post)</small>
                        </div>
                        
                          <!-- Meta Title Field -->
                        <div class="form-group">
                            <input type="text" name="meta_title" value="{{ old('meta_title') }}" placeholder="Meta Title">
                        </div>
                        
                        <div class="form-group">
                              <!-- Meta Description Field -->
                        <textarea name="meta_description" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                        </div> 
                        
                        <div class="form-group">
                              <!-- Meta Keywords Field -->
                        <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="Meta Keywords">
                        </div>
                        
                        
                          <!-- OG Title -->
                        <div class="form-group">
                            <label for="og_title">OG Title</label>
                            <input type="text" id="og_title" name="og_title" class="form-control" value="{{ old('og_title', $blog->og_title ?? '') }}">
                        </div>
                    
                        <!-- OG Description -->
                        <div class="form-group">
                            <label for="og_description">OG Description</label>
                            <textarea id="og_description" name="og_description" class="form-control">{{ old('og_description', $blog->og_description ?? '') }}</textarea>
                        </div>
                        
                        
                      <div class="form-group">
                           <!-- OG Type Field -->
                        <label for="og_type">OG Type</label>
                        <select name="og_type" id="og_type">
                            <option value="website">Website</option>
                            <option value="article">Article</option>
                            <option value="product">Product</option>
                            <!-- Add more types as needed -->
                        </select>  
                      </div>

                       <div class="form-group">
                            <!-- OG URL Field -->
                        <label for="og_url">OG URL</label>
                        <input type="text" name="og_url" id="og_url" value="{{ url()->current() }}">
                       </div>
                    
                        <!-- OG Image -->
                        <!--<div class="form-group">-->
                        <!--    <label for="og_image">OG Image</label>-->
                        <!--    <input type="file" id="og_image" name="og_image" class="form-control">-->
                        <!-- </div>-->
                        
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control ckeditor mb-2" name="description" id="ckeditor"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input class="form-control mb-2" type="file" name="photo" id="photo" required>
                            <div id="currentPhotoContainer" style="display: none;" class="mt-2">
                                <p>Current Photo:</p>
                                <img id="currentPhoto" style="width: 150px;height: 80px;object-fit: fill;" src="" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-secondary" type="button" id="resetButton" style="display: none;">Cancel</button>
                        <button class="btn btn-primary float-end" type="submit" id="submitButton">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onclick="delete_modalClose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{__('Are you sure delete this record?')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="delete_modalClose()">
                        Close
                    </button>
                    <a id="confirm_delete_button" type="button" class="btn btn-primary">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Update Confirmation Modal -->
<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="update_modalClose()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('Are you sure you want to update this blog post?') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="update_modalClose()">Close</button>
                <button type="button" class="btn btn-primary" id="confirm_update_button">Confirm</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('after_scripts')

    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    
    <script !src="">
        function delete_modal(id) {
    // Set the delete button's href attribute to the given ID
    $('#confirm_delete_button').attr('href', id);

    // Show the delete confirmation modal
    $('#delete_modal').modal('show');
}

function delete_modalClose() {
    // Hide the delete confirmation modal
    $('#delete_modal').modal('hide');
}

// Initialize CKEditor reference
let editorInstance;

// Function to handle editing a blog post (keep this for backwards compatibility)
function edit_blog(id, title, description, photo, slug, meta_title, meta_description, meta_keywords, og_title, og_description, og_type, og_url, og_image) {
    // This is now just a wrapper function for legacy code support
    console.log("Legacy edit_blog function called");
}

function delete_modal(id) {
    // Set the delete button's href attribute to the given ID
    $('#confirm_delete_button').attr('href', id);

    // Show the delete confirmation modal
    $('#delete_modal').modal('show');
}

function delete_modalClose() {
    // Hide the delete confirmation modal
    $('#delete_modal').modal('hide');
}

// Function to reset the form for creating a new blog post
function resetForm() {
    // Update form title and method
    $('#formTitle').text('Create A New Blog');
    $('#formMethod').val('POST');
    $('#blog_id').val('');

    // Reset form action URL
    $('#blogForm').attr('action', '{{route("admin.blogpost.store")}}');

    // Clear all input fields
    $('#title').val('');
    $('#slug').val('');
    $('input[name="meta_title"]').val('');
    $('textarea[name="meta_description"]').val('');
    $('input[name="meta_keywords"]').val('');
    $('#og_title').val('');
    $('#og_description').val('');
    $('#og_type').val('website');
    $('#og_url').val('');
    
    if (editorInstance) {
        editorInstance.setData('');
    }

    // Hide the current photo preview and require a new photo
    $('#currentPhotoContainer').hide();
    $('#photo').attr('required', 'required');

    // Hide the reset button and update submit button text
    $('#resetButton').hide();
    $('#submitButton').text('Save');
}

// Close update modal
function update_modalClose() {
    $('#update_modal').modal('hide');
}

jQuery(document).ready(function ($) {
    // Auto-generate slug from title
    $('#title').on('keyup', function() {
        let title = $(this).val();
        let slug = title.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
        $('#slug').val(slug);
    });
    
    // Reset button click handler
    $('#resetButton').on('click', function() {
        resetForm();
    });
    
    // Edit blog button click handler
    $(document).on('click', '.edit-blog-btn', function() {
        const id = $(this).data('id');
        const title = $(this).data('title');
        const photo = $(this).data('photo');
        const slug = $(this).data('slug');
        const metaTitle = $(this).data('meta-title');
        const metaDescription = $(this).data('meta-description');
        const metaKeywords = $(this).data('meta-keywords');
        const ogTitle = $(this).data('og-title');
        const ogDescription = $(this).data('og-description');
        const ogType = $(this).data('og-type');
        const ogUrl = $(this).data('og-url');
        const ogImage = $(this).data('og-image');
        
        // Get description from hidden div
        const description = $(`#blog-description-${id}`).html();
        
        // Debug
        console.log("Edit button clicked for blog ID:", id);
        console.log("Description content:", description);
        
        // Update form title and method
        $('#formTitle').text('Edit Blog Post');
        $('#formMethod').val('PUT');
        $('#blog_id').val(id);
    
        // Update form action URL
        $('#blogForm').attr('action', '{{ url("admin/blogpost") }}/' + id);
    
        // Populate input fields with provided values
        $('#title').val(title);
        $('#slug').val(slug);
        $('input[name="meta_title"]').val(metaTitle);
        $('textarea[name="meta_description"]').val(metaDescription);
        $('input[name="meta_keywords"]').val(metaKeywords);
        $('#og_title').val(ogTitle);
        $('#og_description').val(ogDescription);
        $('#og_type').val(ogType);
        $('#og_url').val(ogUrl);
        
        // Set content in CKEditor instance - with error handling
        try {
            if (editorInstance) {
                editorInstance.setData(description);
            } else {
                console.error("CKEditor instance not initialized");
            }
        } catch (e) {
            console.error("Error setting editor data:", e);
            if (editorInstance) {
                editorInstance.setData(''); // Set empty if there's an error
            }
            alert('There was an issue loading the blog content. Some formatting may be lost.');
        }
    
        // Display current photo if available
        if (photo) {
            $('#currentPhotoContainer').show();
            $('#currentPhoto').attr('src', '{{asset("storage")}}/' + photo);
            $('#photo').removeAttr('required');
        } else {
            $('#currentPhotoContainer').hide();
            $('#photo').attr('required', 'required');
        }
    
        // Show the reset button and update submit button text
        $('#resetButton').show();
        $('#submitButton').text('Update');
    
        // Scroll to the form for better user experience
        $('html, body').animate({
            scrollTop: $("#blogForm").offset().top - 100
        }, 500);
    });
    
    // Show the update modal on form submit
    let updateForm = document.getElementById('blogForm');
    if (updateForm) {
       updateForm.addEventListener('submit', function (e) {
    const method = document.getElementById('formMethod').value;

    if (method === 'PUT') {
        e.preventDefault(); // Only prevent when updating
        $('#update_modal').modal('show');
    }
});
    }
    
    // Handle update modal confirmation
    document.getElementById('confirm_update_button').addEventListener('click', function () {
        updateForm.submit(); // Submit the form after confirmation
    });
    
    // Initialize CKEditor
    ClassicEditor.create(document.querySelector('textarea[name="description"]'), {
        language: 'en',
        toolbar: {
            items: [
                'undo',
                'redo',
                '|',
                'bold',
                'italic',
                '|',
                'fontColor',
                'fontBackgroundColor',
                '|',
                'bulletedList',
                'numberedList',
                'blockQuote',
                'alignment',
                '|',
                'insertTable',
                'link',
                '|',
                'heading',
                '|',
                'indent',
                'outdent',
                '|',
                'removeFormat'
            ]
        },
        
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        }
    }).then(editor => {
        window.editor = editor;
        editorInstance = editor;
        console.log("CKEditor initialized successfully");
    }).catch(error => {
        console.error('Oops, something gone wrong!');
        console.warn('Build id: v28nci2fjq9h-1yblopey8x43');
        console.error(error);
    });
});
    </script>
@endsection