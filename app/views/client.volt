
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <title>Kepler</title>

        <style>
        body {
                background-color: black;
        }

        #client {
                text-align: center;
        }
        </style>

</head>
<body>
        <div id="client">
                <object classid='clsid:166B1BCA-3F9C-11CF-8075-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=10,8,5,1,0' id='habbo' width='720' height='540'>
                        <param name='src' value='{{ dcr }}'>
                        <param name='swRemote' value='swSaveEnabled='true' swVolume='true' swRestart='false' swPausePlay='false' swFastForward='false' swTitle='Habbo Hotel' swContextMenu='true' '>
                        <param name='swStretchStyle' value='none'>
                        <param name='swText' value=''>

                        <param name='bgColor' value='#000000'>

                        {% if logged_in %}
                            <param name='sw6' value='use.sso.ticket=1;sso.ticket={{ user.sso_ticket }}'>
                        {% endif %}

                        <param name='sw2' value='connection.info.host=beta.oldhabbo.com;connection.info.port=12321'>
                        <param name='sw4' value='connection.mus.host=beta.oldhabbo.com;connection.mus.port=12322'>
                        <param name='sw3' value='client.reload.url=https://beta.oldhabbo.com/client'>
                        <param name='sw1' value='site.url=https://beta.oldhabbo.com;url.prefix=https://beta.oldhabbo.com'>
                        <param name='sw5' value='external.variables.txt={{ external_variables }};external.texts.txt={{ external_texts }}'>

                        <embed src='{{ dcr }}' bgColor='#000000' width='720' height='540' swRemote='swSaveEnabled='true' swVolume='true' swRestart='false' swPausePlay='false' swFastForward='false' swTitle='Habbo Hotel' swContextMenu='true'' swStretchStyle='none' swText='' type='application/x-director' pluginspage='http://www.macromedia.com/shockwave/download/'
                        {% if logged_in %}sw6='use.sso.ticket=1;sso.ticket={{ user.sso_ticket }}'{% endif %}
                        sw2='connection.info.host=beta.oldhabbo.com;connection.info.port=12321'
                        sw4='connection.mus.host=beta.oldhabbo.com;connection.mus.port=12322'
                        sw3='client.reload.url=https://beta.oldhabbo.com/client'
                        sw1='site.url=https://beta.oldhabbo.com;url.prefix=https://beta.oldhabbo.com'
                        sw5='external.variables.txt={{ external_variables }};external.texts.txt={{ external_texts }}'></embed>
                </object>
        </div>
</body>
</html>
