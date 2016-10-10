<form id="formu_like" name="formu_like" method="post" >
    <div id="banner">
        <header id="allpics" class="container">
            <h1><a href="#" id="logo">Tous nos paysages !</a></h1>
        </header><br />
        <div style="padding-bottom:5px;">
            
                <label for="addCategorie" style="padding-left:3%; padding-right:2.5%; font-size:24px;">Choisir en fonction de la catégorie : </label>
                <select id="addCategorie" style="width:70%;" >
                <option value=" "></option>
                <option value="4">Tous</option>
                <?php
                    if(isset($_POST))
                    {
                        include ('Connexion.php');
                        $reponse = $CNN->query('SELECT no_categorie, nom_categorie from tbl_categorie');
                
                        while ($donnees = $reponse->fetch())
                        {
                            echo '<option value="' . $donnees['no_categorie'] . '">' . $donnees['nom_categorie'] . '</option>';
                        }
                        $reponse->closeCursor();
                    }
                    else
                        echo "allo";
                ?>
                
                </select>
        </div>
    </div>
    <div id="imagesdyn" class="row"></div>
</form>