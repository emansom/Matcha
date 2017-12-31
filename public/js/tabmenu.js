// Use a closure to not leak globals
// TODO: less hacky, let's embrace modern standards
(function(w, d) {
    var $ = d.querySelector.bind(d);
    var $$ = d.querySelectorAll.bind(d);

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
        $('#topbar-count').innerText = text;
    }

    // Update online count every 30 seconds
    // TODO: randomize between 20 and 40 seconds
    setInterval(fetchOnlineCount, 30000);

    // Update on page load too
    fetchOnlineCount();

    function fetchUserDetails() {
        fetch('/topbar/user-details', {
            credentials: 'same-origin'
        })
        .then(function(res) {
            console.log(res);
            return res.json();
        })
        .catch(function(err) {
            console.error('Error', err);
        })
        .then(updateUserDetails);
    }

    function updateUserDetails(details) {
        console.log(details);
        var loggedIn = "user" in details;

        if (!loggedIn) {
            return;
        }

        d.habboLoggedIn = true;

        $('#topbar-status').innerHTML = `Logged in as <b>${details.user.username}</b>`;
        $('#topbar-status').classList.remove("notloggedin");
        $('#topbar-status').classList.add('loggedin');

        setTabMenuContent(details.user);
    }

    function setTabMenuContent(user) {
        $('#tabmenu-content').innerHTML = `
<div id="myhabbo-content" class="tabmenu-inner selected">
    <h3>Welcome ${user.username}</h3>
    <div class="tabmenu-inner-content">
        <!-- TODO: show Enter the Hotel conditionally -->
        <p>
            <a href="/client" class="arrow" target="client" onclick="openOrFocusHabbo(this); return false;">
                <span>Enter the Hotel</span>
            </a>
        </p>
        <p>
            <a href="/home/${user.username}" class="arrow">
                <span>View your personal homepage</span>
            </a>
        </p>
        <p>
            <a href="/profile" class="arrow">
                <span>Change avatar looks</span>
            </a>
        </p>
        <p>
            <a href="/account/logout" class="colorlink orange last">
                <span>Sign Out</span>
            </a>
        </p>
    </div>
</div>

<div id="mycredits-content" class="tabmenu-inner">
    <h3>My Credits</h3>
    <div class="tabmenu-inner-content">
        <p id="credits-status"> <img src="/web-gallery/images/progress_bubbles.gif" alt="" width="29" height="6"> </p>
        <p> <img src="/web-gallery/images/top_bar/mycredits_coins.gif" alt="" width="47" height="21" class="tabmenu-image coins"> <a href="/credits" class="arrow"><span>Redeem a Coin or Furni Code</span></a> </p>
    </div>
</div>

<div id="habboclub-content" class="tabmenu-inner">
    <h3>My Club status</h3>
    <div class="tabmenu-inner-content">
        <p id="habboclub-status"> <img src="/web-gallery/images/top_bar/mycredits_coins.gif" alt="" width="47" height="21" class="tabmenu-image coins"> </p>
    </div>
</div>

<div class="clear"></div>`;
    }

    fetchUserDetails();
})(window, document);