<script>
    document.querySelector('form').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent form submission
            document.getElementById('add-btn').click();
        }
    });
</script>
</body>

</html>