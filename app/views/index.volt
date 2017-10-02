<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <!-- TODO: scaleable layout -->
    <!--<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">-->

    <style>
    body {
        image-rendering: pixelated;
    }
    #top {
        background-image: url(/c_images/album2121/top_bar_room_UK.gif) !important;
    }
    #topdim {
        opacity: .20 !important;
    }
    </style>

     <!--<script src="/web-gallery/js/webcomponents.js"></script>-->

    <title>Habbo ~ Habbo</title>

    <!-- TODO: favicon x2 (xBR or HQx scaled) -->
    <!--<link rel="icon" sizes="64x64" href="/favicon-x2.png">-->
    <link href="/web-gallery/styles/style.css" rel="stylesheet" type="text/css">
    <link href="/web-gallery/styles/ads.css" rel="stylesheet" type="text/css">
    <link href="/web-gallery/styles/boxes.css" rel="stylesheet" type="text/css">

    <script>
    var habboReqPath = "";
    var habboStaticFilePath = "/web-gallery";
    var habboImagerUrl = "/habbo-imaging/";
    document.habboLoggedIn = { s->has('logged_in'); };
    window.name = "habboMain";
    </script>

    <script src="/web-gallery/js/prototype.js"></script>
    <script src="/web-gallery/js/scriptaculous.js?load=effects"></script>
    <script src="/web-gallery/js/builder.js"></script>
    <script src="/web-gallery/js/habbo.js"></script>

    <meta content="" name="keywords">
    <meta content="" name="description">

    <!--<link href="/web-gallery/styles/style_custom_nl.css" rel="stylesheet" type="text/css">-->
    <link href="/news/rss.xml" rel="alternate" title="Habbo Vandaag" type="application/rss+xml">

    <meta content="6.0.7 - 20070914090134 - nl" name="build">

</head>

