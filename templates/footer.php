<!-- Footer -->
<footer class="text-center py-3 mt-auto">
    <p class="mb-0">© 2025 ITVO. Todos los derechos reservados.</p>
    <p class="mb-0">Contacto: developer-itvo@voaxaca.tecnm.mx</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
    document.querySelectorAll('a[data-form]').forEach(link => {
        link.addEventListener('click', async function(event) {
            event.preventDefault(); // evita navegación
            const filename = this.getAttribute('data-form');
            const response = await fetch(`${filename}.php`);
            document.getElementById('content').innerHTML = await response.text();
        });
    });

</script>

</html>
