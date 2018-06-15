{% extends 'templates/default.volt' %}

{% block title %}Update look{% endblock %}

{% block custom_javascript %}
    <script src="/web-gallery/js/swfobject.js"></script>
    <script>
    var HabboEditor = {};
    HabboEditor.setGenderAndFigure = function(gender, figure) {
        document.querySelector("#gender-hidden-input").value = gender;
        document.querySelector('#figure-hidden-input').value = figure;
    }
    </script>
{% endblock %}

{% block custom_styles %}
    {# <link href="/web-gallery/styles/profile.css" rel="stylesheet" type="text/css" /> #}
{% endblock %}

{% block content %}
<div id="main-content">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td style="width: 6px;">&nbsp;</td>
                <td valign="top" style="width: 271px; padding-top: 3px;" class="habboPage-col">
                    <div class="v3box ">
                        <div class="v3box-top">
                            <h3>Update your look</h3> </div>
                        <div class="v3box-content">
                            <div class="v3box-body"> something something frank image and speech bubble here
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="v3box-bottom">
                            <div></div>
                        </div>
                    </div>
                </td>
                <td valign="top" style="width: 446px; padding-top: 3px;" class="habboPage-col rightmost">
                    <div class="panel" id="panel1">
                        <div class="processbox">
                            <div class="headline">
                                <div class="headline-content">
                                    <div class="headline-wrapper">
                                        <h2>SETTINGS</h2> </div>
                                </div>
                            </div>
                            <div class="content-top">
                                <div class="content">
                                    {# <div id="process-errors">
                                        <div class="content-red">
                                            <div class="content-red-body" id="process-errors-content"> validation errors go here
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="content-red-bottom">
                                            <div class="content-red-bottom-body"></div>
                                        </div>
                                    </div> #}

                                    {% if refreshed is defined %}
                                        <div class="content-green">
                                            <div class="content-green-body">
                                                Your look has been updated!
                                                {# TODO: get text from PHPRetro #}

                                                {% if refreshed_in_hotel is not defined and user_online %}
                                                Use :poof
                                                {% endif %}
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="content-red-bottom">
                                            <div class="content-red-bottom-body"></div>
                                        </div>
                                    {% endif %}

                                    <br clear="all"/>

                                    <div class="content-white-outer">
                                        <div class="content-white">
                                            <div class="content-white-body">
                                                <div class="content-white-content">
                                                    <div id="flashcontent"></div>

                                                    <script type="text/javascript" language="JavaScript">
                                                    var swfobj = new SWFObject("/web-gallery/flash/HabboRegistration.swf", "habboreg", "435", "400", "8");
                                                    swfobj.addParam("base", "/web-gallery/flash/");
                                                    swfobj.addParam("wmode", "opaque");
                                                    swfobj.addParam("AllowScriptAccess", "always");
                                                    swfobj.addVariable("figuredata_url", "https://images.oldhabbo.com/dcr/v21/figuredata.xml");
                                                    swfobj.addVariable("draworder_url", "https://images.oldhabbo.com/dcr/v21/draworder.xml");
                                                    swfobj.addVariable("localization_url", "/web-gallery/xml/figure_editor.xml");
                                                    swfobj.addVariable("figure", "{{ user.figure }}");
                                                    swfobj.addVariable("gender", "{{ user.sex }}");
                                                    {% if user.isClubMember() %}
                                                    swfobj.addVariable("showClubSelections", "1");
                                                    {% else %}
                                                    swfobj.addVariable("showClubSelections", "0");
                                                    {% endif %}
                                                    swfobj.write("flashcontent");
                                                    </script>

                                                    {{ form("/profile", "method": "post") }}
                                                        {{ hidden_field("gender", "id": "gender-hidden-input", "value": user.sex) }}
                                                        {{ hidden_field("figure", "id": "figure-hidden-input", "value": user.figure) }}

                                                        <div align="right">
                                                            {{ submit_button("Update look", "class": "process-button", "id": "updatelookbtn") }}
                                                        </div>
                                                    {{ end_form() }}

                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content-white-bottom">
                                            <div class="content-white-bottom-body"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-bottom">
                                <div class="content-bottom-content"></div>
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width: 3px;">&nbsp;</td>
                <td valign="top" style="padding-top: 3px;">
                    <div class="profilebox">
                        <div class="profilebox-header">
                            <h3>Wardrobe</h3></div>
                        <div class="profilebox-header-bottom">
                            <div></div>
                        </div>
                        <div class="profilebox-body">
                            <div class="profilebox-content">
                                <div class="profile-info"> </div>
                                <div class="figure"> </div>
                                <div>
                                    <div class="content-blue">
                                        <div class="content-blue-body"> TODO
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="content-blue-bottom">
                                        <div class="content-blue-bottom-body"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width: 6px;">&nbsp;</td>
            </tr>
        </tbody>
    </table>
</div>
{% endblock %}