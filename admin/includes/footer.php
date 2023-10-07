<script src="./assets/js/select2.min.js"></script>
<script src="./assets/js/form.js"></script>
<script src="./assets/js/site.js"></script>

<script>
    document.querySelector('form').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent form submission
            document.getElementById('add-btn').click();
        }
    });

    $('#single_select2').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: true
    });
    $('#single_select').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: true
    });
</script>
</body>

</html>