(function() {
    function confirmDelete(target) {
        var action = target.href;
        var message = target.getAttribute('data-message');
        var formId = target.getAttribute('data-form');

        if (confirm(message)) {
            var form = document.getElementById(formId);
            form.action = action;
            form.submit();
        }
    }

    document.addEventListener('click', function(e) {
        var target = e.target;
        if (target.className && target.classList.contains('delete-link')) {
            e.preventDefault();
            confirmDelete(e.target);
        }
    });
    
})();