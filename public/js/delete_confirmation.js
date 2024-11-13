document.addEventListener('DOMContentLoaded', function() {
    let deleteButtons = document.querySelectorAll('button[data-id]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            let articleId = this.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this article!!! ?')) {
                document.getElementById('deleteForm' + articleId).submit();
            }
        });
    });
});

