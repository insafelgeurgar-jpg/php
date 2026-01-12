<?php
function calcul($a, $b, $op) {
    switch ($op) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            if ($b == 0) {
                return "Erreur: division par zéro";
            }
            return $a / $b;
        default:
            return "Opération invalide";
    }
}

$resultat = ""; 

if (isset($_POST['calculer'])) {
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $op = $_POST['operation'];

    if (is_numeric($n1) && is_numeric($n2) && $op != "") {
        $resultat = calcul($n1, $n2, $op);
    } else {
        $resultat = "Veuillez entrer des nombres valides et choisir une opération.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mini Calculatrice PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        input, select, button {
            padding: 10px;
            margin: 5px 0 15px 0;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
        .result {
            background: #e0e0e0;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Mini Calculatrice</h2>
    <form method="POST">
        <input type="number" name="n1" placeholder="Nombre 1" required>
        <input type="number" name="n2" placeholder="Nombre 2" required>
        <select name="operation" required>
            <option value="">Choisir l'opération</option>
            <option value="+">Addition (+)</option>
            <option value="-">Soustraction (-)</option>
            <option value="*">Multiplication (*)</option>
            <option value="/">Division (/)</option>
        </select>
        <button type="submit" name="calculer">Calculer</button>
    </form>

    <?php if($resultat !== ""): ?>
        <div class="result">Résultat : <?= $resultat ?></div>
    <?php endif; ?>
<?php if($resultat!==''):?>
    <div class="result">resultat:<?=$resultat?></div>
    <?php endif;?>

</body>
</html>
