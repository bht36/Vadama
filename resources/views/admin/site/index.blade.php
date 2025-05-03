@extends('admin.layout')
@section('content')
    <!-- Content Header (site_setting header) -->
    <div class="content-wrapper">
        <div class="content-header px-3">
            <div class="container-fluid">
                <div class="row mb-2 mx-1">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Site Settings') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                {{ __('Site Settings') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->
        <section class="content px-3">
            <div class="container-fluid">

                <section class="content">
                    <div class="container-fluid ">
                        <div class="card card-body">
                            <form method="POST" enctype="multipart/form-data"
                               {{-- action="{{ route('admin.site.setting.update', $site_setting->id) }}"--}} > 
                                @csrf
                                @method('post')


                                <div class="row">
                                    {{-- <div class="mb-3 form-group-translation col-md-4">
                                        <label for="Title" class="form-label">Title <span
                                                class="text-danger">*</span></label>
                                        <input id="title" type="text" name="title"
                                            value="{{ old('title', $site_setting->title) }}" placeholder="Title"
                                            class="form-control @error('title')
                                                        is-invalid                                                        
                                                    @enderror">

                                        @if ($errors->has('title'))
                                            <span style="color:red;">{{ $errors->first('tel') }}</span>
                                        @endif
                                    </div> --}}

                                    {{-- <div class="mb-3 form-group-translation col-md-4">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span>
                                        </label>
                                        <input id="email" type="email" name="email"
                                            value="{{ old('email', $site_setting->email) }}" placeholder="Email"
                                            class="form-control @error('email')
                                                        is-invalid
                                                    @enderror">

                                        @if ($errors->has('email'))
                                            <span style="color:red;">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="mb-3 form-group-translation col-md-4">
                                        <label for="phone_no" class="form-label">Phone <span class="text-danger">*</span>
                                        </label>
                                        <input id="phone_no" type="text" name="phone_no"
                                            value="{{ old('phone_no', $site_setting->phone_no) }}" placeholder="Phone"
                                            class="form-control @error('phone_no')
                                                        is-invalid
                                                    @enderror">

                                        @if ($errors->has('phone_no'))
                                            <span style="color:red;">{{ $errors->first('phone_no') }}</span>
                                        @endif
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <div class="mb-3 form-group-translation col-md-4">
                                        <label for="site_logo" class="form-label">Logo <span class="text-danger"> *</span>
                                        </label>
                                        <input id="site_logo" type="file" name="site_logo" accept=".jpg, .jpeg, .png"
                                            placeholder="site_logo"
                                            class="form-control-file @error('site_logo')
                                                        is-invalid
                                                    @enderror">

                                        {{-- @if ($site_setting->site_logo)
                                            <img src="{{ asset('storage/uploads/site_setting/site_logo/' . $site_setting->site_logo) }}"
                                                width="100" class="mt-2" />
                                        @endif --}}
                                        <br>
                                        @if ($errors->has('site_logo'))
                                            <span style="color:red;">{{ $errors->first('site_logo') }}</span>
                                        @endif
                                    </div>
                                    {{-- <div class="mb-3 form-group-translation col-md-4">
                                        <label for="site_favicon" class="form-label">Favicon <span style="color:red;">
                                                *</span></span></label>
                                        <input id="site_favicon" type="file" name="site_favicon"
                                            placeholder="site_favicon" accept=".jpg, .jpeg, .png"
                                            class="form-control-file @error('site_favicon')
                                                        is-invalid
                                                    @enderror">
                                        @if ($site_setting->site_favicon)
                                            <img src="{{ asset('storage/uploads/site_setting/site_favicon/' . $site_setting->site_favicon) }}"
                                                width="32" class="mt-2" />
                                        @endif
                                        <br>
                                        @if ($errors->has('site_favicon'))
                                            <span style="color:red;">{{ $errors->first('site_favicon') }}</span>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="mb-3 form-group-translation col-md-4">
                                        <label for="google_map" class="form-label">Google Map <span
                                                class="text-danger">*</span> </label>
                                        <input id="google_map" type="text" name="google_map"
                                            value="{{ old('google_map', $site_setting->google_map) }}"
                                            placeholder="Google Map"
                                            class="form-control @error('google_map')
                                                is-invalid
                                            @enderror">

                                        @if ($errors->has('google_map'))
                                            <span style="color:red;">{{ $errors->first('google_map') }}</span>
                                        @endif
                                    </div> --}}
                                </div>




                                {{-- <div class="row">
                                    <div class="mb-3 form-group-translation col-md-4">
                                        <label for="Facebook Title" class="form-label"><span>Facebook</span></label>
                                        <input id="facebook" type="text" name="facebook"
                                            value="{{ old('facebook', $site_setting->facebook) }}" placeholder="Facebook"
                                            class="form-control @error('facebook') is-invalid @enderror">

                                        @if ($errors->has('facebook'))
                                            <span style="color:red;">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </div>

                                    <div class="mb-3 form-group-translation col-md-4">
                                        <label for="twitter Title" class="form-label"><span>Youtube</span></label>
                                        <input id="twitter" type="text" name="twitter"
                                            value="{{ old('twitter', $site_setting->twitter) }}" placeholder="Twitter"
                                            class="form-control @error('twitter') is-invalid @enderror">

                                        @if ($errors->has('twitter'))
                                            <span style="color:red;">{{ $errors->first('twitter') }}</span>
                                        @endif
                                    </div>


                                    <div class="mb-3 form-group-translation col-md-4">
                                        <label for="instagram Title" class="form-label"><span>Instagram</span></label>
                                        <input id="instagram" type="text" name="instagram"
                                            value="{{ old('instagram', $site_setting->instagram) }}"
                                            placeholder="Instagram"
                                            class="form-control @error('instagram') is-invalid @enderror">

                                        @if ($errors->has('instagram'))
                                            <span style="color:red;">{{ $errors->first('instagram') }}</span>
                                        @endif
                                    </div>
                                </div> --}}
                                <div class="row">
                                    {{-- <div class="mb-3 form-group-translation col-md-4">
                                        <label for="google_plus" class="form-label">
                                            Google Plus <span class="text-danger"></span> </label>
                                        <input id="google_plus" type="text" name="google_plus"
                                            value="{{ old('google_plus', $site_setting->google_plus) }}"
                                            placeholder="Google Plus"
                                            class="form-control @error('google_plus') is-invalid @enderror">

                                        @if ($errors->has('google_plus'))
                                            <span style="color:red;">{{ $errors->first('google_plus') }}</span>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="mb-3 form-group-translation col-md-4">
                                        <label for="address" class="form-label">
                                            Address <span class="text-danger">*</span> </label>
                                        <input id="address" type="text" name="address"
                                            value="{{ old('address', $site_setting->address) }}" placeholder="Address"
                                            class="form-control @error('address') is-invalid @enderror">

                                        @if ($errors->has('address'))
                                            <span style="color:red;">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="mb-3 form-group-translation col-md-4">
                                        <label for="language_id" class="form-label">
                                            Select Default Language <span class="text-danger">*</span> </label>

                                        <select name="language_id" id="default_language" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($languages as $language)
                                                <option value="{{ $language->id }}"
                                                    {{ $language->id == old('language_id', $site_setting->language_id) ? 'selected' : '' }}>
                                                    {{ $language->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('language_id'))
                                            <span style="color:red;">{{ $errors->first('language_id') }}</span>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="mb-3 form-group-translation col-md-4">
                                        <label for="po_box" class="form-label">
                                            PO Box <span class="text-danger"> *</span> </label>
                                        <input id="po_box" type="text" name="po_box"
                                            value="{{ old('po_box', $site_setting->po_box) }}"
                                            placeholder="PO Box"
                                            class="form-control @error('po_box') is-invalid @enderror">

                                        @if ($errors->has('po_box'))
                                            <span style="color:red;">{{ $errors->first('po_box') }}</span>
                                        @endif
                                    </div> --}}
                                </div>

                                <div class="row">
                                    {{-- <div class="mb-3 form-group-translation col-md-12">
                                        <label for="Site Description" class="form-label">
                                            About Description <span class="text-danger">*</span> </label>
                                        <textarea name="site_description" id="site_description" cols="8" rows="3" placeholder="Description"
                                            class="form-control ckeditor">{{ old('site_description', $site_setting->site_description) }}</textarea>

                                        @if ($errors->has('site_description'))
                                            <span style="color:red;">{{ $errors->first('site_description') }}</span>
                                        @endif
                                    </div> --}}
                                </div>
                                <div class="row">
                                    {{-- <div class="mb-3 form-group-translation col-md-6">
                                        <label for="head_office_phone_no" class="form-label">
                                            Head office Phone <span class="text-danger"> *</span> </label>
                                        <input id="head_office_phone_no" type="text" name="head_office_phone_no"
                                            value="{{ old('head_office_phone_no', $site_setting->head_office_phone_no) }}"
                                            placeholder="Head Office Phone"
                                            class="form-control @error('head_office_phone_no') is-invalid @enderror">

                                        @if ($errors->has('head_office_phone_no'))
                                            <span style="color:red;">{{ $errors->first('head_office_phone_no') }}</span>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="mb-3 form-group-translation col-md-6">
                                        <label for="head_office_email" class="form-label">
                                            Head office Email <span class="text-danger"> </span> </label>
                                        <input id="head_office_email" type="text" name="head_office_email"
                                            value="{{ old('head_office_email', $site_setting->head_office_email) }}"
                                            placeholder="Head Office Email"
                                            class="form-control @error('head_office_email') is-invalid @enderror">

                                        @if ($errors->has('head_office_email'))
                                            <span style="color:red;">{{ $errors->first('head_office_email') }}</span>
                                        @endif
                                    </div> --}}

                                    {{-- <div class="mb-3 form-group-translation col-md-6">
                                        <label for="head_office_address" class="form-label">
                                            Head office Address <span class="text-danger"> *</span> </label>
                                        <input id="head_office_address" type="text" name="head_office_address"
                                            value="{{ old('head_office_address', $site_setting->head_office_address) }}"
                                            placeholder="Head Office Address"
                                            class="form-control @error('head_office_address') is-invalid @enderror">

                                        @if ($errors->has('head_office_address'))
                                            <span style="color:red;">{{ $errors->first('head_office_address') }}</span>
                                        @endif
                                    </div> --}}
                                    
                                    {{-- <div class="mb-3 form-group-translation col-md-6">
                                        <label for="head_office_map" class="form-label">
                                            Head office Map <span class="text-danger"> *</span> </label>
                                        <input id="head_office_map" type="text" name="head_office_map"
                                            value="{{ old('head_office_map', $site_setting->head_office_map) }}"
                                            placeholder="Head Office Map"
                                            class="form-control @error('head_office_map') is-invalid @enderror">

                                        @if ($errors->has('head_office_map'))
                                            <span style="color:red;">{{ $errors->first('head_office_map') }}</span>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="mb-3 form-group-translation col-md-4">
                                        <label for="saathi_teachers" class="form-label">
                                            <!-- Saathi Teachers  -->
                                            Families Received Livelihood Support
                                            <span class="text-danger"> </span> </label>
                                        <input id="saathi_teachers" type="text" name="saathi_teachers"
                                            value="{{ old('saathi_teachers', $site_setting->saathi_teachers) }}"
                                            placeholder="Saathi Teachers"
                                            class="form-control @error('saathi_teachers') is-invalid @enderror">

                                        @if ($errors->has('saathi_teachers'))
                                            <span style="color:red;">{{ $errors->first('saathi_teachers') }}</span>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="mb-3 form-group-translation col-md-4">
                                        <label for="reconstructed_schools" class="form-label">
                                            Reconstructed Schools <span class="text-danger"> </span> </label>
                                        <input id="reconstructed_schools" type="text" name="reconstructed_schools"
                                            value="{{ old('reconstructed_schools', $site_setting->reconstructed_schools) }}"
                                            placeholder="Reconstructed Schools"
                                            class="form-control @error('reconstructed_schools') is-invalid @enderror">

                                        @if ($errors->has('reconstructed_schools'))
                                            <span style="color:red;">{{ $errors->first('reconstructed_schools') }}</span>
                                        @endif
                                    </div><div class="mb-3 form-group-translation col-md-4">
                                        <label for="saathi_alumni" class="form-label">
                                            <!-- Saathi Alumini -->
                                            Community Building & Learning Centre Constructed
                                             <span class="text-danger"> </span> </label>
                                        <input id="saathi_alumni" type="text" name="saathi_alumni"
                                            value="{{ old('saathi_alumni', $site_setting->saathi_alumni) }}"
                                            placeholder="Saathi Alumini"
                                            class="form-control @error('saathi_alumni') is-invalid @enderror">

                                        @if ($errors->has('saathi_alumni'))
                                            <span style="color:red;">{{ $errors->first('saathi_alumni') }}</span>
                                        @endif
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="mb-3 form-group-translation col-md-4">
                                        <label for="scholarship" class="form-label">
                                            Scolorship Provided <span class="text-danger"> </span> </label>
                                        <input id="scholarship" type="text" name="scholarship"
                                            value="{{ old('scholarship', $site_setting->scholarship) }}"
                                            placeholder="Scolorship Provided"
                                            class="form-control @error('scholarship') is-invalid @enderror">

                                        @if ($errors->has('scholarship'))
                                            <span style="color:red;">{{ $errors->first('scholarship') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3 form-group-translation col-md-4">
                                        <label for="bags" class="form-label">
                                            Bags Distributed <span class="text-danger"> </span> </label>
                                        <input id="bags" type="text" name="bags"
                                            value="{{ old('bags', $site_setting->bags) }}"
                                            placeholder="Bags Distributed"
                                            class="form-control @error('bags') is-invalid @enderror">

                                        @if ($errors->has('bags'))
                                            <span style="color:red;">{{ $errors->first('bags') }}</span>
                                        @endif
                                    </div><div class="mb-3 form-group-translation col-md-4">
                                        <label for="volunteer" class="form-label">
                                            WorldWide Volunteers <span class="text-danger"> </span> </label>
                                        <input id="volunteer" type="text" name="volunteer"
                                            value="{{ old('volunteer', $site_setting->volunteer) }}"
                                            placeholder="WorldWide Volunteers"
                                            class="form-control @error('volunteer') is-invalid @enderror">

                                        @if ($errors->has('volunteer'))
                                            <span style="color:red;">{{ $errors->first('volunteer') }}</span>
                                        @endif
                                    </div> 
                                    <div class="mb-3 form-group-translation col-md-4">
                                        <label for="districts" class="form-label">
                                            Districts <span class="text-danger"> </span> </label>
                                        <input id="districts" type="text" name="districts"
                                            value="{{ old('districts', $site_setting->districts) }}"
                                            placeholder="Districts"
                                            class="form-control @error('districts') is-invalid @enderror">

                                        @if ($errors->has('districts'))
                                            <span style="color:red;">{{ $errors->first('districts') }}</span>
                                        @endif
                                    </div> 
                                    <div class="mb-3 form-group-translation col-md-4">
                                        <label for="municipalities" class="form-label">
                                            Municipalities <span class="text-danger"> </span> </label>
                                        <input id="municipalities" type="text" name="municipalities"
                                            value="{{ old('municipalities', $site_setting->municipalities) }}"
                                            placeholder="Municipalities"
                                            class="form-control @error('municipalities') is-invalid @enderror">

                                        @if ($errors->has('municipalities'))
                                            <span style="color:red;">{{ $errors->first('municipalities') }}</span>
                                        @endif
                                    </div> 
                                    <div class="mb-3 form-group-translation col-md-4">
                                        <label for="schools" class="form-label">
                                            Schools <span class="text-danger"> </span> </label>
                                        <input id="schools" type="text" name="schools"
                                            value="{{ old('schools', $site_setting->schools) }}"
                                            placeholder="Schools"
                                            class="form-control @error('schools') is-invalid @enderror">

                                        @if ($errors->has('schools'))
                                            <span style="color:red;">{{ $errors->first('schools') }}</span>
                                        @endif
                                    </div> 
                                    <div class="mb-3 form-group-translation col-md-4">
                                        <label for="students" class="form-label">
                                            Students <span class="text-danger"> </span> </label>
                                        <input id="students" type="text" name="students"
                                            value="{{ old('students', $site_setting->students) }}"
                                            placeholder="Students"
                                            class="form-control @error('students') is-invalid @enderror">

                                        @if ($errors->has('students'))
                                            <span style="color:red;">{{ $errors->first('students') }}</span>
                                        @endif
                                    </div> 
                                    <div class="mb-3 form-group-translation col-md-4">
                                        <label for="teachers" class="form-label">
                                            Teachers <span class="text-danger"> </span> </label>
                                        <input id="teachers" type="text" name="teachers"
                                            value="{{ old('teachers', $site_setting->teachers) }}"
                                            placeholder="Teachers"
                                            class="form-control @error('teachers') is-invalid @enderror">

                                        @if ($errors->has('teachers'))
                                            <span style="color:red;">{{ $errors->first('teachers') }}</span>
                                        @endif
                                    </div> 
                                    <div class="mb-3 form-group-translation col-md-4">
                                        <label for="alumni" class="form-label">
                                            Alumni <span class="text-danger"> </span> </label>
                                        <input id="alumni" type="text" name="alumni"
                                            value="{{ old('alumni', $site_setting->alumni) }}"
                                            placeholder="Alumni"
                                            class="form-control @error('alumni') is-invalid @enderror">

                                        @if ($errors->has('alumni'))
                                            <span style="color:red;">{{ $errors->first('alumni') }}</span>
                                        @endif
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="mb-3 form-group-translation col-md-12">
                                        <label for="html_title" class="form-label">HTML Title <span
                                                class="text-danger">*</span> </label>
                                        <input type="text" name="html_title" id="" placeholder="Html Title"
                                            value="{{ old('html_title', $site_setting->html_title) }}"
                                            class="form-control @error('html_title') is-invalid @enderror">

                                        @if ($errors->has('html_title'))
                                            <span style="color:red;">{{ $errors->first('html_title') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 form-group-translation col-md-12">
                                        <label for="Meta Description" class="form-label">Meta
                                            Description <span class="text-danger">*</span> </label>
                                        <textarea name="meta_description" id="" cols="8" rows="3" placeholder="Meta Description"
                                            class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description', $site_setting->meta_description) }}</textarea>

                                        @if ($errors->has('meta_description'))
                                            <span style="color:red;">{{ $errors->first('meta_description') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 form-group-translation col-md-12">
                                        <label for="Meta Keyword" class="form-label">Meta Keyword <span
                                                class="text-danger">*</span> </label>
                                        <input type="text" name="meta_keyword" id="" placeholder="Keyword"
                                            value="{{ old('meta_keyword', $site_setting->meta_keyword) }}"
                                            class="form-control @error('meta_keyword') is-invalid @enderror">

                                        @if ($errors->has('meta_keyword'))
                                            <span style="color:red;">{{ $errors->first('meta_keyword') }}</span>
                                        @endif
                                    </div>

                                </div>




                                <div class="row">
                                    <div class="mt-2 col-md-12 text-right">
                                        <button type="submit" class="btn btn-success save-button"
                                            value="save">{{ __('Update') }}</button>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        // This sample still does not showcase all CKEditor 5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        var allEditors = document.querySelectorAll('.ckeditor');
        for (var i = 0; i < allEditors.length; ++i) {
            CKEDITOR.ClassicEditor.create(allEditors[i], {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        // 'exportPDF','exportWord', '|',
                        // 'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'code', 'subscript', 'superscript',
                        'removeFormat', '|',
                        'bulletedList', 'numberedList', '|',
                        // 'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        // 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
                        'alignment', '|',
                        'link', 'insertImage', 'blockQuote', 'insertTable', '|',
                        // 'specialCharacters', 'horizontalLine', 
                        'pageBreak', '|',
                        // 'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // // Changing the language of the interface requires loading the language file using the <script> tag.
                // // language: 'es',
                // list: {
                //     properties: {
                //         styles: true,
                //         startIndex: true,
                //         reversed: true
                //     }
                // },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: '',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                // fontFamily: {
                //     options: [
                //         'default',
                //         'Arial, Helvetica, sans-serif',
                //         'Courier New, Courier, monospace',
                //         'Georgia, serif',
                //         'Lucida Sans Unicode, Lucida Grande, sans-serif',
                //         'Tahoma, Geneva, sans-serif',
                //         'Times New Roman, Times, serif',
                //         'Trebuchet MS, Helvetica, sans-serif',
                //         'Verdana, Geneva, sans-serif'
                //     ],
                //     supportAllValues: true
                // },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [10, 12, 14, 'default', 18, 20, 22],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [{
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                // link: {
                //     decorators: {
                //         addTargetToExternalLinks: true,
                //         defaultProtocol: 'https://',
                //         toggleDownloadable: {
                //             mode: 'manual',
                //             label: 'Downloadable',
                //             attributes: {
                //                 download: 'file'
                //             }
                //         }
                //     }
                // },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                // mention: {
                //     feeds: [
                //         {
                //             marker: '@',
                //             feed: [
                //                 '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                //                 '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                //                 '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                //                 '@sugar', '@sweet', '@topping', '@wafer'
                //             ],
                //             minimumCharacters: 1
                //         }
                //     ]
                // },
                // The "super-build" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    // 'CKBox',
                    // 'CKFinder',
                    // 'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType
                    // 'MathType'
                ]
            });
        }
        //         ClassicEditor..create( document.querySelector( '.ckeditor' ), {
        //             plugins: [ SourceEditing, Markdown],
        //             toolbar: [ 'sourceEditing']
        //         } );
        //     }
        // CKEDITOR.ClassicEditor.create(document.getElementById("editor"),
    </script>
@endsection
