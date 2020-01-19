<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body>
        <form method="post">
            <div class="form-group">
                <label for="student_lastname">Nom</label>
                <input name="student_lastname" type="text" class="form-control" id="student_lastname" required/>
            </div>
            <div class="form-group">
                <label for="student_firstname">Prénom</label>
                <input name="student_firstname" type="text" class="form-control" id="student_firstname" required/>
            </div>
            <div class="form-group">
                <label for="student_email">Email</label>
                <input name="student_email" type="text" class="form-control" id="student_email" required/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a class="btn btn-primary mb-1 mt-1" href="/FirstPagePhp">Retour</a>
        <?php if($feedback != NULL) : ?>
            <div class="alert alert-primary" role="alert">
                <?= $feedback ?>
            </div>
        <?php endif?>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>