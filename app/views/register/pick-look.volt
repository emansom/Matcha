{% extends 'templates/bare.volt' %}

{% block title %}Registration ~ Choose your look{% endblock %}

{% block custom_javascript %}
    <script src="/web-gallery/js/swfobject.js"></script>
    <script language="JavaScript" type="text/javascript" src="/web-gallery/js/registration.js"></script>
    {# <script src="/web-gallery/static/js/libs2.js" type="text/javascript"></script>
    <script src="/web-gallery/static/js/visual.js" type="text/javascript"></script>
    <script src="/web-gallery/static/js/libs.js" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript" src="/web-gallery/js/common.js"></script>
    <script language="JavaScript" type="text/javascript" src="/web-gallery/js/settings.js"></script> #}

    {# TODO: do fetch POST request to save-register-look
    also save to localStorage? #}
    <script>
    var HabboEditor = {};
    HabboEditor.setGenderAndFigure = function(gender, figure) {
        document.querySelector("#gender-hidden-input").value = gender;
        document.querySelector('#figure-hidden-input').value = figure;
    }
    </script>
{% endblock %}

{% block custom_styles %}
    <style>
    .content-column1 {
        width: 227px !important;
    }
    .content-column2 {
        width: 452px !important;
    }
    </style>
{% endblock %}

{% block body %}
<body id="registration">
    <h1 id="main-header">Habbo</h1>

    <div id="process-wrapper">
    	<div id="process-header"><div id="process-header-body"><div id="process-header-content">
    		<div id="habbologo">{{ link_to('/') }}</div>
    		<div id="steps">
    <img src="/web-gallery/images/process/step1_on.gif" alt="1" width="30" height="26" />
    <img src="/web-gallery/images/process/step_right_on.gif" alt="" width="20" height="26" />
    <img src="/web-gallery/images/process/step2.gif" alt="2" width="30" height="26" />
    {# <img src="/web-gallery/images/process/step_right.gif" alt="" width="20" height="26" />
    <img src="/web-gallery/images/process/step3.gif" alt="3" width="30" height="26" />
    <img src="/web-gallery/images/process/step_right.gif" alt="" width="20" height="26" />
    <img src="/web-gallery/images/process/step4.gif" alt="4" width="30" height="26" />
    <img src="/web-gallery/images/process/step_right.gif" alt="" width="20" height="26" />
    <img src="/web-gallery/images/process/step5.gif" alt="5" width="30" height="26" /> #}
    </div>
    	</div></div></div>
    	<div id="outer"><div id="outer-content">
    <div class="processbox">
    	<div class="headline"><div class="headline-content"><div class="headline-wrapper">

    		<h2>Registration <a href="/" class="exit">Cancel</a></h2>
    	</div></div></div>
    	<div class="content-top">
    		<div class="content">

    	<div class="content-column1">

    		<div class="bubble">
    			<div class="bubble-body">
    Now the fun begins! Choose what you want to look like!
    			<div class="clear"></div>

    			</div>
    		</div>
    		<div class="bubble-bottom">
    			<div class="bubble-bottom-body">
    				<img src="/web-gallery/images/register/bubble_tail_left.gif" alt="" width="22" height="31" />
    			</div>
    		</div>
    		<div class="frank"><img src="/web-gallery/images/register/register7.gif" alt="" width="245" height="181" /></div>

    	</div>


    	<div class="content-column2">

    <div id="process-errors">
    <div class="content-red">
    	<div class="content-red-body" id="process-errors-content">
    	<div class="clear"></div>
    	</div>
    </div>
    <div class="content-red-bottom"><div class="content-red-bottom-body"></div></div>
    </div>

    <div class="content-white-outer">
    	<div class="content-white">

    		<div class="content-white-body">

    <div class="content-white-content">
        <div id="flashcontent">
        You don't have Flash 7 or newer installed or you have JavaScript disabled.
        </div>

        <form method="post" action="/register/step2" id="register-form">
            <input type="hidden" name="figure" id="figure-hidden-input" value="{{ figure }}" />
            <input type="hidden" name="gender" id="gender-hidden-input" value="{{ gender }}" />

            <div id="register-buttons">
                <div align="right">
                    <input type="submit" value="Continue" id="continuebtn" class="process-button" />
                </div>


                <div class="clear"></div>
            </div>
        </form>
    </div>
    		<div class="clear"></div>
    		</div>
    	</div>
    	<div class="content-white-bottom">
    		<div class="content-white-bottom-body"></div>
    	</div>
    </div>

    	</div>


    			<div class="clear"></div>
    		</div>
    	</div>
    	<div class="content-bottom"><div class="content-bottom-content"></div></div>
    </div>

    <script type="text/javascript" language="JavaScript">
    var swfobj = new SWFObject("/web-gallery/flash/HabboRegistration.swf", "habboreg", "435", "400", "8");
    swfobj.addParam("base", "/web-gallery/flash/");
    swfobj.addParam("wmode", "opaque");
    swfobj.addParam("AllowScriptAccess", "always");
    swfobj.addVariable("figuredata_url", "https://images.oldhabbo.com/dcr/v21/figuredata.xml");
    swfobj.addVariable("draworder_url", "https://images.oldhabbo.com/dcr/v21/draworder.xml");
    swfobj.addVariable("localization_url", "/web-gallery/xml/figure_editor.xml");
    swfobj.addVariable("figure", "{{ figure }}");
    swfobj.addVariable("gender", "{{ gender }}");

    swfobj.addVariable("showClubSelections", "0");

    swfobj.write("flashcontent");
    </script>

    <div id="footer">
    	<div id="footer-top"><div id="footer-content">{{ elements.getFooterText()|nl2br }}</div></div>

    	<div id="footer-bottom"><div id="footer-bottom-content"></div></div>
    </div>


    	</div></div>
    	<div id="outer-bottom"><div id="outer-bottom-content"></div></div>
    </div>
</body>
{% endblock %}