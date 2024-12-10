$(document).ready(function() {
    var texts = [
        "Search for any movie, series!",
        "All content dubbed or subtitled!",
        "Nothing appears? Try searching in English.",
    ];

    var currentTextIndex = 0;
    var typingDelay = 100;
    var erasingDelay = 50;
    var pauseDelay = 3000;

    var typingContainer = $('#text-placeholder');

    function typeText(text, index, callback) {
        if (index < text.length) {
            typingContainer.append(text.charAt(index));
            setTimeout(function() {
                typeText(text, index + 1, callback);
            }, typingDelay);
        } else {
            setTimeout(callback, pauseDelay);
        }
    }

    function eraseText(callback) {
        var text = typingContainer.text();
        if (text.length > 0) {
            typingContainer.text(text.slice(0, -1));
            setTimeout(function() {
                eraseText(callback);
            }, erasingDelay);
        } else {
            setTimeout(callback, typingDelay);
        }
    }

    function cycleText() {
        var text = texts[currentTextIndex];
        typeText(text, 0, function() {
            eraseText(function() {
                currentTextIndex = (currentTextIndex + 1) % texts.length;
                cycleText();
            });
        });
    }

    cycleText();

});