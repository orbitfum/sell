<div id="loginModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h3>התחברות לזה-קל</h3>
        </div>
        <div class="modal-body">
            <form action="post" target="">
                <label for="login">דוא"ל או טלפון</label>
                <input type="text" name="login" id="login" placeholder="הזן כתובת דואר או טלפון">

                <label for="password">סיסמה</label>
                <input type="password" name="password" id="password" placeholder="הזן את סיסמתך">


        </div>

        <div class="modal-footer">
<input type="submit" name="submit" value="התחברות" class="submit button secondary">

            <span>
            <a href="forgot-password" style="float: left">שכחתי סיסמה</a>
        </span></form>
        </div>
    </div>

</div>


<div id="registerModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="regclose">&times;</span>
            <h3>הרשמה לזה-קל</h3>
        </div>
        <div class="modal-body">
            <form action="post" target="">
                <label for="email">דוא"ל</label>
                <input type="email" name="email" id="email" placeholder="הזן כתובת דואר אלקטרוני">


                <label for="phone">טלפון</label>
                <input type="tel" name="phone" id="phone" placeholder="הזן מספר טלפון">


                <label for="password">סיסמה</label>
                <input type="password" name="password" id="password" placeholder="הזן את סיסמתך">

                <label for="password_check">אמת סיסמה</label>
                <input type="password" name="password_check" id="password_check" placeholder="הזמן סיסמה שנית">

        </div>

        <div class="modal-footer">
            <p> <input type="submit" name="register" value="הרשמה" class="submit button secondary"></p>
            </form>
        </div>
    </div>

</div>

<script>
    modal('#loginModal', '#login');
    modal('#registerModal', '#register');
//    var modal = document.getElementById('loginModal');
//    var regmodal = document.getElementById('registerModal');
//
//    var btn = document.getElementById("login");
//    var regbtn = document.getElementById("register");
//
//    var span = document.getElementsByClassName("close")[0];
//    var regspan = document.getElementsByClassName("regclose")[0];
//
//    btn.onclick = function() {
//        modal.style.display = "block";
//    }
//    regbtn.onclick = function() {
//        regmodal.style.display = "block";
//    }
//
//    span.onclick = function() {
//        modal.style.display = "none";
//    }
//    regspan.onclick = function() {
//        regmodal.style.display = "none";
//    }
//
//    window.onclick = function(event) {
//        if (event.target == modal) {
//            modal.style.display = "none";
//            $('.modal').css('display', 'none');
//        }
//    }
//    window.onclick = function(event) {
//        if (event.target == regmodal) {
//            regmodal.style.display = "none";
//        }
//    }

</script>
