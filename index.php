<!DOCTYPE php>
<?php
	$db=new PDO('mysql:host=localhost;dbname=test','rt','rtlry');
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css"/>
        <title>Todo List</title>
    </head>
    <body>
        <h1>Todo List</h1>
        <?php
			$resultat=$db->selection('SELECT * FROM todos');
			$todos=$resultat->fetchAll();
			foreach($todos as $todo){
				echo"<table><tr><td>N°</td><td>Tâche</td></tr><tr><td>$todo[id]</td><td>$todo[texte]</td></tr></table>";
			};
            if(isset($_POST['texte'])){
				echo "Tâche ajouté ".$_POST['texte'];
				$db->insertion('INSERT INTO todos (texte) VALUES ("$_POST[\'texte\']")');
            }
            else{
				echo "Entrez une tâche";
            }
        ?>
        <form method="post" action="index.php">
            <input type="text" name="texte"/>
            <input type="submit" value="ajouter"/>
        </form>
    </body>
</html>