<body id="home">

  <div id="overlay"></div>

  <h1 id="main-header">Habbo</h1>

  <div id="wrapper">
    <!--<div id="ad-leader-container" style="text-align: center"></div>-->

    <div id="top_wrap">
      <div id="top">
        <div id="topdim"></div>

        <div id="top-elements">
            <div id="topdim"></div>
            <table id="topbar">
                <tbody>
                    <tr>
                      <td id="topbar-count">{{ onlineCount }} Habbos in het Hotel</td>

                      <td align="center" id="topbar-menu">
                        <ul>
                          <li class="selected" id="myhabbo" onmouseover="switchTab('myhabbo')">
                            <div>
                              <a class="topbar-menu-link" href="/tab/myhabbo" onclick="return false;">Mijn Habbo</a>
                            </div>
                          </li>

                          <li id="mycredits" onmouseout="fadeTab('myhabbo')" onmouseover="if (switchTab('mycredits') &amp;&amp; document.habboLoggedIn) updateCredits()">
                            <div>
                              <a class="topbar-menu-link" href="/tab/credits" onclick="return false;">Mijn Credits</a>
                            </div>
                          </li>

                          <li id="habboclub" onmouseout="fadeTab('myhabbo')" onmouseover="if (switchTab('habboclub') &amp;&amp; document.habboLoggedIn) updateHabboClub()">
                            <div>
                              <a class="topbar-menu-link" href="/tab/habboclub" onclick="return false;">Habbo Club</a>
                            </div>
                          </li>
                        </ul>
                      </td>

                      <td class="notloggedin" id="topbar-status">
                        <!-- Welkom <b>PEjump<b>! -->
                        Niet ingelogd
                      </td>
                    </tr>
                </tbody>
            </table>
            {{ elements.getTopElements() }}

            <div id="tabmenu" onmouseout="fadeTab('myhabbo')" onmouseover="lockCurrentTab();" style="left: 260px;">
              <div id="tabmenu-content">
                <div class="tabmenu-inner selected" id="myhabbo-content">
                  <img alt="" class="tabmenu-image" height="85" src="/web-gallery/images/top_bar/myhabbo_frank.gif" width="60">

                  <h3>
                    Welkom! Log in of maak een account
                  </h3>

                  <div class="tabmenu-inner-content">
                    <p>
                      <a class="colorlink orange" href="/login">
                        <span>
                          Registreren is gratis!
                        </span>
                      </a>
                    </p>

                    <p>
                      <a class="colorlink orange last" href="/login">
                        <span>
                          Log in
                        </span>
                      </a>
                    </p>
                  </div>
                </div>

                <div class="tabmenu-inner" id="mycredits-content">
                  <h3>
                    <!-- <a href="/login">Log in</a> om je Portemonnee te zien -->
                    <a href="/login">{{ _("Login") }}</a> {{ _("to see your Purse") }}
                  </h3>

                  <div class="tabmenu-inner-content">
                    <p>
                      <img alt="" class="tabmenu-image coins" height="21" src="/web-gallery/images/top_bar/icon_mycredits.gif" width="47">

                      <a class="arrow" href="/tab/credits">
                        <span>
                          <!-- Credits kopen -->
                          {{ _("Buy credits") }}
                        </span>
                      </a>
                    </p>

                    <p>
                      <a class="arrow" href="/tab/redeem">
                        <span>
                          <!-- Een Credit- of Meubicode verzilveren -->
                          {{ _("Redeem your Credit- or Furnicode") }}
                        </span>
                      </a>
                    </p>
                  </div>
                </div>

                <div class="tabmenu-inner" id="habboclub-content">
                  <h3>
                    <!-- <a href="/login">Log in</a> om je Clubstatus te zien -->
                    <a href="/login">{{ _("Login") }}</a> {{ _("to see your club status") }}
                  </h3>

                  <div class="tabmenu-inner-content">
                    <p>
                      <!-- Habbo Club biedt vele extra opties in Habbo Hotel. -->
                      {{ _("Habbo Club extra options blaat") }}
                    </p>

                    <p>
                      <a class="arrow" href="/tab/habboclub">
                        <span>
                          <!-- Het laatste Habbo Club nieuws -->
                          {{ _("Latest Habbo Club news") }}
                        </span>
                      </a>
                    </p>
                  </div>
                </div>

                <div class="clear"></div>
              </div>

              <div id="tabmenu-bottom"></div>
            </div>
        </div>

        {{ elements.getMainMenu() }}
        {{ elements.getSubMenu() }}
      </div>
    </div>

    <div id="main-content">
        {{ content() }}
    </div>

    <div id="outer">
      <div id="outer-content">
          <div id="footer">
          	<div id="footer-top"><div id="footer-content">				<p>
                                {{ link_to("/", "Home") }}
          						|
                                {{ link_to("/hotel", "New?") }}
          						|
                                {{ link_to("/club", "Club") }}
          						|
                                {{ link_to("/community", "Community") }}
          						|
                                {{ link_to("/games", "Games") }}
          						|
                                {{ link_to("/entertainment", "Entertainment") }}
          						|
                                {{ link_to("/credits", "Credits") }}
          						|
                                {{ link_to("/help", "Help") }}
          				</p>
          				<p>
                            {{ link_to("/credits", "Get credits") }} |
                            {{ link_to("/club", "Club") }}
          				</p>
          	    		<p>
                            {{ link_to("/footer_pages/privacy_policy", "Privacy Policy") }} |
                            {{ link_to("/help/parents_guide", "Parents' Guide") }} |
                            {{ link_to("/footer_pages/terms_and_conditions", "Terms &amp; Conditions") }}
                        </p>
          	    		<p class="footer-legal">
                            oldHabbo is not affiliated with, endorsed, sponsored, or specifically approved by Sulake Corporation Oy or its Affiliates.<br />
                            Sulake Corporation Oy are not responsible for any content on oldHabbo and the views and opinions expressed herein are not necessarily the views and opinions of Sulake.
                        </p>
          </div></div>
          	<div id="footer-bottom"><div id="footer-bottom-content"></div></div>
          </div>
      </div>
    </div>

    <div id="outer-bottom">
      <div id="outer-bottom-content">
      </div>
    </div>

    <!--<script type="text/javascript">
    $("ad-leader-container").appendChild($("ad-leader"));
  </script>-->
</div>

<!-- <script src="/web-gallery/js/grapnel.min.js"></script>
<script>var Router = new Grapnel({pushState: true});</script> -->
<!--<script src="/web-gallery/js/react.min.js"></script>-->
<!--<script src="/web-gallery/js/tag.min.js"></script>-->
<!-- <script src="/web-gallery/js/bundle.js"></script> -->
<!-- <script src="/web-gallery/js/app.js"></script> -->
<script>
var playPreview;
playPreview = function(target) {
  audio = target.querySelector('audio');

  if (audio == null) {
    audio = new Audio();

    audio.preload = 'none';
    audio.src = target.href;
    audio.hidden = true;
    audio.style.display = 'none';

    // TODO: custom icon for error
    audio.onpause = audio.onerror = audio.onended = function() {
      this.parentElement.querySelector('img').src = "/c_images/album2304/musicsample_icon.gif";
    }

    audio.onplaying = function() {
      this.parentElement.querySelector('img').src = "/c_images/album2304/musicsample_pause.png";
    }

    target.appendChild(audio);
  }

  if (audio.paused) {
    audio.play();
  } else {
    audio.pause();
  }

  return false;
};
</script>

</body>
</html>
