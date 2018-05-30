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
        opacity: .10 !important;
    }
    </style>

    <title>Habbo ~ {% block title %}{% endblock %}</title>

    <!-- TODO: favicon x2 (xBR or HQx scaled) -->
    <!--<link rel="icon" sizes="64x64" href="/favicon-x2.png">-->
    <link href="/web-gallery/styles/style.css" rel="stylesheet" type="text/css">
    <link href="/web-gallery/styles/ads.css" rel="stylesheet" type="text/css">
    <link href="/web-gallery/styles/boxes.css" rel="stylesheet" type="text/css">

    <script>
    var habboReqPath = "";
    var habboStaticFilePath = "/web-gallery";
    var habboImagerUrl = "/habbo-imaging/";
    document.habboLoggedIn = {{ logged_in|json_encode }};
    window.name = "habboMain";
    </script>

    <script src="/web-gallery/js/prototype.js"></script>
    <script src="/web-gallery/js/scriptaculous.js?load=effects"></script>
    <script src="/web-gallery/js/builder.js"></script>
    <script src="/web-gallery/js/habbo.js"></script>

    <meta content="" name="keywords">
    <meta content="" name="description">

    {% block custom_styles %}
    {% endblock %}

    {% block custom_javascript %}
    {% endblock %}

    <!--<link href="/web-gallery/styles/style_custom_nl.css" rel="stylesheet" type="text/css">-->
    <link href="/news/rss.xml" rel="alternate" title="Habbo Vandaag" type="application/rss+xml">

    <meta content="6.0.7 - 20070914090134 - nl" name="build">
    <meta name="vindretros" content="rolp2f9qm8ewb7c564ygjnhkt3xa10is" />
</head>

<body {% block body_attributes %}{% endblock %}>

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
                      <td id="topbar-count">{{ online_count }} members online</td>

                      <td align="center" id="topbar-menu">
                        <ul>
                          <li class="selected" id="myhabbo" onmouseover="switchTab('myhabbo')">
                            <div>
                              <a class="topbar-menu-link" href="/tab/myhabbo" onclick="return false;">My account</a>
                            </div>
                          </li>

                          <li id="mycredits" onmouseout="fadeTab('myhabbo')" onmouseover="if (switchTab('mycredits') && document.habboLoggedIn) updateCredits()">
                            <div>
                              <a class="topbar-menu-link" href="/tab/credits" onclick="return false;">My Credits</a>
                            </div>
                          </li>

                          <li id="habboclub" onmouseout="fadeTab('myhabbo')" onmouseover="if (switchTab('habboclub') && document.habboLoggedIn) updateHabboClub()">
                            <div>
                              <a class="topbar-menu-link" href="/tab/habboclub" onclick="return false;">Club</a>
                            </div>
                          </li>
                        </ul>
                      </td>

                        {% if not logged_in %}
                            <td class="notloggedin" id="topbar-status">
                                Not logged in
                            </td>
                        {% else %}
                            <td class="loggedin" id="topbar-status">
                                Logged in as <b>{{ user.username }}</b>
                            </td>
                        {% endif %}
                    </tr>
                </tbody>
            </table>

            {{ elements.getTopElements() }}

            <div id="tabmenu" onmouseout="fadeTab('myhabbo')" onmouseover="lockCurrentTab();" style="left: 260px;">
              <div id="tabmenu-content">
                {% if not logged_in %}
                    <div class="tabmenu-inner selected" id="myhabbo-content">
                      <img alt="" class="tabmenu-image" height="85" src="/web-gallery/images/top_bar/myhabbo_frank.gif" width="60">

                      <h3>
                          Welcome! Please sign in or register
                      </h3>

                      <div class="tabmenu-inner-content">
                        <p>
                          <a class="colorlink orange" href="/register">
                            <span>
                              Register, it's free!
                            </span>
                          </a>
                        </p>

                        <p>
                          <a class="colorlink orange last" href="/login">
                            <span>
                              Sign in
                            </span>
                          </a>
                        </p>
                      </div>
                    </div>

                    <div class="tabmenu-inner" id="mycredits-content">
                      <h3>
                        Please {{ link_to('/login', 'sign in') }} to see your balance
                      </h3>

                      <div class="tabmenu-inner-content">
                        <p>
                          <img alt="" class="tabmenu-image coins" height="21" src="/web-gallery/images/top_bar/mycredits_coins.gif" width="47">

                          <a class="arrow" href="/credits">
                            <span>
                              Buy more credits
                            </span>
                          </a>
                        </p>

                        <p>
                          <a class="arrow" href="/credits">
                            <span>
                                Redeem a voucher code
                            </span>
                          </a>
                        </p>
                      </div>
                    </div>

                    <div class="tabmenu-inner" id="habboclub-content">
                      <h3>
                        Please {{ link_to('/login', 'sign in') }} to see your Club status
                      </h3>

                      <div class="tabmenu-inner-content">
                        <p>
                          Habbo Club gives you the best benefits as a Habbo.
                        </p>

                        <p>
                          <a class="arrow" href="/club">
                            <span>
                                More on Habbo Club
                            </span>
                          </a>
                        </p>
                      </div>
                    </div>
                {% else %}
                    <div id="myhabbo-content" class="tabmenu-inner selected">
                        <h3>Welcome {{ user.username }}</h3>

                        <div class="tabmenu-inner-content">
                            <p>
                                <a href="{{ url('/client') }}" class="arrow" target="client" onclick="openOrFocusHabbo(this); return false;"><span>Enter the Hotel</span></a>
                            </p>
                            <p>
                                <a href="{{ url('/home/') ~ user.username }}" class="arrow"><span>View your personal homepage</span></a>
                            </p>
                            <p>
                                <a href="{{ url('/profile') }}" class="arrow"><span>Change avatar looks</span></a>
                            </p>
                            <p>
                                <a href="{{ url('/account/logout') }}" class="colorlink orange last"><span>Sign Out</span></a>
                            </p>
                        </div>
                    </div>
                    <div id="mycredits-content" class="tabmenu-inner">
                        <h3>My Credits</h3>

                        <div class="tabmenu-inner-content">
                            <p id="credits-status">
                                <img src="/web-gallery/images/progress_bubbles.gif" alt="" width="29" height="6" />
                            </p>
        <p>
                                <img src="/web-gallery/images/top_bar/mycredits_coins.gif" alt="" width="47" height="21" class="tabmenu-image coins" />
                                <a href="/credits" class="arrow"><span>Redeem a Coin or Furni Code</span></a>
                            </p>
                        </div>
                    </div>
                    <div id="habboclub-content" class="tabmenu-inner">
                        <h3>My Club status</h3>
                        <div class="tabmenu-inner-content">
                        <p id="habboclub-status">
                                <img src="/web-gallery/images/top_bar/mycredits_coins.gif" alt="" width="47" height="21" class="tabmenu-image coins" />
                            </p>
                        </div>
                    </div>
                {% endif %}

                <div class="clear"></div>
              </div>

              <div id="tabmenu-bottom"></div>
            </div>
        </div>

        {{ elements.getMenu() }}
      </div>
    </div>

    <div id="main-content">
        {% block content %}{% endblock %}
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
                          <p class="footer-legal">{{ elements.getFooterText() }}</p>
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
  <script src="/js/tabmenu.js"></script>
</div>

</body>
</html>
