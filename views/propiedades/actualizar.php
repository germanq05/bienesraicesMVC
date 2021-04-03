<main class="contenedor seccion">
    <h1 class="titulo">Actualizar Propiedad</h1>

    <a href="/public/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) :  ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" class="boton boton-verde" value="Actualizar Propiedad">

    </form>

</main>
