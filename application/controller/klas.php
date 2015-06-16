<?php

switch ($url_action) {
	case 'create':

		/*
			Nodig: Niks!
			1. We gaan een formulier tonen.
			2. Formulier gegevens opslaan in database.
		*/
			echo $url_action;
		break;

	case 'read':
		
		/*
			Nodig: ID record welke uitgelezen moet worden.
			1. Gegevens uitlezen uit database (ID nodig!)
			2. Tonen gegevens uit de database.
		*/
			if (isset($url_params)) {

				$db = makeDatabaseConnection();

				$result = getStudent($url_params[0], $db);

				render('klas/read', $result);
			} else {
				echo "Donder op joh!";
			}

		break;	
	
	case 'update':
		
		/*
			Nodig: ID record wat gewijzigd gaat worden.
			1. Gegevens uitlezen uit database (ID nodig!)
			2. Tonen gegevens database in formulier.
			3. Formulier gegevens updaten in database.
		*/
			echo $url_params[0] . $url_action;
		break;

	case 'delete':
		
		/*
			Nodig: ID record wat verwijderd moet worden.
			1. Gegevens uitlezen uit database (ID nodig!)
			2. Gegevens tonen in beeld, bevestiging vragen
			3. Gegevens verwijderen, indien bevestigd! Anders terug naar default.
		*/
			echo $_GET['id'] . $_GET['action'];
		break;

	default:
			
			$db = makeDatabaseConnection();
			$result = getStudents($db);

			render("klas/index", $result);
		break;
}
