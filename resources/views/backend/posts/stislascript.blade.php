<script src="/assets/ckeditor/ckeditor.js"></script>    
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        // CKEDITOR.replace( 'excerpt' );
        CKEDITOR.replace( 'body', {
            extraPlugins: 'easyimage',
            height: 400
        });
        //width: '70%',
        
        
    </script>
    <script type="text/javascript">
        $('#title').on('blur', function(){
            var theTitle = this.value.toLowerCase().trim(),
            slugInput = $('#slug'),
            theSlug = theTitle.replace(/&/g, '-and-')
            .replace(/[^a-z0-9-]+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/^-+|-+$/g, '');
            
            slugInput.val(theSlug);
        });
    </script>
    {{-- <script type="text/javascript">
        $('#published_at').datetimepicker({
            format: "Y-m-d H:i:s",
            // format: 'YYYY-MM-DD HH:mm:ss',
        });
    </script> --}}
    <script type="text/javascript">
        $('#draft-btn').click(function(e) {
            e.preventDefault();
            $('#published_at').val("");
            $('#post-form').submit();
        });
    </script>