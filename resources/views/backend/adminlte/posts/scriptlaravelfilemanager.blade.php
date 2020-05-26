

<!-- Summernote -->
<script src="/assets/backend/adminlte/plugins/tag-editor/jquery.caret.min.js"></script>
<script src="/assets/backend/adminlte/plugins/tag-editor/jquery.tag-editor.min.js"></script>

<script type="text/javascript">
    var tags = {};
    
    @if ($post->exists)
    tags = {
        initialTags: {!! $post->tags_list !!}
    }
    @endif
    
    $('input[name=post_tags]').tagEditor(tags);
</script>

<script src="/assets/backend/adminlte/plugins/summernote/summernote-bs4.min.js"></script> 
<script src="/assets/backend/ckeditor/ckeditor.js"></script> 
<script>
    $(document).ready(function () {
        //Initialize CKEDITOR Elements
        CKEDITOR.replace('excerpt', {
            height: 100
        });
        // config CKS Editor With Laravel/FileManager
        CKEDITOR.replace('body', {
            height: 400,
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });
        
        //Initialize Select2 Elements
        $('.select2').select2()
        
        
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        
        // Summernote
       // $('#excerpt').summernote()
        //$('#body').summernote()
        
        
        //DateTimepicker
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            icons: {
                time: 'far fa-clock',
                date: 'far fa-calendar',
                up: "fas fa-arrow-up",
                down: "fas fa-arrow-down"
            }
        });
        
        //Slug
        $('#title').on('blur', function(){
            var theTitle = this.value.toLowerCase().trim(),
            slugInput = $('#slug'),
            theSlug = theTitle.replace(/&/g, '-and-')
            .replace(/[^a-z0-9-]+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/^-+|-+$/g, '');
            
            slugInput.val(theSlug);
        });
        
        //Save Draft        
        $('#draft-btn').click(function(e) {
            e.preventDefault();
            $('#published_at').val("");
            $('#post-form').submit();
        });
    });
    
</script>
