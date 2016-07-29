 <div class="menu-toggler sidebar-toggler"></div>
    <!-- END SIDEBAR TOGGLER BUTTON -->
    <!-- BEGIN LOGO -->
    <div class="logo" style="position: relative; margin-top: 100px;">
        <a href="{{ url('index/index') }}">
                    {{ image("/public/assets/images/logo.jpg", "alt": "","style":"width: 113px; position: absolute; margin-top: -50px; margin-left: -65px;") }}
        </a>
        
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
<!-- BEGIN LOGIN FORM -->
    {{ form('connexion/signin', 'role': 'form', 'class':'login-form','id':'SignInForm') }}
     <h3 class="form-title font-green">Connexion</h3>
     <div id="SignInMessages">{{ flashSession.output() }}</div>
     <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Username</label>
        {{ text_field('username', 'id':'username', 'class': 'form-control form-control-solid placeholder-no-fix','placeholder':'Username') }}
     </div>
     <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        {{ password_field('password', 'id':'password', 'class': "form-control form-control-solid placeholder-no-fix",'placeholder':'Password') }}
     </div>
     <div class="form-actions">
        {{ submit_button('Connecter', 'class': 'btn green uppercase') }}
     </form>
     <!-- END LOGIN FORM -->
    </div>





