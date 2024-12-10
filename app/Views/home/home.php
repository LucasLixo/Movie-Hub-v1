<div id="main">
    <div class="inner">
        <?= form_open(base_url() . '#', $form); ?>
            <label for="search">
                <span id="text-placeholder"></span>
                <span id="text-cursor">|</span>
            </label>
            <?= form_input($input); ?>
            <?= form_label('Type', 'type'); ?>
            <?= form_dropdown('', $dropdown, $selected, $select); ?>
            <?= form_label('Search', 'submit'); ?>
            <ul class="actions">
                <li><?= form_submit('search', 'Search', ['class' => 'primary']); ?></li>
            </ul>
        <?= form_close(); ?>
        <script defer>
            document.querySelector('form').addEventListener('submit', function(event) {
                event.preventDefault();

                const type = document.querySelector('#type').value;
                const search = encodeURIComponent(document.querySelector('#search').value.trim());

                const validTypes = <?= json_encode(array_keys($dropdown)) ?>;

                if (!validTypes.includes(type)) {
                    alert('Invalid type selected.');
                    return;
                }

                if (!search) {
                    alert('Please enter a search term.');
                    return;
                }

                const redirectUrl = `<?= esc(base_url()) ?>${type}/search/1/${search}`;
                window.location.href = redirectUrl;
            });
        </script>
    </div>
</div>