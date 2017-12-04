<script>
    window.addEventListener('load', function(e) {

        $('#published_at').datetimepicker({
            allowInputToggle: true,
            format: 'YYYY-MM-DD HH:mm:ss',
            showClear: true,
            defaultDate: '{{ $model->published_at }}'
        });

        $('#title').on('blur', function(e) {
            let slugEl = $('#slug');

            if (slugEl.val()) {
                return;
            }

            slugEl.val(this.value.toLowerCase().replace(/[^a-z0-9-]+/g,'-').replace(/^-+|-+$/g, ''))

        })
    });
</script>