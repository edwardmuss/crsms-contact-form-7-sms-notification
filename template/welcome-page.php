<div class="wrap welcome-wrap">
    <h3>Welcome To <?php echo _e($this->plugin_name); ?></h3>
    <div class="about-text plugin_welcome_text">
        Thanks for installing! <?php echo _e($this->plugin_name); ?> is more powerful, stable and secure than ever before.
        We hope you enjoy using it.
    </div>

    <div class="content_container">

        <div class="">
            <div id="poststuff">
                <div id="postbox-container-1" class="postbox-container">
                    <div class="postbox">
                        <div class="" title="Click to toggle"><br /></div>
                        <h3 class="hndle"><span>FOR SMS Integration Guide</span></h3>
                        <ul style="margin-left: 10px">
                            <li>Click on Contact menu</li>
                            <li>Navigate to Sms Integration</li>
                            <li>Click on Settings tab</li>
                            <li>Provide Cloud Rebue API Token from your <a href="https://bulk.cloudrebue.co.ke/login"
                                    target="_blank">Bulk Portal</a></li>
                            <li>Provide Approved Sender ID <a
                                    href="ttps://bulk.cloudrebue.co.ke/login" target="_blank">Access Bulk Portal</a>
                            </li>
                        </ul>
                        <div class="option">
                            <div id="mc_embed_signup">
                                <a href="https://www.usmsgh.com/" TARGET="_blank"><img
                                        src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'banner-772x250.png'; ?>" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>


<style>
.welcome-wrap {
    float: left;
    font-size: 15px;
    margin: 0;
    padding-right: 20px;
    position: relative;
    width: 98%;
}

.welcome-wrap h1 {
    color: #32373c;
    font-size: 2.8em;
    font-weight: 400;
    line-height: 1.2em;
    margin: 0.2em 0 0 0;
    padding: 0;
}

.welcome-wrap .about-text {
    color: #777;
    margin: 1em 0px 1em 0;
    min-height: 60px;
}

.welcome-wrap .plugin_welcome_text {
    font-size: 19px;
    font-weight: normal;
    line-height: 1.6em;
    margin-bottom: 1em !important;
}

.welcome-wrap .content_container {
    float: left;
    margin-bottom: 40px;
    width: 100%;
}

.changelog {
    background: #fff none repeat scroll 0 0;
    float: left;
    margin: 20px 2% 20px 0;
    padding: 10px 20px;
    width: 46%;
}


.changelog h1 {
    margin: 0;
}

.singnUpFORM {
    display: inline-block;
    margin-left: 2%;
    margin-top: 10px;
    width: 46%;
}

#postbox-container-1 {
    float: left;
    margin-right: 0 !important;
}

.postbox {
    position: relative;
    min-width: 255px;
    border: 1px solid #e5e5e5;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);
    background: #fff;
}

div#poststuff {
    min-width: 15%;
}


.changelog.full_width {
    display: inline-block;
    margin-right: 0 !important;
    width: auto;
}


.plugin_welcome_actions .downloads_count {
    display: inline-block;
    margin: 0 10px 0 0;
    vertical-align: top;
}
</style>
<style type="text/css">
#mc_embed_signup {
    background: #fff;
    clear: left;
    font: 14px Helvetica, Arial, sans-serif;
}

#mc_embed_signup form {
    padding-top: 0 !important;
    padding-left: 0;
}

#mc_embed_signup div.mce_inline_error {
    background-color: #ea7274;
}

#mc_embed_signup .mc-field-group input {
    margin: 0 auto !important;
}

.option:nth-child(2n+1) {
    background: #fcfcfc none repeat scroll 0 0;
}

.option {
    border-width: 1px 0;
    padding: 6px 10px 8px;
}

.option p.description {
    line-height: 1.2em;
}

.option p {
    margin: 0;
    padding: 0;
}
</style>

<script>
! function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
        p = /^http:/.test(d.location) ? 'http' : 'https';
    if (!d.getElementById(id)) {
        js = d.createElement(s);
        js.id = id;
        js.src = p + '://platform.twitter.com/widgets.js';
        fjs.parentNode.insertBefore(js, fjs);
    }
}(document, 'script', 'twitter-wjs');
</script>

<div id="fb-root"></div>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=477093012452061";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<!-- Place this tag right after the last button or just before your close body tag. -->

<script type='text/javascript'>
(function($) {
    window.fnames = new Array();
    window.ftypes = new Array();
    fnames[0] = 'EMAIL';
    ftypes[0] = 'email';
    fnames[1] = 'FNAME';
    ftypes[1] = 'text';
    fnames[2] = 'LNAME';
    ftypes[2] = 'text';
    fnames[3] = 'WEBSITE';
    ftypes[3] = 'url';
    fnames[4] = 'COUNTRY';
    ftypes[4] = 'text';
    fnames[5] = 'PLUGINNAME';
    ftypes[5] = 'text';
}(jQuery));
var $mcj = jQuery.noConflict(true);
</script>
