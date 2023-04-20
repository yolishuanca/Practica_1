<?php
echo "<b>Instituto Tecnologico Escuela Industrial Superior</b><br>";
echo "<b>Pedro Domingo murillo</b><br>";
echo "<b>Sub sede - tajani</b><br>";
echo "<b>Informatica - Industrial</b><br>";
echo "<b>Docente:</b> Erik Huallpa Aruquipa<br>";
echo "<b>Estudiante:</b> Yola Huanca Noa<br>";
echo "<b>PRACTICA # 1 </b><br>";
echo "-------------------------------------------------------------<br>";
echo "<h1>Ejercicio - 7</h1>";
echo "Implentar una aplicacion web con PHP que permita generar un informe de notas.<br>";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:,">
    <title>Ejemplo Completo</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <?php
    //Definion de los arreglos
    $alumnos = getAlumnos();
    $promedios = getpromedios();
?>
<header>
    <h1 id="centrado">INFORME DE NOTAS</h1>
    <img src="imagen_1.jpg" width="700" height="200" />
</header>
<section>
    <form action="ejercicio_7.php" method="POST">
        <table border="0" width="700" cellspacing="0" cellpadding="5">
            <tr>
                <th width="10">N° Orden</th>
                <th>Alumnos</th>
                <th>Promedio</th>
</tr>
<?php
//Imprimir
for  ($i = 0; $i < getTotal(); $i++) {
?>
    <tr>
        <td id="centrado"><?php echo $i+1; ?></td>
        <td><?php echo $alumnos [$i]; ?></td>
        <td id="centrado"><?php echo $promedios[$i]; ?></td>
</tr>
<?php } ?>
<tr>
    <td colspan="3"><input type="submit" value="MOSTRAR RESUMEN" 
name="btnMostrar"></td>
                </tr>
         </table>
</form>
<?php
//Total de aprobados y desaprobados
list($tAprobados, $tDesaprobados) = totalAprobados_Desaprobados();
//Condicionar la muestra de los resultados
if (isset($_POST["btnMostrar"])) {
    ?>
       <table border="1" width="700" cellspacing="0" cellpadding="5">
           <tr>
        <th>Total de alumnos</th>
        <th>Total de aprobados</th>
        <th>Total de desaprobados</th>
</tr>
<tr>
    <td id="centrado"><?php echo getTotal(); ?></td>
    <td id="centrado"><?php echo $tAprobados; ?></td>
    <td id="centrado"><?php echo $tDesaprobados; ?></td>
</tr>
</table>
<?php
//Obtener el mayor y menor elemento
list($maximo, $minimo) = valor_maximo_minimo();
//Obtener el indice del mayor y menor elemento
list($maIndice, $miIndice) = indice_maximo_minimo();
?>
<br />
<table border="1" width"700" cellspacing="0" cellpadding="5">
    <tr>
        <th>Alumno con mayor promedio</th>
        <th>Alumno con menor promedio</th>
</tr>
<tr>
    <td id="centrado"><?php echo getAlumnos()[$maIndice].'('.$maximo.')'; ?></td>
    <td id="centrado"><?php echo getAlumnos()[$miIndice].'('.$minimo.')'; ?></td>   
</tr>
</table>
<?php } ?>
</section>
<footer>
    <h3 id="centrado">Todos los derechos reservados - by Erik huallpa</h3>
</footer>
</body>

</html>

<?php
//Funciones de implemetacion para el arreglo indexado de alumnos
function getAlumnos()
{
    return array(
        'Luz lazaro', 'Angela Torres',
        'Fernanda lazaro', 'Manuel Torres',
        'Lucero mendoza', 'Alejandra menor',
        'Victoria Bautista', 'Francisco Malaver'
    );
}

//Funciones de implementacion para el arreglo de notas
function getPromedios()
{
    return array(17, 18, 20, 19, 14, 16, 12, 11);
}

//Funciones que determina el total de alumnos
function getTotal()
{
    return count(getAlumnos());
}

//Funciones que determina el total de aprobados y desaprobados
function totalAprobados_Desaprobados()
{
    $tAprobados = 0;
    $tDesaprobados = 0;
    for ($i = 0; $i < getTotal(); $i++) {
        if (getPromedios()[$i] < 13)
            $tDesaprobados++;
        else
           $tAprobados++;
    }
    return array($tAprobados, $tDesaprobados);

}

// Determinar el maximo y nemor promedio
function valor_maximo_minimo()
{
    $maximo = max(getPromedios());
    $minimo = min(getPromedios());
    return array($maximo, $minimo);

}

//Determinar el indice del mayor y menor promedio
function indice_maximo_minimo()
{
    list($maximo, $minimo) = valor_maximo_minimo();
    $maIndice = array_search($maximo, getPromedios());
    $miIndice = array_search($minimo, getPromedios());
    return array($maIndice, $miIndice);
}
?>
