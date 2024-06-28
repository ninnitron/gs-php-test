<h1 class="text-center p-3">Login</h1>
<form method="post" id="login-form">
    <div class="row justify-content-center p-2">
        <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <label for="input-usr" class="form-label">Username</label>
            <input type="text" name="user" id="input-usr" class="form-control" required>
        </div>
    </div>
    <br>
    <div class="row justify-content-center p-2">
        <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <label for="input-pwd" class="form-label">Password</label>
            <input type="password" name="pwd" id="input-pwd" class="form-control" required>
        </div>
    </div>
    <br>
    <br>
    <div class="row justify-content-center p-2">
        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 text-center">
            <button class="btn btn-primary" type="submit" id="login-submit">Submit</button>
        </div>
    </div>
</form>
<script>
    $("form#login-form").on("submit", function(e){
        e.preventDefault();
        let form=$(this).serialize();
        $.ajax({
            method: "POST",
            url: "controller.php",
            data: form,
            success: function(x){
                switch(parseInt(x)){
                    case 1: 
                        alert("Accesso consentito!");
                        $("#content").load("list.php");
                        break;
                    case 2:
                        alert("Accesso non consentito!\nRiprova.");
                        location.reload();
                        break;
                    default:
                        alert("Qualcosa è andato storto durante il login!\nRiprova.");
                        location.reload();
                }
            }
        });
    });
</script>
