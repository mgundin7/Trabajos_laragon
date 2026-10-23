<html>
    <body>
        <form>
            <input type="text" placeholder="Nombre" name="nombre"<?php if (isset($_REQUEST['nombre']) && $_REQUEST['nombre'] != ''): ?> value="<?php echo $_REQUEST['nombre']; ?>"<?php endif; ?>>
            <input type="number" placeholder="Edad" name="edad"<?php if (isset($_REQUEST['edad']) && $_REQUEST['edad'] != ''): ?> value="<?php echo $_REQUEST['edad']; ?>"<?php endif; ?>>
            <input type="submit">
        </form>
    </body>
</html>