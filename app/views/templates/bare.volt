<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">

    <title>Habbo ~ {% block title %}{% endblock %}</title>

    <link href="/web-gallery/styles/style.css" type="text/css" rel="stylesheet">
    <link href="/web-gallery/styles/boxes.css" type="text/css" rel="stylesheet">
    <link href="/web-gallery/styles/process.css" type="text/css" rel="stylesheet">

	<script language="JavaScript" type="text/javascript">
	var habboClient = true;
	var habboReqPath = "";
	var habboStaticFilePath = "/web-gallery";
	document.habboLoggedIn = {{ logged_in|json_encode }};
	window.name = "habboMain";
	</script><style>.ad-leader,
.ad160,
#main-content > [style="padding:10px 0 0 0 !important;"],
#ad_sidebar
{display:none !important;}</style>
    <script language="JavaScript" type="text/javascript" src="/web-gallery/js/prototype.js"></script>
    <script language="JavaScript" type="text/javascript" src="/web-gallery/js/habbo.js"></script>
    <script language="JavaScript" type="text/javascript" src="/web-gallery/js/hobojax.js"></script>
    <script language="JavaScript" type="text/javascript" src="/web-gallery/js/validation.js"></script>
    <script language="JavaScript" type="text/javascript" src="/web-gallery/js/builder.js"></script>

    {% block custom_styles %}
    {% endblock %}

    {% block custom_javascript %}
    {% endblock %}

    <!--[if IE]>
    <link href="/gallery/web-R13.2-b34/styles/ie-all.css" type="text/css" rel="stylesheet" />
    <![endif]-->

    <!--[if lt IE 7]>
    <link href="/gallery/web-R13.2-b34/styles/ie6.css" type="text/css" rel="stylesheet" />
    <![endif]-->
</head>

<!-- TODO: page ID in id \/ -->
{% block body %}
    <body>
    </body>
{% endblock %}

</html>