    <?php if (isset($js) && !empty($js)) : ?>
        <?php foreach ($js as $j) : ?>
            <script type="application/javascript" src="./assets/scripts/<?= $j ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <script type="application/javascript" defer>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('html').style.display = 'block';
        });
    </script>
</body>
</html>