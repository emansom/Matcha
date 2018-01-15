(function(d) {
    "use strict";

    function fetchOnlineCount() {
        unfetch('/topbar/online-count')
        .then(function(res) {
            return res.text();
        })
        .catch(function(err) {
            console.error('Error:', err);
        })
        .then(updateOnlineCount);
    }

    function updateOnlineCount(text) {
        var current = d.querySelector('#habboCountUpdateTarget').innerText;
        var onlineCount = current.replace(',', '').replace('.', '').match(/\d+/g)[0];
        var newCount = text.replace(',', '').replace('.', '').match(/\d+/g)[0];

        // Don't update if the count didn't change
        if (onlineCount == newCount) {
            return;
        }

        // Init keyframe animation
        d.querySelector('#habboCountUpdateTarget').classList.add('updated');

        // Swap in new count when animation is at 50%
        setTimeout(function() {
            d.querySelector('#habboCountUpdateTarget').innerText = text;
        }, 500);

        // Deinit the animation after two seconds
        setTimeout(function() {
            d.querySelector('#habboCountUpdateTarget').classList.remove('updated');
        }, 2000);
    }

    // Update online count every 30 seconds
    // TODO: randomize between 20 and 40 seconds
    setInterval(fetchOnlineCount, 30000);

    // Update on page load too
    fetchOnlineCount();
})(document);