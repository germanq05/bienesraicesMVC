<main class="contenedor seccion">
  
    <h1 data-cy="heading-contacto">Contacto</h1>

    <?php if($mensaje){ ?>
        <p data-cy="alerta-envio-formulario" class="alerta exito"><?php echo $mensaje; ?></p>;
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="webp">
        <source srcset="build/img/destacada3.jpg" type="jpeg">
        <img src="build/img/destacada3.jpg" alt="Imagen destacada" loading="lazy">
    </picture>

    <h2 data-cy="heading-formulario">Llene el Formulario de Contacto</h2>

    <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
        <fieldset>

            <legend>Informacion Personal</legend>
            <label for="nombre">Nombre</label>
            <input data-cy="input-nombre" type="text" id="nombre" placeholder="Tu nombre..." name="contacto[nombre]" required>

            <label for="mensaje">Mensaje:</label>
            <textarea data-cy="input-mensaje" id="mensaje" cols="30" rows="10" name="contacto[mensaje]" required></textarea>

        </fieldset>

        <fieldset>
            <legend> Informacion Sobre la Propiedad</legend>

            <label for="opciones">Vende o Compra</label>
            <select data-cy="input-opciones" id="opciones" name="contacto[tipo]" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="compra">Compra</option>
                    <option value="venta">Venta</option>
                </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input data-cy="input-precio" type="number" id="presupuesto" placeholder="Tu Precio o Presupuesto..." name="contacto[precio]" required>

        </fieldset>

        <fieldset>

            <legend>Informacion sobre la Propiedad</legend>
            <p>¿Como desea ser Contactado?</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input data-cy="forma-contacto" type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>

                <label for="contactar-email">E-mail</label>
                <input data-cy="forma-contacto" type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>            
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">

    </form>

</main>