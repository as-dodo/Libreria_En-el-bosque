<?php include('includes/header.php'); ?>

<h2>Registrarse</h2>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4 text-center" style="font-family: 'Cormorant Garamond', serif;">Registro</h2>

            <form>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre">Nombre *</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="apellido">Apellido *</label>
                        <input type="text" class="form-control" id="apellido" placeholder="Apellido" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Correo Electrónico *</label>
                    <input type="email" class="form-control" id="email" placeholder="Correo Electrónico" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password">Contraseña *</label>
                        <input type="password" class="form-control" id="password" placeholder="Contraseña" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="confirmPassword">Confirmar Contraseña *</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirmar Contraseña" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="telefono">Teléfono *</label>
                    <input type="tel" class="form-control" id="telefono" placeholder="Teléfono" required>
                </div>

                <div class="mb-3">
                    <label for="fechaNacimiento">Fecha de Nacimiento *</label>
                    <input type="date" class="form-control" id="fechaNacimiento" required>
                </div>

                <div class="mb-4">
                    <label for="genero" class="form-label">Género</label>
                    <select class="form-select" id="genero" name="genero">
                        <option selected disabled>Seleccione su género</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                        <option value="Otro">Otro</option>
                        <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100">Registrarse</button>
            </form>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>