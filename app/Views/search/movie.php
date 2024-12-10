<div id="main">
    <div class="inner">
        <header>
            <h1><?= esc(isset($search) ? $search : $title) ?></h1>
        </header>
        <style>
            #main .inner header h1 {
                text-transform: capitalize;
            }
        </style>
        <?php if (key_exists('Search', $results)): ?>
            <section class="tiles">
                <?php foreach ($results['Search'] as $movie) : ?>
                    <article class="">
                        <span class="image">
                            <img src="<?= esc($movie['Poster']) ?>" alt="" />
                        </span>
                        <a href="<?= esc(base_url() . 'movie/details/' . aesEncrypt($movie['imdbID']) . '.html') ?>" target="_self">
                            <h2><?= esc($movie['Title']) ?></h2>
                            <div class="content">
                                <p><?= esc($movie['Year']) ?></p>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            </section>
            <header id="header" class="pages">
                <?php if ($page <= 1): ?>
                    <span></span>
                <?php else: ?>
                    <a href="<?= esc(base_url() . 'movie/search/' . ($page - 1) . '/' . $search) ?>" target="_self">
                        <svg xmlns="http://www.w3.org/2000/svg" height="2rem" viewBox="0 -960 960 960" width="2rem">
                            <path d="M400-80 0-480l400-400 71 71-329 329 329 329-71 71Z" />
                        </svg>
                        <span><?= esc($page - 1) ?></span>
                    </a>
                <?php endif; ?>
                <a href="<?= esc(base_url() . 'movie/search/' . $page . '/' . $search . '#') ?>" target="_self">
                    <span><?= esc($page . ' - ' . intval($results['totalResults'] / 10)) ?></span>
                </a>
                <?php if ($page >= intval($results['totalResults'] / 10)): ?>
                    <span></span>
                <?php else: ?>
                    <a href="<?= esc(base_url() . 'movie/search/' . ($page + 1) . '/' . $search) ?>" target="_self">
                        <span><?= esc($page + 1) ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="2rem" viewBox="0 -960 960 960" width="2rem">
                            <path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z" />
                        </svg>
                    </a>
                <?php endif; ?>
            </header>
            <style>
                .pages {
                    display: -moz-flex;
                    display: -webkit-flex;
                    display: -ms-flex;
                    display: flex;
                    -moz-flex-wrap: wrap;
                    -webkit-flex-wrap: wrap;
                    -ms-flex-wrap: wrap;
                    flex-wrap: wrap;
                    -moz-justify-content: space-between;
                    -webkit-justify-content: space-between;
                    -ms-justify-content: space-between;
                    justify-content: space-between;
                }

                .pages a span {
                    -moz-font-size: 2rem;
                    -webkit-font-size: 2rem;
                    -ms-font-size: 2rem;
                    font-size: 2rem;
                    -moz-font-weight: bold;
                    -webkit-font-weight: bold;
                    -ms-font-weight: bold;
                    font-weight: bold;
                }

                .pages a svg {
                    -moz-fill: #585858;
                    -webkit-fill: #585858;
                    -ms-fill: #585858;
                    fill: #585858;
                }

                .pages a:hover svg {
                    -moz-fill: #f2849e !important;
                    -webkit-fill: #f2849e !important;
                    -ms-fill: #f2849e !important;
                    fill: #f2849e !important;
                }
            </style>
        <?php endif; ?>
    </div>
</div>