<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>oldHabbo ~ Client instructions</title>

    <link rel="icon" href="/favicon.png" sizes="16x16">
    <link href="/web-gallery/styles/style.css" type="text/css" rel="stylesheet"/>
    <link href="/css/client.css" type="text/css" rel="stylesheet"/>

    <script language="JavaScript" type="text/javascript">
    var habboClient = true;
    var habboReqPath = "/";
    var habboStaticFilePath = "/web-gallery/";
    document.habboLoggedIn = {{ logged_in|json_encode }};
    </script>

    <script language="JavaScript" type="text/javascript" src="/web-gallery/js/prototype.js"></script>
    <script language="JavaScript" type="text/javascript" src="/web-gallery/js/effects.js"></script>

    <script src="/web-gallery/js/habbo.js" language="JavaScript" type="text/javascript"></script>
    <script type="text/javascript" language="javascript">
    window.onload = resizeWin;
    window.onerror = function() { return true; };
    window.onunload = clearOpener;
    ensureOpenerIsLoggedIn();
    addClientUnloadHook();
    Event.observe(document, "keypress", function(e) { if (e.keyCode == Event.KEY_BACKSPACE) { Event.stop(e); } });
    </script>

    <!--[if IE]>
    <link href="/web-gallery/ie-all.css" type="text/css" rel="stylesheet" />
    <![endif]-->
    <!--[if lt IE 7]>
    <link href="/web-gallery/ie6.css" type="text/css" rel="stylesheet" />
    <![endif]-->

    <meta name="build" content="5.0.14 - 20070808153637 - uk" />
</head>

<body id="client">

    <div id="client-topbar" style="display:none">
      <div class="logo"><img src="/web-gallery/images/popup/popup_topbar_habbologo.gif" alt="" align="middle"/></div>
      <div class="habbocount">
          <div id="habboCountUpdateTarget">{{ online_count }} members online</div>
      </div>
      <div class="logout"><a href="/account/logout?origin=popup">logout</a></div>
    </div>

    <div>

        The hotel is closed. Come back later.

    </div>

    <script language="JavaScript" type="text/javascript" src="/js/polyfill.min.js"></script>
    <!-- TODO: better fetch API polyfill that works in Pale Moon -->
    <script language="JavaScript" type="text/javascript" src="/js/unfetch.umd.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/client.js"></script>
</body>
</html>