<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert con codeIgniter</title>
<style type="text/css">
    fieldset{
        width: 600px;
        padding: 20px;
        margin: 40px 0px 0px 300px;
    }
    table{
        padding: 40px;
        margin: 10px 0px 0px 50px;
    }
    label{
        display: block;
    }
</style>
</head>
<body>
 
<?=form_open(base_url().'comentarios/insertar_comentarios');
//aqui se procesará nuestro formulario, controlador comentarios, función insertar_comentarios
//creamos los arrays que compondran nuestro formulario
//primer array con el input que se llamará nombre y será donde introduciremos el mismo
 
    $estacion = array(
        'name' => 'id_estacion',
        'id' => 'id_estacion',
        'size' => '50',
        'style' => 'width:50%',
        'value' => set_value('id_estacion') // con esto al procesar el formulario de forma incorrecta quedará guardado el dato que le habíamos puesto
    );
 
//el segundo array(campo email)
 
    $lluvia = array(
        'name' => 'lluvia',
        'id' => 'lluvia',
        'size' => '50',
        'style' => 'width:50%',
        'id' => 'lluvia',
        'value' => set_value('lluvia')
    );
 
//el tercero...(campo asunto)
    $vel_viento = array(
        'name' => 'vel_viento',
        'id' => 'vel_viento',
        'size' => '50',
        'style' => 'width:50%',
        'id' => 'vel_viento',
        'value' => set_value('vel_viento')
    );
 
//el cuarto...(campo mensaje)
    $dir_viento = array(
        'name' => 'dir_viento',
        'id' => 'dir_viento',
        'size' => '50',
        'style' => 'width:50%',
        'id' => 'dir_viento',
        'value' => set_value('dir_viento')
    );
 
//el botón submit de nuestro formulario

        $temper = array(
        'name' => 'temper',
        'id' => 'temper',
        'size' => '50',
        'style' => 'width:50%',
        'id' => 'temper',
        'value' => set_value('temper')
    );

            $pres_atm = array(
        'name' => 'pres_atm',
        'id' => 'pres_atm',
        'size' => '50',
        'style' => 'width:50%',
        'id' => 'pres_atm',
        'value' => set_value('pres_atm')
    );

                $fecha = array(
        'name' => 'fecha',
        'id' => 'fecha',
        'size' => '50',
        'style' => 'width:50%',
        'id' => 'fecha',
        'value' => set_value('fecha')
    );

      $luz = array(
        'name' => 'luz',
        'id' => 'luz',
        'size' => '50',
        'style' => 'width:50%',
        'id' => 'luz',
        'value' => set_value('luz')
    );

            $humed = array(
        'name' => 'humed',
        'id' => 'humed',
        'size' => '50',
        'style' => 'width:50%',
        'id' => 'humed',
        'value' => set_value('humed')
    );
      
    $submit = array(
        'name' => 'submit',
        'id' => 'submit',
        'value' => 'Enviar comentario',
        'title' => 'Enviar comentario'
    );
    ?>
<?php
echo form_fieldset('Nuevo comentario');
?>
            <table>
                <tr>
                    <td>
                        <?php echo form_label('Nombre: '); ?>
                    </td>
                    <td>
                        <?php echo form_input($nombre); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_label('Email: '); ?>
                    </td>
                    <td>
                        <?php echo form_input($email); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_label('Asunto: '); ?>
                    </td>
                    <td>
                        <?php echo form_input($asunto); ?>
                    </td>
                </tr>
                 <tr>
                    <td>
                        <?php echo form_label('Comentario: '); ?>
                    </td>
                    <td>
                        <?php echo form_textarea($mensaje); ?>
                    </td>
                </tr>
                <tr>
                    <td>
 
                    </td>
                    <td>
<!--con la funcion validation_errors ci nos muestra los errores al pulsar el botón submit, la podemos colocar donde queramos-->
                  <font color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline"><?php echo validation_errors(); ?></font>
                    </td>
                </tr>
                <tr>
                    <td>
 
                    </td>
                    <td>
                        <?php echo form_submit($submit);
                        //nuestro boton submit
                        ?>
                    </td>
                </tr>
                <?php
                echo form_close();
                ?>
        </table>
        <?php
               echo form_fieldset_close();
       ?>
</body>
</html>