{% extends 'templates/bare.volt' %}

{% block title %}Registration ~ Details{% endblock %}

{% block custom_javascript %}
<script language="JavaScript" type="text/javascript" src="/web-gallery/js/registration.js"></script>
<script>
window.addEventListener("load", function(e) {
    var el = document.querySelector("#backbtn");
    el.addEventListener("click", function() {
        window.location.replace("/register");
    }, false);
});
</script>
{% endblock %}

{% block custom_styles %}
<style>
#register-buttons .left {
    float: left;
}

#register-buttons .right {
    float: right;
}
</style>
{% endblock %}

{% block body %}
<body id="registration">
    <h1 id="main-header">Habbo</h1>
    <div id="process-wrapper">
        <div id="process-header">
            <div id="process-header-body">
                <div id="process-header-content">
                    <div id="habbologo">{{ link_to('/') }}</div>
                    <div id="steps">
                        <a href="/register"><img src="/web-gallery/images/process/step1.gif" alt="1" width="30" height="26" /></a>
                        <img src="/web-gallery/images/process/step_right.gif" />
                        <img src="/web-gallery/images/process/step2_on.gif" alt="2" width="30" height="26" />
                    </div>
                </div>
            </div>
        </div>
        <div id="outer">
            <div id="outer-content">
                <div class="processbox">
                    <div class="headline">
                        <div class="headline-content">
                            <div class="headline-wrapper">
                                <h2>Registration <a href="/" class="exit">Cancel</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="content-top">
                        <div class="content">

                            <div class="content-column1">
                                <div class="bubble">
                                    <div class="bubble-body">
                                        Now to pick your username and password. A good password should contain numbers and both UPPER and lowercase letters.
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="bubble-bottom">
                                    <div class="bubble-bottom-body">
                                        <img src="/web-gallery/images/register/bubble_tail_left.gif" alt="" width="22" height="31" />
                                    </div>
                                </div>
                                <div class="frank"><img src="/web-gallery/images/register/register3.gif" alt="" width="245" height="191" /></div>
                            </div>

                            <div class="content-column2">

                                {# <div id="process-errors">
                                    <div class="content-red">
                                        <div class="content-red-body" id="process-errors-content">
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="content-red-bottom">
                                        <div class="content-red-bottom-body"></div>
                                    </div>
                                </div> #}

                                <div id="process-errors" {% if register_errors is defined %}style="display: block;"{% endif %}>
                                    {% if register_errors is defined %}
                                        {% for id, error in register_errors %}
                                            <div class="content-red">
                                                <div class="content-red-body" id="process-errors-content">
                                                    {{ error }}
                                                </div>
                                                <div class="clear"></div>
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

                                <div class="content-white-outer">
                                    <div class="content-white">
                                        <div class="content-white-body">
                                            <div class="content-white-content">
                                                <form method="post" action="/register/enter-details" id="stepform">


                                                    <p>
                                                        <b>CHOOSE YOUR USERNAME:</b><br>Your <b>username</b> can contain lowercase and uppercase letters. Your
                                                        username can also contain numbers and the following characters: -=?!@:.
                                                    </p>

                                                    <p>
                                                        <label for="username" class="registration-text">Username</label><br />
                                                        <input type="text" name="username" id="username" maxlength="14" {% if username is defined %}value="{{ username }}"{% else %}value=""{% endif %} class="registration-text required-avatarName" />
                                                    </p>

                                                    <hr />

                                                    <p>
                                                        <b>NOW, CHOOSE YOUR PASSWORD:</b><br>Your <b>password</b> must be at least six characters long. Your <b>password</b> can contain both <b>uppercase letters</b> and <b>numbers</b>.
                                                    </p>

                                                    <p>
                                                        <label for="password" class="registration-text">Password</label><br />
                                                        <input type="password" name="password" id="password" maxlength="32" {% if password is defined %}value="{{ password }}"{% else %}value=""{% endif %} class="registration-text required-password required-password2" />
                                                    </p>

                                                    <div id="pwStatus"></div>

                                                    <p>
                                                        <label for="retypedPassword" class="registration-text">Retype password</label><br />
                                                        <input type="password" name="retypedPassword" id="retypedPassword" maxlength="32" {% if retypedPassword is defined %}value="{{ retypedPassword }}"{% else %}value=""{% endif %} class="registration-text required-retypedPassword required-retypedPassword2" />
                                                    </p>

                                                    <div id="pwRetypeStatus"></div>


                                                    <div id="register-buttons">
                                                        <div class="left">
                                                            <input type="button" value="Back" id="backbtn" class="process-button" />
                                                        </div>

                                                        <div class="right">
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
                    <div class="content-bottom">
                        <div class="content-bottom-content"></div>
                    </div>
                </div>
                <script type="text/javascript" language="JavaScript">
                    function initUserDetailForm() {
                        Object.extend(Validation, {
                            addError: validatorAddError
                        });
                        Validation.addAllThese([
                            ['required-avatarName', 'Please choose your name', function(v) {
                                return !Validation.get('IsEmpty').test(v);
                            }],
                            ['required-password', 'Please enter a password', function(v) {
                                return !Validation.get('IsEmpty').test(v);
                            }],
                            ['required-password2', 'Password is too short', function(v) {
                                return v.length >= 6;
                            }],
                            ['required-retypedPassword', 'Please type your password again', function(v) {
                                return !Validation.get('IsEmpty').test(v);
                            }],
                            ['required-retypedPassword2', 'The passwords you typed are not identical', function(v) {
                                return v == $F("password");
                            }]
                        ]);
                        new Validation('stepform', {
                            focusOnError: true,
                            beforeSubmit: validatorBeforeSubmit,
                            skipValidation: function() {
                                return backClicked;
                            }
                        });

                        initPasswordCheck();
                    }

                    function initPasswordCheck() {
                        updatePasswordStatus(false, true);

                        new Form.Element.Observer(
                            "password", .7,
                            function(element, value) {
                                updatePasswordStatus(false, false);
                            }
                        );

                        new Form.Element.Observer(
                            "retypedPassword", .3,
                            function(element, value) {
                                updatePasswordStatus(false, false);
                            }
                        );
                    }

                    function updatePasswordStatus(remoteCheck, init) {
                        var value = $F("password");

                        if (!init) {
                            if (!value || value.length < 6) {
                                showPasswordLengthMsg("Your password must be at least 6 characters long.", "error");
                                pwTotal[0] = false;
                            } else {
                                showPasswordLengthMsg("Password is securely long enough.", "ok");
                                pwTotal[0] = true;
                            }
                        }

                        if (value.length < 6) {
                            if ($("pwChars")) {
                                Element.remove("pwChars");
                            }
                            pwTotal[1] = false;
                        } else if (remoteCheck) {
                            new Ajax.Request(
                                habboReqPath + "register/password", {
                                    method: "get",
                                    parameters: "password=" + encodeURIComponent(value),
                                    onComplete: showPasswordStatus
                                }
                            );
                        }

                        if (!init) {
                            var retyped = $F("retypedPassword");
                            if (!retyped) {
                                if ($("pwMatch")) {
                                    showStatusMsg("pwMatch", "To make sure you didn\'t misspell, Please retype your password below.", "error");
                                }
                                pwTotal[2] = false;
                            } else if (retyped == $F("password")) {
                                showPasswordMatchMsg("The two passwords match.", "ok");
                                pwTotal[2] = true;
                                Element.removeClassName($("retypedPassword"), "validation-failed");
                            } else {
                                showPasswordMatchMsg("Passwords don\'t match.", "error");
                                pwTotal[2] = false;
                            }

                            updatePasswordTotal();
                        }
                    }

                    function showPasswordLengthMsg(msg, status) {
                        var msgNode = $("pwLength");
                        if (!msgNode) {
                            var node = Builder.node("div", {
                                id: "pwLength",
                                className: "field-status-error"
                            }, [
                                Builder.node("b", "Length check: "),
                                Builder.node("span", {
                                    id: "pwLength-content"
                                })
                            ]);
                            var charsNode = $("pwChars");
                            if (!charsNode) {
                                $("pwStatus").appendChild(node);
                            } else {
                                $("pwStatus").insertBefore(node, $("pwChars"));
                            }
                        }

                        showStatusMsg("pwLength", msg, status);
                    }

                    function showPasswordCharsMsg(msg, status) {
                        var msgNode = $("pwChars");
                        if (!msgNode) {
                            var node = Builder.node("div", {
                                id: "pwChars",
                                className: "field-status-error"
                            }, [
                                Builder.node("b", "Character check: "),
                                Builder.node("span", {
                                    id: "pwChars-content"
                                })
                            ]);
                            $("pwStatus").appendChild(node);
                        }

                        showStatusMsg("pwChars", msg, status);
                    }

                    function showPasswordMatchMsg(msg, status) {
                        var msgNode = $("pwMatch");
                        if (!msgNode) {
                            var node = Builder.node("div", {
                                id: "pwMatch",
                                className: "field-status-error"
                            }, [
                                Builder.node("b", "Match check: "),
                                Builder.node("span", {
                                    id: "pwMatch-content"
                                })
                            ]);
                            $("pwRetypeStatus").insertBefore(node, $("pwTotal"));
                        }

                        showStatusMsg("pwMatch", msg, status);
                    }

                    function updatePasswordTotal() {
                        var msgNode = $("pwTotal");
                        if (!msgNode) {
                            msgNode = $("pwRetypeStatus").appendChild(Builder.node("div", {
                                id: "pwTotal"
                            }));
                        }

                        if (pwTotal[0] && pwTotal[1] && pwTotal[2]) {
                            msgNode.innerHTML = "Your password is secure!";
                        } else {
                            msgNode.innerHTML = "Please check your password is long enough, contains all required characters and is rewritten correctly.";
                        }
                    }

                    function showPasswordStatus(req, jsonObj) {
                        if (jsonObj.charOk) {
                            showPasswordCharsMsg(jsonObj.charOk, "ok");
                            pwTotal[1] = true;
                        } else {
                            showPasswordCharsMsg(jsonObj.charErr || "You must use lowercase letters, uppercase letters and numbers.", "error");
                            pwTotal[1] = false;
                        }
                        updatePasswordTotal();
                    }
                    initUserDetailForm();
                </script>

                <div id="footer">
                    <div id="footer-top">
                        <div id="footer-content">
                            {{ elements.getFooterText() }}
                        </div>
                    </div>
                    <div id="footer-bottom">
                        <div id="footer-bottom-content"></div>
                    </div>
                </div>

            </div>
        </div>
        <div id="outer-bottom">
            <div id="outer-bottom-content"></div>
        </div>
    </div>
</body>
{% endblock %}