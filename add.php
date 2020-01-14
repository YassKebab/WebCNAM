<?php
    try{

        require_once('connection.php');
        require_once 'WebPage.class.php' ;

        /*On prépare la page*/
        $page = new WebPage();

        $page->setTitle('Ajout dans une BD via Form + Bootstrap') ;

        $page->appendContent(<<<HTML
<div class="jumbotron text-center">
            <h1>Liste des étudiants</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Ajouter un étudiant :</h3>
                    <form method="POST" action="add.php">
                        <div class="form-group">
                            <label>Prenom :
                                <input type="text" class="form-control" name="prenom">
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Nom :
                                <input type="text" class="form-control" name="nom">
                            </label>
                        </div>
                        <div class="form-group">
                            <label> Email :
                                <input type="text" class="form-control" name="email">
                            </label>
                        </div>
                        <input type="submit" value="Envoyer" name="envoyer">
                    </form>
                </div>


HTML);
        // On recupère les données du formulaire
        $lastname = $_POST["nom"];
        $firstname = $_POST["prenom"];
        $email = $_POST["email"];

        //On prepare la requete
        $stmt = $conn->prepare(/** @lang text */ "INSERT INTO students (student_lastname, student_firstname, student_email)
        VALUES (:lastname, :firstname, :email)");

        // On bind les  données du formulaire à leur placeholder
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        echo "New records created successfully";
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
