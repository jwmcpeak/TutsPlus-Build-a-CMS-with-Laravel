<script>
(function() {
    $('#published_at').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        sideBySide: true,
        date: '{{ $model->published_at }}'
    });

    document.getElementById('title').addEventListener('blur', function(e) {
        let slug = document.getElementById('slug');

        if (slug.value) {
            return;
        }

        slug.value = this.value
            .toLowerCase()
            .replace(/[^a-z0-9-]+/g, '-')
            .replace(/^-+|-+$/g, '');
    });
})();
</script>