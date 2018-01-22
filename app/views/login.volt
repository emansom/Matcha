{% extends 'templates/bare.volt' %}

{% block title %}Sign in{% endblock %}

{% block body %}
<body id="process">
<h1 id="main-header">Habbo</h1>


<div id="process-wrapper">
    <div id="process-header"><div id="process-header-body"><div id="process-header-content">
        <div id="habbologo">{{ link_to('/') }}</div>

    </div></div></div>
    <div id="outer"><div id="outer-content">

<div class="processbox left">
    <div class="headline"><div class="headline-content"><div class="headline-wrapper">
        <h2>New here? Register!</h2>
    </div></div></div>
    <div class="content-top">
        <div class="content">

<div class="processbox-inner">

<h4>Register now!</h4>
<p>
Habbo is an online community that lets you create your own virtual space for you and your friends. With thousands of members already  checked in there's always something to do...<br><br></p>

</div>

<div id="registration-errors">
<div class="content-red">
    <div class="content-red-body" id="registration-errors-content">
    <div class="clear"></div>
    </div>
</div>
<div class="content-red-bottom"><div class="content-red-bottom-body"></div></div>
</div>

<div class="content-white-outer" id="registration-start">
    <div class="content-white">
        <div class="content-white-body">

<div class="content-white-content">
    <img vspace="10" hspace="10" border="0" align="right" src="/c_images/album209/frank_with_key.gif" alt="">
    <form method="post" action="/register" id="registration-form">
<input type="hidden" name="from" value="login">
<input type="hidden" name="referer" value="https://www.habbo.co.uk/login">


<p>
<label for="day" class="registration-text">Please start by entering your birthday</label>
</p>

<div id="required-birthday">
<select name="day" id="day" class="dateselector"><option value="">--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select> <select name="month" id="month" class="dateselector"><option value="">--</option><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select> <select name="year" id="year" class="dateselector"><option value="">--</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option></select> </div>

<p class="last">
<input type="submit" value="Continue registration" class="process-button" id="registration-submit">
</p>
</form>
</div>
        <div class="clear"></div>
        </div>
    </div>
    <div class="content-white-bottom">
        <div class="content-white-bottom-body"></div>
    </div>
</div>

<div class="processbox-inner">


<p>
<br><img vspace="0" hspace="0" border="0" align="right" src="/c_images/album109/reindeer_1_small.gif" alt=""><span style="font-weight: bold;">TOP REASONS TO REGISTER</span><br>
</p><ul><li>Create your own character and homepage<br></li><li>Meet your friends and find new ones<br>
</li><li>Decorate your own room
</li><li>It’s more fun than not joining!</li></ul><ul><li><span style="font-weight: bold;">It's completely free!</span></li></ul><br><br><p></p>

</div>

            <div class="clear"></div>
        </div>
    </div>
    <div class="content-bottom"><div class="content-bottom-content"></div></div>
</div>


<div class="processbox right blue">
    <div class="headline"><div class="headline-content"><div class="headline-wrapper">
        <h2>Already have an account? Please log in here!</h2>
    </div></div></div>
    <div class="content-top">
        <div class="content">

<div class="processbox-inner">


<p>
If you already have an account then log in here using your username and your password. Your username and password are the same for here as they are in the Hotel.<br><br>
</p>

</div>

<div id="login-errors" {% if login_errors is defined %}style="display: block;"{% endif %}>
    {% if login_errors is defined %}
        {% for id, error in login_errors %}
            <div class="content-red">
                <div class="content-red-body">
                    {{ error }}
                    <br>
                </div>
            </div>
            <div class="content-red-bottom"><div class="content-red-bottom-body"></div></div>
        {% endfor %}
    {% else %}
        <div class="content-red">
            <div class="content-red-body" id="login-errors-content">
            <div class="clear"></div>
            </div>
        </div>
        <div class="content-red-bottom"><div class="content-red-bottom-body"></div></div>
    {% endif %}
</div>

<div class="content-white-outer" id="login">
    <div class="content-white">
        <div class="content-white-body">

<div class="content-white-content">
    {{ form("/login", "method": "post", "id": "login-form") }}
        <p>
        <label for="login-username" class="registration-text">My username</label>
        {{ text_field("username", "id": "login-username", "class": "required-username") }}
        </p>

        <script type="text/javascript" language="JavaScript">
        $("login-username").focus();
        </script>

        <p>
        <label for="login-password" class="registration-text">Password</label>
        {{ password_field("password", "id": "login-password", "class": "required-password") }}
        </p>

        <p class="last">
        {{ submit_button("Log in", "class": "process-button", "id": "login-submit") }}
        </p>
    {{ endForm() }}
</div>
        <div class="clear"></div>
        </div>
    </div>
    <div class="content-white-bottom">
        <div class="content-white-bottom-body"></div>
    </div>
</div>

<div class="processbox-inner">


<p>
<br><span style="font-weight: bold;">FORGOTTEN YOUR PASSWORD?</span><br><br>If you have forgotten your password please contact Player Support by using the <a href="https://web.archive.org/web/20070607023823/http://www.habbohotel.co.uk/iot/go?lang=en&amp;country=uk" target="_blank">Help Tool</a>.<br><br></p>
<h4>Security Information</h4>
<p>
<img vspace="10" hspace="10" border="0" align="right" src="/c_images/album209/encryption_pc_ie.gif" alt="">This site is encrypted to protect you and your data. You can check whether or not this site is encrypted by looking for the nice looking padlock at the bottom of your web browser.

<br><br></p>

</div>

            <div class="clear"></div>
        </div>
    </div>
    <div class="content-bottom"><div class="content-bottom-content"></div></div>
</div>

<script type="text/javascript" language="JavaScript">
Event.observe($("registration-form"), "submit", function(e) {
    if ($("day").selectedIndex == 0 || $("month").selectedIndex == 0 || $("year").selectedIndex == 0) {
        validatorBeforeSubmit("registration-errors");
        validatorAddError(false, false, "Please supply a valid date", "registration-errors");
        $("required-birthday").className = "validation-failed";
        Event.stop(e);
    } else {
        $("registration-submit").disabled = 'true';
    }
}, false);
Event.observe($("login-form"), "submit", function(e) {
    if ($F("login-username") == "" || $F("login-password") == "") {
        validatorBeforeSubmit("login-errors");
        validatorAddError(false, false, "Please enter your Habbo name and password", "login-errors");
        if ($F("login-password") == "") { $("login-password").className = "validation-failed"; $("login-password").focus(); }
        else { Element.removeClassName($("login-password"), "validation-failed"); }
        if ($F("login-username") == "") { $("login-username").className = "validation-failed"; $("login-username").focus(); }
        else { Element.removeClassName($("login-username"), "validation-failed"); }
        Event.stop(e);
    } else {
        $("login-submit").disabled = 'true';
    }
}, false);
</script>

<div id="footer">
    <div id="footer-top"><div id="footer-content">{{ footer_text }}</div></div>
    <div id="footer-bottom"><div id="footer-bottom-content"></div></div>
</div>


    </div></div>
    <div id="outer-bottom"><div id="outer-bottom-content"></div></div>
</div>
</body>
{% endblock %}