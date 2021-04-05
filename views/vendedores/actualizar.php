
<main class="contenedor seccion">
    <h1 class="titulo">Actualizar Vendedor</h1>

    <a href="s/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) :  ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include 'formulario.php'; ?>

        <input type="submit" class="boton boton-verde" value="Guardar Cambios">

    </form>

</main>