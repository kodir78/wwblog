<script type="text/javascript">
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        
        $('#name').on('blur', function() {
            var theTitle = this.value.toLowerCase().trim(),
            slugInput = $('#slug'),
            theSlug = theTitle.replace(/&/g, '-and-')
            .replace(/[^a-z0-9-]+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/^-+|-+$/g, '');
            
            slugInput.val(theSlug);
        });
    })
</script>
