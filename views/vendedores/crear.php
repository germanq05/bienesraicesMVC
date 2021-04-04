<main class="contenedor seccion">
    <h1 class="titulo">Crear Vendedor</h1>

    <a href="/public/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) :  ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST" action="/public/vendedores/crear" enctype="multipart/form-data">

        <?php include 'formulario.php'; ?>

        <input type="submit" class="boton boton-verde" value="Crear Vendedor">

    </form>

</main>