<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de temperatura</title>
</head>

<body>
    <form method="post" action="index.php">
        <label for="input_celsius">Digite o valor em Celsius:</label>
        <input type="number" id="input_celsius" name="input_celsius" required>
        <button type="submit">Converter</button>
    </form>
    <?php
    if (!empty($_POST)) {
        $grau_celsius = $_POST["input_celsius"];

        $grau_fahrenheit = $grau_celsius * 1.8 + 32;
        $grau_kelvin = $grau_celsius + 273.15;
        $grau_rankine = $grau_celsius * 1.8 + 491.67;

        print "<p>$grau_celsius °C é igual à $grau_fahrenheit °F</p>";
        print "<p>$grau_celsius °C é igual à $grau_kelvin K</p>";
        print "<p>$grau_celsius °C é igual à $grau_rankine °Ra</p>";
    }
    ?>
</body>

</html>