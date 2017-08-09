<div id="loginModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h3>התחברות לזה-קל</h3>
        </div>
        <div class="modal-body">
            <form action="{{url('user/login')}}" method="post" target="">
                {{csrf_field()}}
                <label for="login">דוא"ל או טלפון</label>
                <input type="text" name="login" id="login" placeholder="הזן כתובת דואר או טלפון">

                <label for="password">סיסמה</label>
                <input type="password" name="password" id="password" placeholder="הזן את סיסמתך">


        </div>

        <div class="modal-footer">
<input type="submit" name="submit" value="התחברות" class="submit button secondary">

            <span>
            <a id="forgot-password" style="float: left">שכחתי סיסמה</a>
        </span></form>
        </div>
    </div>

</div>


<div id="registerModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h3>הרשמה לזה-קל</h3>
        </div>
        <div class="modal-body">
            <form action="{{url('user/register')}}"  method="post">
                {{csrf_field()}}
                <label for="email">דוא"ל</label>
                <span class="text-danger" data-id="email">{{ $errors->first('email') }}</span>
                <span class="text-danger email_error" style="display: none;">דוא"ל תקין בלבד.</span>
                <input type="email" value="{{old('email')}}" @if ($errors->has('email')) class="has-error" @endif onkeyup="checkEmail(this.value)" name="email" id="email" placeholder="הזן כתובת דואר אלקטרוני" required>


                <label for="phone">טלפון</label>
                <span class="text-danger" id="phone-valid" data-id="phone">{{ $errors->first('phone') }}</span>
                <span class="text-danger erphone_error" style="display: none;">טלפון בעל 8 תווים לפחות</span>
                <input type="tel" value="{{old('phone')}}" @if ($errors->has('phone')) class="has-error" @endif onkeyup="checkphone(this.value)" name="phone" id="phone" placeholder="הזן מספר טלפון" required>


                <label for="password">סיסמה</label>
                <span class="text-danger" data-id="password">{{ $errors->first('password') }}</span>
                <span class="text-danger spassword_error" style="display: none;">מינימום 6 תווים לסיסמה.</span>
                <input type="password" @if ($errors->has('password')) class="has-error" @endif name="password" id="password" class="password" onkeyup="checkSPassword(this.value)" placeholder="הזן את סיסמתך" required>

                <label for="password_confirmed">אמת סיסמה</label>
                <span class="text-danger" data-id="password_confirmed">{{ $errors->first('password_confirmed') }}</span>
                <span class="text-danger mpassword_error" style="display: none;">הסיסמאות לא תואמות.</span>
                <input type="password" @if ($errors->has('password_confirmed')) class="has-error" @endif name="password_confirmed" id="password_confirmed" onkeyup="checkMatchPass(this.value)" placeholder="הזמן סיסמה שנית" required>

        </div>

        <div class="modal-footer">
            <p> <input type="submit" name="register" value="הרשמה" class="submit button secondary"></p>
            </form>
        </div>
    </div>

</div>

<div id="forgotModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h3>שחזור סיסמה</h3>
        </div>
        <div class="modal-body">
            <form action="post" target="">
                <label for="login">דוא"ל או טלפון</label>
                <input type="text" name="login" id="login" placeholder="הזן כתובת דואר או טלפון">
                *שים לב, פרטי ההתחברות ישלחו למייל שנרשמת דרכו.
        </div>

        <div class="modal-footer">
            <input type="submit" name="recover" value="שחזור סיסמה" class="submit button secondary">
</form>
        </div>
    </div>

</div>
<?php
if($errors->first('email') || $errors->first('phone') || $errors->first('password') || $errors->first('password_confirmed')){
    echo '<script>$("#registerModal").css("display", "block");</script>';
}
?>


<script>
    modal('#loginModal', '#login');
    modal('#loginModal', '#loginsm');
    modal('#registerModal', '#register');
    modal('#forgotModal', '#forgot-password');


</script>
