<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>oldHabbo ~ Client instructions</title>

    <link rel="icon" href="/favicon.png" sizes="16x16">
    <link href="/web-gallery/styles/style.css" type="text/css" rel="stylesheet"/>

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

        <br><br>
            <img src="/web-gallery/images/client/no_chrome.png">
            <img src="/web-gallery/images/client/no_mozilla.png">
            <img src="/web-gallery/images/client/no_opera.png">
            <img src="/web-gallery/images/client/yes_pale.png"><br><br>
            Current browsers no longer support Shockwave Player.<br><br>
            You can use Pale Moon in its 32-bit version, both the <a href="https://www.palemoon.org/palemoon-win32.shtml" target="_blank">normal</a> and <a href="https://www.palemoon.org/palemoon-portable.shtml" target="_blank">portable</a> version. <br><br>
            You can also use Internet Explorer, but it is not recommended for its instability and continuous crashes.<br>
            If you still want to use it, you will need to use a version of Shockwave Player prior to 11.5.<br>
            You can download the 10.1.3 <a href="https://www.adobe.com/go/sw_full_exe_installer" target="_blank">here</a>.<br><br>
            <a href="https://www.adobe.com/go/sw_full_exe_installer" target="_blank"><img src="/web-gallery/images/client/getshockwavenew.gif" border="0" style="border: 0"></a><br>
            <a href="https://www.adobe.com/go/sw_full_exe_installer" target="_blank">Download Shockwave Player</a>.<br><br>
            If you followed the steps you can visit this page again in Pale Moon 32-bit and all should be well.


    </div>

    <script language="JavaScript" type="text/javascript" src="/js/client.js"></script>
</body>
</html>