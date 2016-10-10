<section>
    <div class = "main-content">
        <header id="conn" class="container">
            <h1><a href="#" id="logo">Connexion</a></h1>
        </header>
        <div id="conn" style="padding-top:6%;">
            <h3><a href="#" id="logo">Renseignements</a></h3>
        </div>
        <div id="banner">
            <form id="formu_connexion" name="formu_connexion" method="post" action= 			 	     												"Validation_connexion.php">
                <fieldset>
                    <div>
                        <label for="comail" style="padding-right:3.6%; font-size:24px;"> Email </label>
                        <input id="comail" name="comail" type="text" value = "<?php if(isset($_GET['mail'])){echo $_GET['mail'];} ?>" style="width:90%;" />
                    </div>
                    <div>
                        <label for="copassword" style="padding-right:0.7%; font-size:24px;"> Password </label>
                        <input id="copassword" name="copassword" type="password" style="width:90%;"/>
                    </div>
                    
                    <div class="buttonSubmit">
                        <input  type="submit" class="button-moy" value="Connexion" style="margin-left:64.2%; width:33%; font-size:24px;" />
                    </div>
                </fieldset>
            </form>
         </div>
          <script>
            $("#formu_connexion").validate({
            rules:{ 
                    comail:{required : true,
                            regexp_email : true
                            },
                    copassword:{required : true
                            }},
            messages:{ 
                    comail:{required: "<br />Le email est obligatoire!",
                            regexp_email : "<br />Mauvais format d'email"},
                    copassword:{required: "<br />Le password est obligatoire!"},
                }})
            $.validator.addMethod("regexp_email", 
            function (value, element){
                return this.optional(element) || /^[a-zA-Z0-9._-]+[@][a-z0-9.-]{2,}[.][a-zA-Z]{2,4}$/. 		  														test(value);
                }, '<br />Email doit avoir le format suivant a@hotmail.com');								
        </script>
    </div>
</section>