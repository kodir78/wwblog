
<script src="/assets/ckeditor/ckeditor.js"></script> 
<!-- Summernote -->
<script src="/assets/backend/adminlte/plugins/tag-editor/jquery.caret.min.js"></script>
<script src="/assets/backend/adminlte/plugins/tag-editor/jquery.tag-editor.min.js"></script>

<script type="text/javascript">
    var options = {};
    
    @if ($post->exists)
    options = {
        initialTags: {!! $post->tags_list !!}
    }
    @endif
    
    $('input[name=post_tags]').tagEditor(options);
</script>

<script src="/assets/backend/adminlte/plugins/summernote/summernote-bs4.min.js"></script>   
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        
        
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        
        // Summernote
        $('#excerpt').summernote()
        $('#body').summernote({
            height: "300px" 
        })
        
        $('#summernote').summernote({
            height: "300px",
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });
        
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
        // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            // CKEDITOR.replace( 'excerpt' );
            CKEDITOR.replace( 'body_', {
                //extraPlugins: 'easyimage',
                height: 400
            });
            
            //Save Draft        
            $('#draft-btn').click(function(e) {
                e.preventDefault();
                $('#published_at').val("");
                $('#post-form').submit();
            });
        })
        
    </script>