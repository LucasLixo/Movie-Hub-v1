<?php if (isset($results)): ?>
    <h1><?= esc($results['Title']) ?></h1>
    <section>
        <div class="table-wrapper">
            <table>
                <tbody>
                    <tr>
                        <th>Year</th>
                        <th>Rated</th>
                        <th>Released</th>
                        <th>Runtime</th>
                    </tr>
                    <tr>
                        <td><?= esc($results['Year']) ?></td>
                        <td><?= esc($results['Rated']) ?></td>
                        <td><?= esc($results['Released']) ?></td>
                        <td><?= esc($results['Runtime']) ?></td>
                    </tr>
                    <tr>
                        <th>Metascore</th>
                        <th>imdbRating</th>
                        <th>imdbVotes</th>
                        <th>imdbID</th>
                    </tr>
                    <tr>
                        <td><?= esc($results['Metascore']) ?></td>
                        <td><?= esc($results['imdbRating']) ?></td>
                        <td><?= esc($results['imdbVotes']) ?></td>
                        <td><a href="https://www.imdb.com/title/<?= esc($results['imdbID']) ?>/" target="_blank"><?= esc($results['imdbID']) ?></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-6 col-12-medium">
                <h3>Ratings</h3>
                <ul>
                    <?php foreach ($results['Ratings'] as $value): ?>
                        <li><?= esc($value['Source']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-6 col-12-medium">
                <h3>Ratings</h3>
                <ul>
                    <?php foreach ($results['Ratings'] as $value): ?>
                        <li><?= esc($value['Value']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-12-medium">
                <h2>Genre</h2>
                <p><?= esc($results['Genre']) ?></p>
            </div>
            <div class="col-6 col-12-medium">
                <h2>Director</h2>
                <p><?= esc($results['Director']) ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-12-medium">
                <h2>Writer</h2>
                <p><?= esc($results['Writer']) ?></p>
            </div>
            <div class="col-6 col-12-medium">
                <h2>Actors</h2>
                <p><?= esc($results['Actors']) ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-12-medium">
                <h2>Plot</h2>
                <p><?= esc($results['Plot']) ?></p>
            </div>
            <div class="col-6 col-12-medium">
                <h2>Language</h2>
                <p><?= esc($results['Language']) ?></p>
            </div>
        </div>
        <aside id="PlayerEmbed"></aside>
        <script>
            var type = "serie";
            var imdb = "<?= esc($results['imdbID']) ?>";
            var season = "1";
            var episode = "1";
            PlayerPlugin(type, imdb, season, episode);

            function PlayerPlugin(type, imdb, season, episode) {
                if (type == "filme") {
                    season = "";
                    episode = "";
                } else {
                    if (season !== "") {
                        season = "/" + season;
                    }
                    if (episode !== "") {
                        episode = "/" + episode;
                    }
                }
                var link = 'https://embed.warezcdn.link/' + type + '/' + imdb + season + episode + '#transparent';

                var frame = document.getElementById('PlayerEmbed');
                frame.innerHTML += '<iframe src="' + link + '" scrolling="no" frameborder="0" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen=""></iframe>';
                frame.innerHTML += '<a href="' + link + '" target="_blank">' + link + '</a>';
            }
        </script>
        <style>
            #PlayerEmbed {
                display: -moz-flex;
                display: -webkit-flex;
                display: -ms-flex;
                display: flex;
                -moz-flex-direction: column;
                -webkit-flex-direction: column;
                -ms-flex-direction: column;
                flex-direction: column;
                -moz-align-items: center;
                -webkit-align-items: center;
                -ms-align-items: center;
                align-items: center;
            }

            #PlayerEmbed iframe {
                -moz-background: #000000;
                -webkit-background: #000000;
                -ms-background: #000000;
                background: #000000;
                -moz-width: calc(100vw - 30vw);
                -webkit-width: calc(100vw - 30vw);
                -ms-width: calc(100vw - 30vw);
                width: calc(100vw - 30vw);
                -moz-height: calc((100vw - 30vw) * 9 / 16);
                -webkit-height: calc((100vw - 30vw) * 9 / 16);
                -ms-height: calc((100vw - 30vw) * 9 / 16);
                height: calc((100vw - 30vw) * 9 / 16);
            }
        </style>
    </section>
<?php endif; ?>