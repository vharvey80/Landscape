<header id="conn" class="container">
    <h1><a href="#" id="logo">Ajout d'un paysage</a></h1>
</header>
<div id="conn" style="padding-top:6%;">
    <h3><a href="#" id="logo">Renseignements</a></h3>
</div>
<div id="banner">
    <section>
        <form id="mon_formu" name="mon_formu" method="post" action="Traitement.php" enctype="multipart/form-data">
            <fieldset>
                <div>
                     <input id="hiddenno" name="hiddenno" hidden="true" type="text" value="<?php if(isset($_SESSION['no'])){echo $_SESSION['no'];} ?>"/>
                </div>
                <div>
                    <label for="AddDescription" style="padding-right:0.7%; font-size:24px;">Description : </label>
                    <input id="AddDescription" name="AddDescription" type="text" style="width:90%;"/>
                </div>
                <div style="padding-bottom:5px;">
                    <label for="AddCategorie" style="padding-right:1.80%; font-size:24px;">Catégorie : </label>
                    <select name="AddCategorie" onChange="" style="width:90%;">
                    <option value=" "></option>
                    <?php
                        include ('Connexion.php');
                        $reponse = $CNN->query('SELECT no_categorie, nom_categorie from tbl_categorie');
                
                        while ($donnees = $reponse->fetch())
                        {
                            echo '<option value="' . $donnees['no_categorie'] . '">' . $donnees['nom_categorie'] . '</option>';
                        }
                        $reponse->closeCursor();
                    ?>
                    </select>
                </div>
                <div style="padding-bottom:10px;">
                    <label for="AddPays" style="padding-right:4.8%; font-size:24px;">Pays : </label>
                    <select name="AddPays" onChange="" style="width:90%;">
                        <option value=" "></option>
                        <?php
                            //include ('Connexion.php');
                            $reponse = $CNN->query('SELECT no_pays, nom_pays from tbl_pays');
                    
                            while ($donnees = $reponse->fetch())
                            {
                                echo '<option value="' . $donnees['no_pays'] . '">' . $donnees['nom_pays'] . '</option>';
                            }
                            $reponse->closeCursor();
                        ?>
                    </select>
                </div>
                <div>
                    <label for="AddUrl" style="padding-right:4%; font-size:24px;">Image : </label>
                    <input id="AddUrl" name="AddUrl" type="file" style="width:90%;"/>
                </div>
                <div class="buttonSubmit">
                    <?php 
                        if(isset($_SESSION['mail']))
                        {
                            echo '<input type="submit" class="button-moy" value="Ajout" style="margin-left:65.8%; width:33%; font-size:24px;">';
                        }
                    ?>
                </div>
                <?php
                    if(isset($_GET['ajout']))
                    {
                        if(htmlentities($_GET['ajout']) == 1)
                        {
                            echo '<div><ul class="check-list">
                                    <li>Ajout effectué!</li></ul></div>';
                        }
                    }
                ?>
            </fieldset>
        </form>
	</section>
</div>