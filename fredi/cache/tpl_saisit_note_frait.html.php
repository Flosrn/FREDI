<?php $this->_tpl_include('header.html'); ?>

<?php

include ('dto/LigneFrai.class.php');
include ('dto/Motif.class.php');



$submit = isset($_POST['submit']);
if ($submit)
	{
		

     
        $noteDeFrais = new Lignefrai();
        $noteDeFrais->date = $_POST['dateDeplacement'];
        $noteDeFrais->trajet = $_POST['trajet'];
        $noteDeFrais->km = ($_POST['nbKM']);
        $noteDeFrais->coutTrajet = ($_POST['coutTrajet']);
        $noteDeFrais->coutPeage = ($_POST['coutPeage']);
        $noteDeFrais->coutHebergement= ($_POST['coutHebergement']);
        $noteDeFrais->coutRepas = ($_POST['coutRepas']);
        $noteDeFrais->coutTotal = ($_POST['coutTotal']);
        
		$motif = new Motif();
		$motif->libelle = ($_POST['motif']);

		insertLigneDeFrait($noteDeFrais);
        insertMotif($motif);
        header('Location: Gerer_bordereau.php');
		}

?>



<div id="noteFrait">

	<form id="formulaire" action="#" method="post">
            <p>
            	<div class="formLeft">
            	<label for="dateDeplacement">Date du déplacement</label><br />
                <input type="text" value="" name="dateDeplacement" required="required" /><br /> 
                <label for="motif" >motif</label><br />
                <input type="text" value="" name="motif" required="required" /><br /> 
                <label for="trajet">Trajet(prix)</label><br />
                <input type="text" value="" name="trajet" required="required" /><br /> 
            	<label for="nbKM" >Nombre de kilometre</label><br />
                <input type="integer" value="" name="nbKM" required="required" /><br />      
                <label for="coutTrajet" >Cout trajet</label><br />
                <input type="integer" value="" name="coutTrajet" required="required" /><br />              
                </div>

                <div class="formRight">
                <label for="coutPeage">cout péage</label><br />
                <input type="integer" value="" name="coutPeage" required="required" /><br />
                <label for="coutHebergement" >cout hébergement</label><br />
                <input type="integer" value="" name="coutHebergement" required="required" /><br />
                <label for="coutRepas" >cout repas</label><br />
                <input type="integer" value="" name="coutRepas" required="required" /><br />
                <label for="coutTotal" >cout total</label><br />
                <input type="integer" value="" name="coutTotal" required="required" /><br />
                
                <!--<label for="tarifKm" >Tarif kilométrique</label><br />
                <input type="integer" value="" name="tarifKm" required="required" /><br />-->
                </div>
            </p>

            <input type="submit" value="Envoyer" name="submit" />
            <input type="reset" value="Réinitialiser" name="Réinitialiser" />
        </form>
</div>



<?php $this->_tpl_include('footer.html'); ?>