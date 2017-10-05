{% extends 'templates/bare.volt' %}

{% block title %}Registration ~ Tell us your birthday{% endblock %}

{% block custom_javascript %}
    <script language="JavaScript" type="text/javascript" src="/web-gallery/js/registration.js"></script>
{% endblock %}

{% block body %}
<body id="registration">

<h1 id="main-header">Habbo</h1>


<div id="process-wrapper">
	<div id="process-header"><div id="process-header-body"><div id="process-header-content">
		<div id="habbologo"><a href="/register/exit"></a></div>

	</div></div></div>
	<div id="outer"><div id="outer-content">

<div class="processbox">
	<div class="headline"><div class="headline-content"><div class="headline-wrapper">
		<h2>Registration <a href="/register/exit" class="exit">Cancel</a></h2>
	</div></div></div>
	<div class="content-top">
		<div class="content">

	<div class="content-column1">

		<div class="bubble">
			<div class="bubble-body">
Please tell us your birthday.
			<div class="clear"></div>
			</div>
		</div>
		<div class="bubble-bottom">
			<div class="bubble-bottom-body">
				<img src="/web-gallery/images/register/bubble_tail_left.gif" alt="" width="22" height="31">
			</div>
		</div>
		<div class="frank"><img src="/web-gallery/images/register/register6.gif" alt="" width="245" height="197"></div>

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

<div class="content-white-content"><form method="post" action="https://web.archive.org/web/20070711170224/https://www.habbo.co.uk/register/step" id="stepform">

<div><label class="registration-text">Birthday</label></div>
<div id="required-birthday"><select name="bean.day" id="bean_day" class="dateselector"><option value="">--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select> <select name="bean.month" id="bean_month" class="dateselector"><option value="">--</option><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select> <select name="bean.year" id="bean_year" class="dateselector"><option value="">--</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option></select> </div>

<div id="register-buttons">

<div id="register-buttons-continue">
<input type="submit" value="Continue" id="continuebtn" class="process-button">
</div>

<div id="register-buttons-back"></div>

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
Event.observe($("stepform"), "submit", function(e) {
	if ($("bean_day").selectedIndex == 0 || $("bean_month").selectedIndex == 0 || $("bean_year").selectedIndex == 0) {
		validatorBeforeSubmit();
		validatorAddError(false, false, "Please supply a valid date");
		$("required-birthday").className = "validation-failed";
		Event.stop(e);
	}
}, false);
</script>

<div id="footer">
	<div id="footer-top"><div id="footer-content">© 2006 Sulake Corporation Ltd. HABBO is a registered trademark of Sulake Corporation Oy in the European Union, the USA, Japan, the People's Republic of China and various other jurisdictions. All rights reserved.</div></div>
	<div id="footer-bottom"><div id="footer-bottom-content"></div></div>
</div>


	</div></div>
	<div id="outer-bottom"><div id="outer-bottom-content"></div></div>
</div>

<div id="tracker"><!-- START Nielsen//NetRatings SiteCensus V5.1 -->

<!-- COPYRIGHT 2005 Nielsen//NetRatings -->

<script language="JavaScript" type="text/javascript">

<!--

	var _rsCI="Habbohotel";
	var _rsCG="0";
	var _rsDT=0; // to turn on whether to get the document title, 1=on
	var _rsDU=0; // to turn on or off the applet, 1=on
	var _rsDO=0; // to turn on debug output to the console, 1=on, only works if _rsDU=1
	var _rsX6=0; // to force use of applet with XP and IE6, 1=on, only works if _rsDU=1

	var _rsSI=escape(window.location);



	var _rsLP=location.protocol.indexOf('https')>-1?'https:':'http:';
	var _rsRP=escape(document.referrer);
	var _rsND=_rsLP+'//web.archive.org/web/20070711170224/https://secure-dk.imrworldwide.com/';

	if (parseInt(navigator.appVersion)>=4)
	{
		var _rsRD=(new Date()).getTime();
		var _rsSE=0; // to turn on surveys, 1=on
		var _rsSV=""; // survey name, leave empty
		var _rsSM=0; // maximum survey rate, 1.0=100%
		_rsCL='<scr'+'ipt language="JavaScript" type="text/javascript" src="'+_rsND+'v51.js"><\/scr'+'ipt>';
	}
	else
	{
		_rsCL='<img src="'+_rsND+'cgi-bin/m?ci='+_rsCI+'&cg='+_rsCG+'&si='+_rsSI+'&rp='+_rsRP+'">';
	}
	document.write(_rsCL);

//-->

</script><script language="JavaScript" type="text/javascript" src="https://web.archive.org/web/20070711170224/https://secure-dk.imrworldwide.com/v51.js"></script><img src="https://web.archive.org/web/20070711170224/https://secure-dk.imrworldwide.com/cgi-bin/m?rnd=1525723077546&amp;ci=Habbohotel&amp;cg=0&amp;sr=1920x1080&amp;cd=24&amp;lg=nl&amp;je=n&amp;ck=y&amp;tz=2&amp;ct=&amp;hp=&amp;tl=&amp;si=https%3A//web.archive.org/web/20070711170224/https%3A//www.habbo.co.uk/register/register/0&amp;rp=https%3A//web.archive.org/web/20070711170214/https%3A//www.habbo.co.uk/register/start" width="1" height="1">

<noscript>
	<img src="https://web.archive.org/web/20070711170224im_/http://secure-dk.imrworldwide.com/cgi-bin/m?ci=Habbohotel&amp;cg=0" alt="">
</noscript>

<!-- THE END Nielsen//NetRatings SiteCensus V5.1 -->

<script src="https://web.archive.org/web/20070711170224js_/https://ssl.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-448325-6";
urchinTracker();
</script></div>




<!--
playback timings (ms):
  LoadShardBlock: 216.216 (3)
  esindex: 0.009
  captures_list: 269.118
  CDXLines.iter: 12.115 (3)
  PetaboxLoader3.datanode: 224.906 (4)
  exclusion.robots.fetch: 0.253 (4)
  exclusion.robots: 0.998
  exclusion.robots.policy: 0.343
  RedisCDXSource: 36.582
  PetaboxLoader3.resolve: 144.894
  load_resource: 269.652
--></body>
{% endblock %}