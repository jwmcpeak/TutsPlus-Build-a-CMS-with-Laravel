<script>
(function() {
    $('#published_at').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        sideBySide: true,
        date: '{{ $model->published_at }}'
    });
})();
</script>