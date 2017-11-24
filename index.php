<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Exo SQL</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
    <div class="container">
        <div class="container">
            <?php
            include "connexion.php";
            ?>
            <div class="jumbotron ">
                <h1>Correction Révisions SQL</h1>
            </div>
            <hr>
            <!---------------------------------------------------- SELECTION DONNÉES ---------------------------------------------->

            <h2 class="title"><b>1 - Sélection de données</b></h2>
            <hr>
            <!------------------------------------------------------------- Selection Donnéess  Question 1 --------------------------------------------------------------->
            <div class="list-group">
                <p class="list-group-item-info"><b>1 -</b> Toute la table etudiants.</p>
                <div class="show">
                    <div class="card-body">
                        <?php
                        // Selection
                        $reponse = getResult("SELECT * FROM etudiants");

                        echo '<p class="list-group-item list-group-item-success">SELECT * FROM etudiants</p>';
                        echo '<table class="table table-dark">' .
                            '<thead>' .
                            '<tr>' .
                            '<th >#</th>' .
                            '<th >Nom</th>' .
                            '<th >Date naissance</th>' .
                            '<th >Genre</th>' .
                            '</tr>' .
                            '</thead>' .
                            '<tbody>';

                        foreach ($reponse as $value) {
                            echo '<tr>' .
                                '<th scope="row">' . $value->num_etu . '</th>' .
                                '<td>' . $value->nom_etu . '</td>' .
                                '<td>' . $value->date_naiss . '</td>' .
                                '<td>' . $value->sexe . '</td>' .
                                '</tr>';
                        }
                        echo '</tbody>' .
                            '</table>';
                        ?>
                    </div>
                </div>
                <!------------------------------------------------------------- Selection Donnéess  Question 2 --------------------------------------------------------------->

                <p class="list-group-item-info"><b>2 -</b> Nom, numéro et date de naissance des étudiants.</p>
                <div class="collapse show">
                    <div class="card-body">
                        <?php
                        // Selection
                        $reponse = getResult('SELECT num_etu,nom_etu, date_naiss FROM etudiants');

                        echo '  <p class="list-group-item list-group-item-success">SELECT num_etu, nom_etu, date_naiss FROM etudiants</p>';
                        echo '<table class="table table-dark">' .
                            '<thead>' .
                            '<tr>' .
                            '<th >#</th>' .
                            '<th >Nom</th>' .
                            '<th >Date naissance</th>' .
                            '</tr>' .
                            '</thead>' .
                            '<tbody>';

                        foreach ($reponse as $value) {
                            echo '<tr>' .
                                '<th scope="row">' . $value->num_etu . '</th>' .
                                '<td>' . $value->nom_etu . '</td>' .
                                '<td>' . $value->date_naiss . '</td>' .
                                '</tr>';
                        }
                        echo '</tbody>' .
                            '</table>';
                        ?>
                    </div>
                </div>

                <!------------------------------------------------------------- Selection Donnéess  Question 3 --------------------------------------------------------------->

                <p class="list-group-item-info"><b>3 -</b> Liste des étudiantes.</p>
                <div class="show">
                    <div class="card-body">
                        <?php

                        // Selection
                        $reponse = getResult("SELECT nom_etu FROM etudiants WHERE sexe='F' ");
                        echo '<table class="table table-dark">';

                        echo '  <p class="list-group-item list-group-item-success">SELECT nom_etu FROM etudiants WHERE sexe=\'F\' </p>';
                        foreach ($reponse as $value) {
                            echo '<p scope="row">' . $value->nom_etu . '</p>';
                        }
                        echo '</table>';
                        ?>
                    </div>
                </div>

                <!------------------------------------------------------------- Selection Donnéess  Question 4 --------------------------------------------------------------->

                <p class="list-group-item-info"><b>4 -</b> Liste des enseignants par ordre alphabétique des noms.</p>
                <div class=" show">
                    <div class="card-body">
                        <?php
                        // Selection
                        $reponse = getResult('SELECT nom_ens FROM enseignants ORDER BY nom_ens ASC ');

                        echo '  <li class="list-group-item list-group-item-success">SELECT nom_ens FROM enseignants ORDER BY nom_ens ASC </li>';
                        foreach ($reponse as $value) {
                            echo '<p scope="row">' . $value->nom_ens . '</p>';
                        }
                        echo '</div>';
                        ?>
                    </div>
                </div>

                <!------------------------------------------------------------- Selection Donnéess  Question 5 --------------------------------------------------------------->

                <p class="list-group-item-info"><b>5 -</b> Liste des enseignants par grade et par ordre alphabétique
                    décroissant des noms.</p>
                <div class=" show">
                    <div class="card-body">
                        <?php
                        // Selection
                        $reponse = getResult('SELECT grade, nom_ens FROM enseignants ORDER BY grade,nom_ens  DESC ');

                        echo '  <li class="list-group-item list-group-item-success">SELECT grade, nom_ens FROM enseignants ORDER BY grade,nom_ens DESC </li>';
                        echo '<table class="table table-dark">' .
                            '<thead>' .
                            '<tr>' .
                            '<th >Grade</th>' .
                            '<th >Nom enseignant</th>' .
                            '</tr>' .
                            '</thead>' .
                            '<tbody>';
                        foreach ($reponse as $value) {
                            echo '<tr>' .
                                '<td>' . $value->grade . '</td>' .
                                '<td>' . $value->nom_ens . '</td>' .
                                '</tr>';
                        }
                        echo '</tbody>' .
                            '</table>';
                        ?>
                    </div>
                </div>

                <!------------------------------------------------------------- Selection Donnéess  Question 6 --------------------------------------------------------------->

                <p class="list-group-item-info"><b>6 -</b> Nom, grade et ancienneté des enseignants qui ont strictement plus
                    de 2 ans d'ancienneté.</p>
                <div class=" show">
                    <div class="card-body">
                        <?php
                        // Selection
                        $reponse = getResult('SELECT nom_ens, grade, anciennete FROM enseignants WHERE anciennete > 2 ');

                        echo '  <li class="list-group-item list-group-item-success">SELECT nom_ens, grade, anciennete FROM enseignants WHERE anciennete > 2 </li>';
                        echo '<table class="table table-dark">' .
                            '<thead>' .
                            '<tr>' .
                            '<th >Nom</th>' .
                            '<th >Grade</th>' .
                            '<th >Acienneté</th>' .
                            '</tr>' .
                            '</thead>' .
                            '<tbody>';

                        foreach ($reponse as $value) {
                            echo '<tr>' .
                                '<th scope="row">' . $value->nom_ens . '</th>' .
                                '<td>' . $value->grade . '</td>' .
                                '<td>' . $value->anciennete . '</td>' .
                                '</tr>';
                        }
                        echo '</tbody>' .
                            '</table>';
                        ?>
                    </div>
                </div>

                <!------------------------------------------------------------- Selection Donnéess  Question 7 --------------------------------------------------------------->

                <p class="list-group-item-info"><b>7 -</b> Nom, grade et ancienneté des maîtres de conférences(MCF) qui ont
                    3 ans d'ancienneté ou plus.</p>
                <div class="show">
                    <div class="card-body">
                        <?php
                        // Selection
                        $reponse = getResult('SELECT nom_ens, grade, anciennete FROM enseignants WHERE grade = "MCF" AND anciennete >= 3 ');

                        echo '  <li class="list-group-item list-group-item-success">SELECT nom_ens, grade, anciennete FROM enseignants WHERE grade = "MCF" AND anciennete >= 3  </li>';
                        echo '<table class="table table-dark">' .
                            '<thead>' .
                            '<tr>' .
                            '<th >Nom enseignants</th>' .
                            '<th >Grade</th>' .
                            '<th >Acienneté</th>' .
                            '</tr>' .
                            '</thead>' .
                            '<tbody>';

                        foreach ($reponse as $value) {
                            echo '<tr>' .
                                '<th scope="row">' . $value->nom_ens . '</th>' .
                                '<td>' . $value->grade . '</td>' .
                                '<td>' . $value->anciennete . '</td>' .
                                '</tr>';
                        }
                        echo '</tbody>' .
                            '</table>';
                        ?>
                    </div>
                </div>

                <!------------------------------------------------------------- Selection Donnéess  Question 8 --------------------------------------------------------------->

                <p class="list-group-item-info"><b>8 -</b> Nom et date de naissance des étudiants masculins nés après 1990.
                </p>
                <div class="show">
                    <div class="card-body">
                        <?php
                        // Selection
                        $reponse = getResult("SELECT nom_etu, date_naiss FROM etudiants WHERE  sexe = 'M' AND YEAR(date_naiss)>1990 ");

                        echo '  <li class="list-group-item list-group-item-success">SELECT nom_etu, date_naiss FROM etudiants WHERE  sexe = \'M\' AND YEAR(date_naiss) > 1990 </li>';
                        echo '<table class="table table-dark">' .
                            '<thead>' .
                            '<tr>' .
                            '<th >Nom</th>' .
                            '<th >Date naissance</th>' .
                            '</tr>' .
                            '</thead>' .
                            '<tbody>';

                        foreach ($reponse as $value) {
                            echo '<tr>' .
                                '<td>' . $value->nom_etu . '</td>' .
                                '<td>' . $value->date_naiss . '</td>' .
                                '</tr>';
                        }
                        echo '</tbody>' .
                            '</table>';
                        ?>
                    </div>
                </div>

                <!------------------------------------------------------------- Selection Donnéess  Question 9 --------------------------------------------------------------->

                <p class="list-group-item-info"><b>9 -</b> Lignes de la table notes correspondant à une note inconnue.</p>
                <div class="show">
                    <div class="card-body">
                        <?php
                        // Selection
                        $reponse = getResult("SELECT _num_etu, _num_mat, note FROM notes WHERE note IS NULL ");

                        echo '  <li class="list-group-item list-group-item-success">SELECT note FROM notes WHERE note IS NULL</li>';
                        echo '<table class="table table-dark">' .
                            '<thead>' .
                            '<tr>' .
                            '<th ># etu</th>' .
                            '<th ># mat</th>' .
                            '<th >Note</th>' .
                            '</tr>' .
                            '</thead>' .
                            '<tbody>';

                        foreach ($reponse as $value) {
                            echo '<tr>' .
                                '<td>' . $value->_num_etu . '</td>' .
                                '<td>' . $value->_num_mat . '</td>' .
                                '<td>' . $value->note . 'Null</td>' .
                                '</tr>';
                        }
                        echo '</tbody>' .
                            '</table>';
                        ?>
                    </div>
                </div>

                <!------------------------------------------------------------- Selection Donnéess  Question 10 --------------------------------------------------------------->

                <p class="list-group-item-info"><b>10 -</b> Nom des enseignants professeurs(PR) ou associés(ASS), en
                    utilisant l'opérateur IN.</p>
                <div class="show">
                    <div class="card-body">
                        <?php
                        // Selection
                        $reponse = getResult("SELECT nom_ens, grade FROM enseignants WHERE grade IN('PR', 'ASS') ");

                        echo '  <li class="list-group-item list-group-item-success">SELECT nom_ens, grade FROM enseignants WHERE grade IN(\'PR\', \'ASS\')</li>';
                        echo '<table class="table table-dark">' .
                            '<thead>' .
                            '<tr>' .
                            '<th >Nom enseignants</th>' .
                            '<th >Grade</th>' .
                            '</tr>' .
                            '</thead>' .
                            '<tbody>';

                        foreach ($reponse as $value) {
                            echo '<tr>' .
                                '<td>' . $value->nom_ens . '</td>' .
                                '<td>' . $value->grade . '</td>' .
                                '</tr>';
                        }
                        echo '</tbody>' .
                            '</table>';
                        ?>
                    </div>
                </div>

                <!------------------------------------------------------------- Selection Donnéess  Question 11 ------------------------------>
                <p class="list-group-item-info"><b>11 -</b> Nom des enseignants dont le nom ou le prénom contiennent un J.
                </p>
                <div class="show">
                    <div class="card-body">
                        <?php
                        // Selection
                        $reponse = getResult("SELECT nom_ens, grade FROM enseignants WHERE nom_ens LIKE '%J%' ");

                        echo '  <li class="list-group-item list-group-item-success">SELECT nom_ens, grade FROM enseignants WHERE nom_ens LIKE  \'%J%\' </li>';
                        echo '<table class="table table-dark">' .
                            '<thead>' .
                            '<tr>' .
                            '<th >Nom enseignants</th>' .
                            '</tr>' .
                            '</thead>' .
                            '<tbody>';

                        foreach ($reponse as $value) {
                            echo '<tr>' .
                                '<td>' . $value->nom_ens . '</td>' .
                                '</tr>';
                        }
                        echo '</tbody>' .
                            '</table>';
                        ?>
                    </div>
                </div>

                <!------------------------------------------------------------- Selection Donnéess  Question 12 ------------------------------>

                <p class="list-group-item-info"><b>12 -</b> Nom et date de naissance des étudiants nés en 1990.</p>
                <div class="show">
                    <div class="card-body">
                        <?php
                        // Selection
                        $reponse = getResult("SELECT nom_etu, date_naiss FROM etudiants WHERE YEAR(date_naiss) = 1990 ");

                        echo '  <li class="list-group-item list-group-item-success">SELECT nom_etu, date_naiss FROM etudiants WHERE YEAR(date_naiss) = 1990</li>';
                        echo '<table class="table table-dark">' .
                            '<thead>' .
                            '<tr>' .
                            '<th >Nom</th>' .
                            '<th >Date naissance</th>' .
                            '</tr>' .
                            '</thead>' .
                            '<tbody>';

                        foreach ($reponse as $value) {
                            echo '<tr>' .
                                '<td>' . $value->nom_etu . '</td>' .
                                '<td>' . $value->date_naiss . '</td>' .
                                '</tr>';
                        }
                        echo '</tbody>' .
                            '</table>';
                        ?>
                    </div>
                </div>

                <!------------------------------------------------------------- Selection Donnéess  Question 13 ------------------------------>

                <p class="list-group-item-info"><b>13 -</b> Nom et âge (en années) des étudiants de 23 ans ou plus.</p>
                <div class="show">
                    <div class="card-body">
                        <?php
                        // Selection
                        $reponse = getResult("SELECT nom_etu, date_naiss FROM etudiants WHERE (YEAR(CURDATE())-YEAR(date_naiss))>= 23 ");

                        echo '  <li class="list-group-item list-group-item-success">SELECT nom_etu, date_naiss FROM etudiants WHERE (YEAR(CURDATE())-YEAR(date_naiss))>= 23</li>';
                        echo '<table class="table table-dark">' .
                            '<thead>' .
                            '<tr>' .
                            '<th >Nom</th>' .
                            '<th >Date naissance</th>' .
                            '</tr>' .
                            '</thead>' .
                            '<tbody>';

                        foreach ($reponse as $value) {
                            echo '<tr>' .
                                '<td>' . $value->nom_etu . '</td>' .
                                '<td>' . $value->date_naiss . '</td>' .
                                '</tr>';
                        }
                        echo '</tbody>' .
                            '</table>';
                        ?>
                    </div>

                </div>
                <hr>
                <h2 class="title"><b>2 - Jointures</b></h2>
                <hr>
                <ul class="list-group">
                    <!---------------------------------------------------- JOINTURES ----------------------------------------------------------------->

                    <!------------------------------------------------- Jointures  Question 1 -------------------------------------------------------->

                    <p class="list-group-item-info"><b>1 -</b> Notes obtenues par l'étudiant Dupont, Charles.</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT nom_etu, note  FROM etudiants INNER JOIN notes ON etudiants.num_etu = notes._num_etu WHERE nom_etu= 'Dupont, Charles' ");

                            echo '  <li class="list-group-item list-group-item-success">SELECT nom_etu, note  FROM etudiants INNER JOIN notes ON etudiants.num_etu = notes._num_etu WHERE nom_etu= \'Dupont, Charles\'</li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th >Nom</th>' .
                                '<th >Note</th>' .
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->nom_etu . '</td>' .
                                    '<td>' . $value->note . '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>

                    <!------------------------------------------------------------- Jointures  Question 2 ------------------------------>

                    <p class="list-group-item-info"><b>2 -</b> Note obtenue par l'étudiant Dupont, Charles en G.P.A.O.</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT nom_etu, note, nom_mat  FROM etudiants INNER JOIN notes ON etudiants.num_etu = notes._num_etu  INNER JOIN matieres ON notes._num_mat = matieres.num_mat WHERE nom_etu= 'Dupont, Charles' AND  nom_mat= 'G.P.A.O.'  ");

                            echo '  <li class="list-group-item list-group-item-success">SELECT nom_etu, note, nom_mat  FROM etudiants INNER JOIN notes ON etudiants.num_etu = notes._num_etu  INNER JOIN matieres ON notes._num_mat = matieres.num_mat WHERE nom_etu= \'Dupont, Charles\' AND  nom_mat= \'G.P.A.O.\'</li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th >Nom</th>' .
                                '<th >Note</th>' .
                                '<th >Matière</th>' .
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->nom_etu . '</td>' .
                                    '<td>' . $value->note . '</td>' .
                                    '<td>' . $value->nom_mat . '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>

                    <!------------------------------------------------------------- Jointures  Question 3 ------------------------------>

                    <p class="list-group-item-info"><b>3 -</b> Nom et date de naissance des étudiants plus jeunes(en années)
                        que l'étudiant Dupont, Charles.</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT nom_etu, date_naiss FROM etudiants WHERE Year(date_naiss)>( SELECT YEAR(date_naiss) FROM etudiants WHERE nom_etu = 'Dupont, Charles')  ");

                            echo '  <li class="list-group-item list-group-item-success">SELECT nom_etu, date_naiss from etudiants WHERE Year(date_naiss) > ( SELECT YEAR(date_naiss) FROM etudiants WHERE nom_etu = "Dupont, Charles" )</li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th >Nom</th>' .
                                '<th >Date naissance</th>' .
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->nom_etu . '</td>' .
                                    '<td>' . $value->date_naiss . '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>

                    <!------------------------------------------------------------- Jointures  Question 4 ------------------------------>

                    <p class="list-group-item-info"><b>4 -</b> Nom des étudiants ayant eu la moyenne dans une des matières
                        enseignées par Simon, Etienne.</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT nom_etu, note FROM etudiants INNER JOIN notes ON num_etu = _num_etu INNER JOIN matieres ON _num_mat = num_mat INNER JOIN enseignants ON _num_ens = num_ens WHERE note >= 10 AND  nom_ens = 'Simon, Etienne' ");

                            echo '  <li class="list-group-item list-group-item-success">SELECT nom_etu, note FROM etudiants INNER JOIN notes ON num_etu = _num_etu INNER JOIN matieres ON _num_mat = num_mat INNER JOIN enseignants ON _num_ens = num_ens WHERE note >= 10 AND  nom_ens = \'Simon, Etienne\'</li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th >Nom étudiant</th>' .
                                '<th >Note</th>' .
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->nom_etu . '</td>' .
                                    '<td>' . $value->note . '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>

                    <!------------------------------------------------------------- Jointures  Question 5 ------------------------------>

                    <p class="list-group-item-info"><b>5 -</b> Nom des étudiants qui ont eu une note en "Logique" inférieure
                        à celle de "Statistiues".</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT nom_etu, note1._num_etu FROM notes note1, notes note2 INNER JOIN etudiants ON _num_etu = num_etu WHERE note1._num_etu=note2._num_etu AND note1._num_mat=4 AND note2._num_mat=5 AND note1.note<note2.note");

                            echo '  <li class="list-group-item list-group-item-success">SELECT nom_etu, note1._num_etu FROM notes note1, notes note2 INNER JOIN etudiants ON _num_etu = num_etu WHERE note1._num_etu=note2._num_etu AND note1._num_mat=4 AND note2._num_mat=5 AND note1.note < note2.note </li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th >Nom étudiant</th>' .
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->nom_etu . '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>

                    <!------------------------------------------------------------- Jointures  Question 6 ------------------------------>

                    <p class="list-group-item-info"><b>6 -</b> Nom des étudiants ayant eu une plus mauvaise note en
                        Programmation qu'en Bases de données.</p>
                    <div class="show">
                        <div class="card-body">

                            <?php
                            // Selection
                            $reponse = getResult("SELECT nom_etu, note1._num_etu FROM notes note1, notes note2 INNER JOIN etudiants ON _num_etu = num_etu WHERE note1._num_etu=note2._num_etu AND note1._num_mat=1 AND note2._num_mat=2 AND note1.note < note2.note ");

                            echo '  <li class="list-group-item list-group-item-success">SELECT nom_etu, note1._num_etu FROM notes note1, notes note2 INNER JOIN etudiants ON _num_etu = num_etu WHERE note1._num_etu=note2._num_etu AND note1._num_mat=1 AND note2._num_mat=2 AND note1.note < note2.note</li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th >Nom étudiant</th>' .
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->nom_etu . '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>


                    <!------------------------------------------------------------- Jointures  Question 7 ------------------------------>

                    <p class="list-group-item-info"<b>7 -</b> Nom et numéro des étudiants n'ayant eu aucune note.</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT num_etu, nom_etu, note FROM etudiants INNER JOIN notes ON etudiants.num_etu = notes._num_etu WHERE note IS NULL ");

                            echo '  <li class="list-group-item list-group-item-success">SELECT num_etu, nom_etu, note FROM etudiants INNER JOIN notes ON etudiants.num_etu = notes._num_etu WHERE note IS NULL </li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th >Nom étudiant</th>' .
                                '<th >Note</th>' .
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->nom_etu . '</td>' .
                                    '<td>' . $value->note . 'Null</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>

                </ul>
                <hr>
                <h2 class="title"><b>3 - Regroupements</b></h2>
                <hr>
                <ul class="list-group">

                    <!------------------------------------------------------------- Regroupement  Question 1 ------------------------------>

                    <p class="list-group-item-info"><b>1 -</b> Grades différents existant dans la table des enseignants.</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT grade FROM enseignants GROUP BY grade ");

                            echo '  <li class="list-group-item list-group-item-success">SELECT grade FROM enseignants GROUP BY grade</li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th >Grades</th>' .
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->grade . '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>


                    <!------------------------------------------------------------- Regroupement  Question 2 ------------------------------>

                    <p class="list-group-item-info"><b>2 -</b> Par sexe, afficher les différents âges (en années) représentés parmi les étudiants.</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT sexe, YEAR(date_naiss) AS annee FROM etudiants GROUP BY YEAR(date_naiss) ORDER BY sexe DESC "); //La galanterie avant tout!

                            echo '  <li class="list-group-item list-group-item-success">SELECT sexe, YEAR(date_naiss) AS annee FROM etudiants GROUP BY YEAR(date_naiss) ORDER BY sexe</li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th >Année</th>' .
                                '<th >Genre</th>' .
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->annee . '</td>' .
                                    '<td>' . $value->sexe . '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>

                    <!------------------------------------------------------------- Regroupement  Question 3 ------------------------------>

                    <p class="list-group-item-info"><b>3 -</b> Nombre total d'étudiants.</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT COUNT(*) AS nb_etu FROM etudiants ");

                            echo '  <li class="list-group-item list-group-item-success">SELECT COUNT(*) AS nb_etu FROM etudiants</li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th >Nombre étudiants</th>' .
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->nb_etu . '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>

                    <!------------------------------------------------------------- Regroupement  Question 4 ------------------------------>

                    <p class="list-group-item-info"><b>4 -</b> Date de naissance de l'étudiant le plus jeune et de celui le plus âgé.</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT MIN(date_naiss) AS plus_age, MAX(date_naiss) AS plus_jeune  FROM etudiants  ");

                            echo '  <li class="list-group-item list-group-item-success">SELECT MAX(date_naiss) AS plus_jeune, MIN(date_naiss) AS plus_age  FROM etudiants </li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th >Étudiant plus jeune</th>' .
                                '<th >Étudiant plus agé</th>' .
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->plus_jeune . '</td>' .
                                    '<td>' . $value->plus_age . '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>

                    <!------------------------------------------------------------- Regroupement  Question 5 ------------------------------>

                    <p class="list-group-item-info"><b>5 -</b> Pour chaque matière identifiée par son numéro, nombre d'étudiants qui ont une note.</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT num_mat, COUNT(*) AS nb_note FROM notes INNER JOIN matieres ON _num_mat = num_mat WHERE note IS NOT NULL GROUP BY num_mat ");

                            echo '  <li class="list-group-item list-group-item-success">SELECT num_mat, COUNT(*) AS nb_note FROM notes INNER JOIN matieres ON _num_mat = num_mat WHERE note IS NOT NULL GROUP BY num_mat</li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th ># Matière</th>' .
                                '<th >Nombre d\'étudiants</th>' .
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->num_mat. '</td>' .
                                    '<td>' . $value->nb_note. '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>


                    <!------------------------------------------------------------- Regroupement  Question 6 ------------------------------>

                    <p class="list-group-item-info"><b>6 -</b> Pour chaque étudiant identifié par son numéro, moyenne obtenue (avec 2 décimales).</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT *, Round(AVG(note), 2) AS avg_note FROM etudiants INNER JOIN notes ON num_etu = _num_etu GROUP BY num_etu");

                            echo '  <li class="list-group-item list-group-item-success">SELECT num_etu, Round(AVG(note), 2)AS avg_note FROM etudiants INNER JOIN notes ON num_etu = _num_etu GROUP BY num_etu</li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th ># étudiant</th>'.
                                '<th >Moyenne</th>'.
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->num_etu. '</td>' .
                                    '<td>' . $value->avg_note. '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>

                    <!------------------------------------------------------------- Regroupement  Question 7 ------------------------------>

                    <p class="list-group-item-info"><b>7 -</b> Numéro des étudiants n'ayant eu que 4 notes ou moins.</p>
                    <div class="show">
                        <div class="card-body">
                            <?php
                            // Selection
                            $reponse = getResult("SELECT num_etu  FROM etudiants INNER JOIN notes ON num_etu = _num_etu GROUP BY num_etu HAVING COUNT(note) <= 4 ");

                            echo '  <li class="list-group-item list-group-item-success">SELECT num_etu  FROM etudiants INNER JOIN notes ON num_etu = _num_etu GROUP BY num_etu HAVING COUNT(note) <= 4</li>';
                            echo '<table class="table table-dark">' .
                                '<thead>' .
                                '<tr>' .
                                '<th ># étudiant</th>'.
                                '</tr>' .
                                '</thead>' .
                                '<tbody>';

                            foreach ($reponse as $value) {
                                echo '<tr>' .
                                    '<td>' . $value->num_etu. '</td>' .
                                    '</tr>';
                            }
                            echo '</tbody>' .
                                '</table>';
                            ?>
                        </div>

                    </div>
                </ul>
                <hr>

                <!------------------------------------------------------------- BONUS ------------------------------>

                <div class="jumbotron">
                    <h2 class="title"><b>BONUS</b></h2>

                    <h2><a href="https://www.youtube.com/watch?v=D4w4dNy01ZM" target="_blank"><b>Le Frih deh Bi De
                                Uh</b></a></h2>

                    <ul class="list-group">
                        <li class="list-group-item"><b>1 -</b> Noms des matières (et de leur enseignant) pour lesquelles
                            la moyenne (non coefficientée) des notes est inférieure à 10.
                        </li>
                        <li class="list-group-item"><b>2 -</b> Pour chaque étudiant ayant eu une note dans chacune des 5
                            matières, le nom (par ordre alphabétique), le numéro et la moyenne coefficientée obtenue.
                        </li>
                        <li class="list-group-item"><b>3 -</b> Nom des enseignants ayant le même grade que Bertrand,
                            Pierre.
                        </li>
                        <li class="list-group-item"><b>4 -</b> Pour chaque étudiant, nom et nombre d'étudiants se
                            trouvant avant lui sur la liste alphabétique des noms.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>

