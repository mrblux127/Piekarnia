
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PIEKARNIA</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <img src="wypieki.png" alt="Produkty naszej piekarni">
     
        <header>
            <h1>WITAMY</h1>
            <h4>NA STRONIE PIEKARNI</h4>
            <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
        </header>
    <?php
    $conn = new mysqli( "localhost", "root", "", "piekarnia");
    ?>


        <main>
            <h4>Wybierz rodzaj wypieków:</h4>
            <form action="" method="post">
                <select name="rodzaj" id="rodzaj">
                    <?php
                       
                        $sql = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC;";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["Rodzaj"] . "'>" . $row["Rodzaj"] . "</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="Wybierz">
            </form>
            <table>
                <tr>
                    <th>Rodzaj</th>
                    <th>Nazwa</th>
                    <th>Gramatura</th>
                    <th>Cena</th>
                </tr>
                <?php
                    if(isset($_POST["rodzaj"])) {
                        $rodzaj = $_POST['rodzaj'];
                        $sql = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$rodzaj';";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td>" . $row["Rodzaj"] . "</td>";
                                echo "<td>" . $row["Nazwa"] . "</td>";
                                echo "<td>" . $row["Gramatura"] . "</td>";
                                echo "<td>" . $row["Cena"] . "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
        </main>

        <footer>
            <p>AUTOR: Kacper</p>
        </footer>
    </body>
</html>