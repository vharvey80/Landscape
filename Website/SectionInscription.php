<section>
    <div class = "main-content">
        <header id="conn" class="container">
            <h1><a href="#" id="logo">Inscription</a></h1>
        </header>
        <div id="conn" style="padding-top:6%;">
            <h3><a href="#" id="logo">Renseignements</a></h3>
        </div>
        <div id="banner">
            <form id="formu_inscription" name="formu_inscription" method="post" action="Validation_inscription.php">
                <fieldset>
                    <section>
                        <label for="prenom" style="padding-right:10.80%; font-size:24px;"> Prenom </label>
                        <input id="prenom" name="prenom" type="text" style="width:80%;"/>
                    </section>
                    <section>
                        <label for="nom" style="padding-right:12.7%; font-size:24px;"> Nom </label>
                        <input id="nom" name="nom" type="text" style="width:80%;"/>
                    </section>
                    <section>
                        <label for="email" style="padding-right:12.2%; font-size:24px;"> email </label>
                        <input id="email" name="email" type="text" style="width:80%;"/>
                    </section>
                    <section>
                        <label for="pseudo" style="padding-right:10.98%; font-size:24px;"> Pseudo </label>
                        <input id="pseudo" name="pseudo" type="text" style="width:80%;"/>
                    </section>
                    <section>
                        <label for="password" style="padding-right:9.39%; font-size:24px;"> Password </label>
                        <input id="password" name="password" type="password" style="width:80%;"/>
                    </section>
                    <section>
                        <label for="repass" style="padding-right:1%; font-size:24px;"> Confirmation Password </label>
                        <input id="repass" name="repass" type="password" style="width:80%;"/>
                    </section>
                    <div class="buttonSubmit">
                        <input  type="submit" class="button-moy" value="Inscription" style="margin-left:63%; width:33%; font-size:24px;"/>
                    </div>
                    <?php
                        if(isset($_GET['inscrit']))
                        {
                            if(htmlentities($_GET['inscrit']) == 1)
                            {
                                echo '<div><ul class="check-list">
                                        <li>Inscription effectuée!</li></ul></div>';
                            }
                    }
                    ?>
                </fieldset>
            </form>
        </div>
         <script>
            $("#formu_inscription").validate({
            rules:{ 
                    nom:{required : true
                            },
                    prenom:{required : true
                            },
                    email:{required : true,
                            regexp_email : true
                            },
                    pseudo:{required : true,
                            minlength: 5
                            },
                    password:{required : true,
                              minlength: 5
                            },
                    repass:{required : true,
                            equalTo: "#password"
                            },
                    },
            messages:{ 
                    nom:{required: "<br />Le nom est obligatoire"},
                    prenom:{required: "<br />Le prenom est obligatoire"},
                    email:{required: "<br />Le email est obligatoire",
                            regexp_email : "<br />Mauvais format d'email "},
                    pseudo:{required: "<br />Le pseudo est obligatoire",
                            minlength: "<br />Le pseudo doit avoir 5 caratère minimum"},
                    password:{required: "<br />Le password est obligatoire",
                                minlength: "<br />Le passord doit avoir 5 caractères minimum"},
                    repass:{required: "<br />La confirmation du  password est obligatoire",
                            equalTo : "<br />Le mots de passe n'est pas identique"
                            },
                }})
                
                
                        $.validator.addMethod("regexp_email", 
            function (value, element){
                return this.optional(element) || /^[a-zA-Z0-9._-]+[@][a-z0-9.-]{2,}[.][a-zA-Z]{2,4}$/. 		  														test(value);
                }, '<br />Email doit avoir le format suivant a@hotmail.com');								
        </script>
    </div>
</section>