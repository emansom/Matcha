<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>oldHabbo ~ Client</title>

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
        <object classid='clsid:166B1BCA-3F9C-11CF-8075-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=10,8,5,1,0' id='habbo' width='720' height='540'>
                <param name='src' value='{{ dcr }}'>
                <param name='swRemote' value='swSaveEnabled='true' swVolume='true' swRestart='false' swPausePlay='false' swFastForward='false' swTitle='Habbo Hotel' swContextMenu='true' '>
                <param name='swStretchStyle' value='none'>
                <param name='swText' value=''>

                <param name='bgColor' value='#000000'>

                {% if logged_in %}
                    <param name='sw6' value='use.sso.ticket=1;sso.ticket={{ user.sso_ticket }}'>
                {% endif %}

                <!-- TODO: forwardId room etc -->

                <param name='sw2' value='connection.info.host={{ server_host }};connection.info.port={{ server_port }}'>
                <param name='sw4' value='connection.mus.host={{ mus_host }};connection.mus.port={{ mus_port }}'>
                <param name='sw3' value='client.reload.url=https://beta.oldhabbo.com/client'>
                <param name='sw1' value='site.url=https://beta.oldhabbo.com;url.prefix=https://beta.oldhabbo.com'>
                <param name='sw5' value='external.variables.txt={{ external_variables }};external.texts.txt={{ external_texts }}'>
                <param name='sw8' value='client.allow.cross.domain=1;client.notify.cross.domain=0'>
                {# <param name='sw7' value='forward.type=2;forward.id=1049'> #}

                {# You need Shockwave plugin (free and safe to download) in order to enter Habbo Hotel. <a href="/hotel/tour" target="habboMain">Read more >></a> #}

                <embed src='{{ dcr }}' bgColor='#000000' width='720' height='540' swRemote='swSaveEnabled='true' swVolume='true' swRestart='false' swPausePlay='false' swFastForward='false' swTitle='Habbo Hotel' swContextMenu='true'' swStretchStyle='none' swText='' type='application/x-director' pluginspage='http://www.macromedia.com/shockwave/download/'
                {% if logged_in %}sw6='use.sso.ticket=1;sso.ticket={{ user.sso_ticket }}'{% endif %}
                sw2='connection.info.host={{ server_host }};connection.info.port={{ server_port }}'
                sw4='connection.mus.host={{ mus_host }};connection.mus.port={{ mus_port }}'
                sw3='client.reload.url=https://beta.oldhabbo.com/client'
                sw1='site.url=https://beta.oldhabbo.com;url.prefix=https://beta.oldhabbo.com'
                {# sw7='forward.type=2;forward.id=1049' #}
                sw8='client.allow.cross.domain=1;client.notify.cross.domain=0'
                sw5='external.variables.txt={{ external_variables }};external.texts.txt={{ external_texts }}'></embed>
                <noembed>You need Shockwave plugin (free and safe to download) in order to enter Habbo Hotel. <a href="/hotel/tour" target="habboMain">Read more >></a></noembed>
        </object>
    </div>

    <script language="JavaScript" type="text/javascript" src="/js/polyfill.min.js"></script>
    <!-- TODO: better fetch API polyfill that works in Pale Moon -->
    <script language="JavaScript" type="text/javascript" src="/js/unfetch.umd.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/client.js"></script>
</body>
</html>