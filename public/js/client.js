(function(d) {
    var $ = d.querySelector.bind(d);

    function fetchOnlineCount() {
        fetch('/topbar/online-count')
        .then(function(res) {
            return res.text();
        })
        .catch(function(err) {
            console.error('Error:', err);
        })
        .then(updateOnlineCount);
    }

    function updateOnlineCount(text) {
        // TODO: the old update count animation (I think it was easing out bold text)
        $('#habboCountUpdateTarget').innerText = text;
    }

    // Update online count every 30 seconds
    // TODO: randomize between 20 and 40 seconds
    setInterval(fetchOnlineCount, 30000);

    // Update on page load too
    fetchOnlineCount();
})(document);