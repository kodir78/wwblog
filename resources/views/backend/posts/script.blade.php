<script src="/assets/ckeditor/ckeditor.js"></script> 
<!-- Summernote -->
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
            CKEDITOR.replace( 'body', {
                //extraPlugins: 'easyimage',
                height: 400
            });
        })
        //Save Draft        
        $('#draft-btn').click(function(e) {
            e.preventDefault();
            $('#published_at').val("");
            $('#post-form').submit();
        });
        
        //Image Upload
        
    </script>