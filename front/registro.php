<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles.css" rel="stylesheet">
</head>

<body class="bg-blue-200">
    <div class="flex flex-col items-center  justify-center mt-10 px-5">





        <div class="bg-white p-4 shadow-lg rounded-lg w-[400px] h-[500px] flex justify-center align-center">



            <form method="POST" action="../back/controllers/user.php" class="flex flex-col align-center rounded gap-4 py-5 px-5">
                <?php
                session_start();

                if (isset($_SESSION['errores'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php foreach ($_SESSION['errores'] as $error) { ?>
                            <div class=" text-sm text-red-300 w-[100px]"><?= $error ?></div>
                        <?php } ?>
                        <!-- Limpiar variables de sesión después de mostrar los errores -->
                        <?php unset($_SESSION['errores']); ?>
                    </div>
                <?php session_unset();
                } ?>

                <h2 class="text-center text-2xl text-gray-500 font-bold">Registro</h2>
                <label>Nombre</label>
                <input name="nombre" required type="text" class="border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 shadow-md rounded-md p-2" />
                <label class="text-red-300">Correo 99</label>
                <input type="email" required name="email" class="border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 shadow-md rounded-md p-2" />
                <label> Clave</label>
                <input type="text" required name="clave" class="border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 shadow-md rounded-md p-2" />
                <input type="hidden" name="action" value="registerUser">
                <button type="submit" name="register" class="bg-blue-200 text-gray-500 font-bold py-1 px-3">Ingresar</button>
                <p>¿Ya tienes cuenta ? <a class="text-blue-600 underline" href="../index.html">Inicia Sesion</a></p>
            </form>
        </div>

    </div>
</body>

</html>