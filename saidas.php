<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gerenciamento de Viaturas</title>
     <style type="text/css">
        .logo{
            width: 10%;
            position: absolute;
            top: 4%;
            left: 5%;
        }

        #header {
            background: linear-gradient(rgba(0, 0, 0, 0.5), #009688) ,url(images/placegar-parque-estacionamento-4.jpg);
            height: 150px;
        }

        .banner-header {
            text-align: center;
            color: #fff;
            padding-top: 50px;
        }

        .banner-header h1 {
            font-size: 130px;
            font-family: 'Playfair Display', serif;
        }

        .banner-header p {
            font-size: 20px;
            font-style: italic;
        }

        .content {
            max-width: 400px;
            margin: auto;
        }

        .botao {
            margin: 25px auto 0;
            padding-left: 35%;
            padding-bottom: 4%;
        }

        .content-text {
            padding: 5% 20% 5% 27%;
        }

        .botao a {
            width: 200px;
            text-decoration: none;
            margin: 10px 10px;
            padding: 12px 10px;
            color: black;
            border: 1px solid #808080;
            position: relative;
        }

        #main {
            width: 400px;
            margin: auto;
        }

    </style>
</head>
<body>
    <section id="header">
        <img src="images/onepark.png" class="logo">

        <div class="banner-header">
            <h2>S.G.P.V.</h2>
            <p>Garantimos seguranca a sua viatura</p>
        </div>
    </section>
    <br><br><br>

    <section id="main">
        <h1>Registro de Saída de Viaturas</h1>

        <fieldset>
            <legend>Saida</legend>
            <table cellspacing="10">
                <tr>
                    <form action="registrar-saida.php" method="post">
                        <label for="id">Codigo da Entrada:  </label>
                        <input type="number" name="id" id="id" required>
                        <br><br>
                        <input type="submit" value="Registrar Saida">
                    </form>
                </tr>
            </table>
        </fieldset>
    </section>

</body>
</html>
