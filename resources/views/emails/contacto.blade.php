<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color:#f4f6fb;">

    <table width="100%" cellspacing="0" cellpadding="0" style="background-color:#f4f6fb; padding: 30px 0;">
        <tr>
            <td align="center">

                <!-- Card contenedor -->
                <table width="600" cellspacing="0" cellpadding="0" 
                       style="background:white; border-radius:12px; padding:30px; box-shadow:0 4px 15px rgba(0,0,0,0.1);">

                    <tr>
                        <td align="center" style="padding-bottom:20px;">
                            <img src="https://via.placeholder.com/200x60?text=CollabPro" 
                                 alt="CollabPro Logo"
                                 style="display:block; margin:auto; max-width:200px;">
                        </td>
                    </tr>

                    <tr>
                        <td align="center">
                            <h2 style="color:#667eea; margin:0; font-size:24px; font-weight:bold;">
                                Nuevo mensaje desde el formulario de contacto
                            </h2>
                        </td>
                    </tr>

                    <tr><td style="height:25px;"></td></tr>

                    <tr>
                        <td>
                            <p style="font-size:16px; color:#444; line-height:1.6;">
                                Has recibido un nuevo mensaje a través del formulario de contacto de CollabPro.
                                A continuación se detallan los datos ingresados:
                            </p>
                        </td>
                    </tr>

                    <tr><td style="height:20px;"></td></tr>

                    <!-- Campos -->
                    <tr>
                        <td style="font-size:15px; color:#222;">
                            <strong>Nombre:</strong> {{ $nombre }}
                        </td>
                    </tr>

                    <tr><td style="height:8px;"></td></tr>

                    <tr>
                        <td style="font-size:15px; color:#222;">
                            <strong>Email:</strong> {{ $email }}
                        </td>
                    </tr>

                    <tr><td style="height:8px;"></td></tr>

                    <tr>
                        <td style="font-size:15px; color:#222;">
                            <strong>Asunto:</strong> {{ $asunto }}
                        </td>
                    </tr>

                    <tr><td style="height:8px;"></td></tr>

                    <tr>
                        <td style="font-size:15px; color:#222;">
                            <strong>Mensaje recibido:</strong> {{ $mensaje }}
                        </td>
                    </tr>

                    <tr><td style="height:2
