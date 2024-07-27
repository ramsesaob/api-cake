<?php
require_once 'vendor/autoload.php';

use thiagoalessio\TesseractOCR\TesseractOCR;


function CalculaDigitoCedula($c)
{
    $l = strtoupper(substr($c, 0, 1));
    $n = strlen(substr($c, 1)) == 8 ? substr($c, 1) : '0' . substr($c, 1);
    $val = $l . $n . '1';
    $digitos = str_split($val);
    $digitos[8] *= 2;
    $digitos[7] *= 3;
    $digitos[6] *= 4;
    $digitos[5] *= 5;
    $digitos[4] *= 6;
    $digitos[3] *= 7;
    $digitos[2] *= 2;
    $digitos[1] *= 3;
    $digitoEspecial = ($digitos[0] == 'V') ? 1 : (($digitos[0] == 'E') ? 2 : null);
    $suma = (array_sum($digitos) - $digitos[9]) + ($digitoEspecial * 4);
    $residuo = $suma % 11;
    $resta = 11 - $residuo;
    $digitoVerificador = ($resta >= 10) ? 0 : $resta;
    return $l . $n . $digitoVerificador;
}
//Este Funcion recorre un arreglo y decodifica las entidades HTML en los valores de los elementos del arreglo. 
//Si un elemento es otro arreglo, llama a la función convertArrayToUTF8() 
//para decodificar las entidades HTML en ese arreglo también
function convertArrayToUTF8($array)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $array[$key] = convertArrayToUTF8($value);
        } else {
            $array[$key] = html_entity_decode($value, ENT_QUOTES, 'UTF-8');
        }
    }
    return $array;
}

//Funcion donde armo todo
function GetRif($doc)
{
    ### MEDIANTE CURL OBTENGO LA IMAGEN CAPTCHA ###
    /* -------------------------------------------*/
    //Obtengo todos los archivos en el directorio
    $files = glob('tmp/*'); //y los guardo en la variable $files
    foreach ($files as $file) if (is_file($file)) unlink($file); //Recorro cada archivo y los borro
    //Defino una URL para un archivo de imagen CAPTCHA y la guardo en la variable
    $url_captcha = 'http://contribuyente.seniat.gob.ve/BuscaRif/Captcha.jpg';
    //Genero un identificador de archivo aleatorio de 8 caracteres y lo guardo en la variable
    $idFile = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
    //Inicializo una sesión cURL con la URL del CAPTCHA 
    $Conexion = curl_init($url_captcha); //lo guardo en la variable
    //Creo un nuevo archivo en el directorio
    //Con el nombre de archivo generado previamente y abro el archivo en modo de escritura binaria usando fopen
    $Archivo = fopen('tmp/' . $idFile . '.jpg', 'wb');
    //Establece el destino del archivo de salida de la sesión cURL utilizando
    //Las cookies que se guardarán en un archivo en el directorio
    //con el mismo identificador de archivo que el archivo de imagen CAPTCHA.
    curl_setopt($Conexion, CURLOPT_FILE, $Archivo);
    curl_setopt($Conexion, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/tmp/' . $idFile . '.txt');
    //Ejecuto la sesión cURL para descargar la imagen CAPTCHA en el archivo creado 
    curl_exec($Conexion);
    curl_close($Conexion);
    fclose($Archivo); //Cierra la sesión cURL y el puntero al archivo.


    ### HAGO USO DE IMAGICK PARA MEJORAR LA IMAGEN Y TRATAR DE ELIMINAR LA LINEA HORIZONTAL ###
    /* --------------------------------------------------------------------------------------*/
    $ruta = dirname(__FILE__) . '/tmp/'; //Establezco la ruta para guardar la imagen de IMAGICK
    //Creo un objeto Imagick a partir de una imagen JPEG.
    $image = new Imagick($ruta . $idFile . '.jpg'); //Que es la que justo acabo de descargar con curl
    //Obtengo las dimensiones de la imagen que se va a manipular y las guardo en la variable $dimensions
    $dimensions = $image->getImageGeometry();
    //Guardo el ancho de la imagen en la variable $width
    $width = $dimensions['width'];
    //Guardo la altura de la imagen en la variable $height
    $height = $dimensions['height'];
    //Creo un nuevo objeto Imagick llamado $canvas, que se utilizará para crear una nueva imagen
    $canvas = new Imagick();
    //Creo una nueva imagen en blanco con un tamaño de 1.8 veces el tamaño original de la imagen y sin fondo
    $canvas->newImage($width * 1.8, $height * 1.8, 'none');
    //Calculo la posición horizontal en la que se colocará la imagen original en el centro de la nueva imagen
    $x = ($width * 2 - $width) / 2;
    //Calculo la posición vertical en la que se colocará la imagen original en el centro de la nueva imagen
    $y = ($height * 2 - $height) / 2;
    //Coloco la imagen original en el centro de la nueva imagen
    $canvas->compositeImage($image, Imagick::COMPOSITE_OVER, $x, $y);
    //Guardo la nueva imagen centrada en el disco duro con el nombre “centrada.jpg”
    $canvas->writeImage($ruta . 'centrada.jpg');
    //libero y destruyo todos los recursos utilizados por el objeto Imagick
    $canvas->clear();
    $canvas->destroy();
    $image->clear();
    $image->destroy();
    //Creo un nuevo objeto Imagick a partir de la imagen JPEG “centrada.jpg”
    $image = new Imagick($ruta . 'centrada.jpg');
    //Obtengo el ancho de la imagen.
    $width = $image->getImageWidth();
    //Obtengo la altura de la imagen.
    $height = $image->getImageHeight();
    //Calculo el nuevo ancho de la imagen multiplicando el ancho original por 2.1.
    $newWidth = $width * 2.1;
    //Calculo la nueva altura de la imagen multiplicando la altura original por 2.2.
    $newHeight = $height * 2.2;
    //Cambio el tamaño de la imagen utilizando el filtro Lanczos y un factor de escala de 2.
    $image->resizeImage($newWidth, $newHeight, Imagick::FILTER_LANCZOS, 2);
    //Cambio el tamaño de la imagen utilizando el filtro cuadrático y un factor de escala de 2.
    $image->resizeImage($newWidth, $newHeight, Imagick::FILTER_QUADRATIC, 2);
    //Normalizo los valores de píxeles de la imagen.
    $image->normalizeImage();
    //Aplico una máscara desenfocada a la imagen para mejorar su nitidez.
    $image->unsharpMaskImage(0, 0.3, 1, 0.05);
    //Establezco el formato de la imagen en JPEG.
    $image->setImageFormat("jpg");
    //Establezco la calidad de compresión JPEG en 95.
    $image->setCompressionQuality(95);
    //Convierto la imagen a escala de grises.
    $image->transformImageColorspace(Imagick::COLORSPACE_GRAY);
    //Ajusto el contraste de la imagen.
    $image->contrastImage(0);
    //Aplico un efecto borroso a la imagen.
    $image->blurImage(3, 1.5);
    //Calculo un umbral para convertir la imagen en una imagen binaria.
    $threshold = 0.5 * $image->getQuantumRange()['quantumRangeLong'];
    //Convierto la imagen en una imagen binaria utilizando el umbral calculado anteriormente.
    $image->thresholdImage($threshold);
    //Aplico un efecto borroso adaptativo a la imagen.
    $image->adaptiveBlurImage(2, 1);
    //Aumento la nitidez de los bordes en la imagen.
    $image->sharpenImage(50, 50);
    //Cambio el tamaño de la imagen a 240 píxeles de ancho y 75 píxeles de alto.
    $image->scaleImage(400, 100);
    //Reduzco el número de colores en la imagen a 8.
    $image->posterizeImage(8, false);
    //Guardo la imagen procesada en la $ruta como “lee.jpg”.
    $image->writeImage($ruta . 'lee.jpg');
    //Limpio los recursos utilizados por el objeto Imagick.
    $image->clear();
    //Destruyo el objeto Imagick.
    $image->destroy();


    ### HAGO USO DE TESSERACT-OCR PARA LEER LA IMAGEN  ###
    /* -------------------------------------------------*/
    //Creo un objeto TesseractOCR a partir de la imagen procesada “lee.jpg”.
    $ocr = new TesseractOCR($ruta . 'lee.jpg');
    //Ejecuto el OCR en la imagen y guardo el resultado en la variable $text
    $text = $ocr->run();
    //Elimino todos los caracteres que no sean letras o números de la variable $text.
    $text = preg_replace('/[^a-zA-Z0-9]/', '', $text);
    if (strlen($text) > 6) { //Verifico si la longitud de la variable $text es mayor que 6.
        $text = substr($text, 1);
        //Si la longitud de la variable $text es mayor que 6, elimino el primer carácter de la variable $text. Porque el codigo debe ser de 6 digitos        
    }
    $codigo = $text; //Obtengo el codigo captcha


    ### POR MEDIO DE CURL SIMULO EL FORMULARIO DEL SENIAT  ###
    /* -----------------------------------------------------*/
    //Verifico si la variable $doc comienza con las letras J, G o P y si es así, asigno el valor de $doc a la variable $documento. 
    //De lo contrario, llamo a la función CalculaDigitoCedula() y asigno el resultado a la variable $documento.
    if (preg_match('/^[JGP]/i', $doc)) $documento = $doc;
    else $documento = CalculaDigitoCedula($doc);
    //Asigno la URL de la página web del SENIAT a la variable $url_solicitud.
    $url_solicitud = 'http://contribuyente.seniat.gob.ve/BuscaRif/BuscaRif.jsp';
    //Inicializo una sesión cURL con la URL de la página web del SENIAT.
    $curl = curl_init($url_solicitud);
    //Establezco la opción de cURL para enviar una solicitud POST.
    curl_setopt($curl, CURLOPT_POST, 1);
    //Establezco los datos que se van a enviar en la solicitud POST utilizando la función http_build_query()
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
        'codigo' => $codigo,
        'p_rif' => $documento
    )));
    //Establezco la opción de cURL para devolver el resultado de la solicitud como una cadena.
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //Establezco la opción de cURL para utilizar un archivo de cookies específico.
    //Que justamente fue el que cree en el primer cURL
    curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/tmp/' . $idFile . '.txt');
    //Ejecuto la solicitud cURL y guardo el resultado en la variable $res
    $res = curl_exec($curl);
    //Cierro la sesión cURL.
    curl_close($curl);


    ### OBTENIDO EL CURL CREO UNA SERIE DE CODIGOS PARA EXTRAER LA INFORMACION  ###
    /* --------------------------------------------------------------------------*/
    //Creo un objeto DOMDocument
    $dom = new DOMDocument();
    //Cargo el resultado de la solicitud cURL en el objeto DOMDocument
    @$dom->loadHTML($res);
    //Obtengo todas las tablas del objeto DOMDocument
    $tables = $dom->getElementsByTagName('table');
    //Obtengo la segunda tabla del objeto DOMDocument y la asigno a la variable $table2
    $table2 = $tables->item(1);
    //Obtengo la tercera tabla del objeto DOMDocument y la asigno a la variable $table3
    $table3 = $tables->item(2);
    //Obtego todas las filas de la segunda tabla y las asigno a la variable $rows
    $rows = $table2->getElementsByTagName('tr');
    foreach ($rows as $row) { //Inicio un bucle foreach para cada fila de la segunda tabla
        $cells = $row->getElementsByTagName('td'); //Obtengo todas las celdas de la fila actual y las asigno a la variable $cells
        foreach ($cells as $cell) { //Inicio un bucle foreach para cada celda de la fila actual
            $head = $cell->nodeValue; //Asigno el valor de texto de la celda actual a la variable $head
        }
    }
    //Convierto los caracteres especiales en entidades HTML
    $head = htmlentities($head, ENT_SUBSTITUTE, 'utf-8');
    //Reemplazo la entidad &nbsp; y guiones bajos con espacios vacios
    $head = str_replace(array('&nbsp;', '_'), ' ', $head);
    $head = explode(" ", $head); //Divido la cadena $head en un arreglo utilizando los espacios como separadores
    $head = array_map('trim', $head); //Elimino los espacios en blanco al principio y al final de cada elemento del arreglo
    $head = array_filter($head); //Elimino los elementos vacíos del arreglo
    $head = array_values($head); //Reindexo el arreglo para que los índices sean consecutivos 
    $rif = $head[0]; //Asigno el primer elemento del arreglo a la variable $rif
    //Combino todos los elementos del arreglo, excepto el primero, en una sola cadena separada por espacios y la asigno a la variable $nombre
    $nombre = implode(" ", array_slice($head, 1));
    //Creo un nuevo arreglo asociativo con las claves “rif” y “nombre” y los valores correspondientes
    $head = array("rif" => $rif, "nombre" => $nombre);
    $rows = $table3->getElementsByTagName('tr'); //Obtengo todas las filas de la tercera tabla y las asigno a la variable $rows
    foreach ($rows as $row) { //Inicio un bucle foreach para cada fila de la tercera tabla
        $cells = $row->getElementsByTagName('td'); //Obtengo todas las celdas de la fila actual y las asigno a la variable $cells
        foreach ($cells as $cell) { //Inicio un bucle foreach para cada celda de la fila actual
            $info = $cell->nodeValue; //Asigno el valor de texto de la celda actual a la variable $info
        }
    }
    //Hago comparaciones usando expersiones regulares para extraer los datos necesarios
    if (preg_match('/Actividad Económica:\s*(.*)\s*Condición/', $info, $m)) $actividad_economica = $m[1];
    else $actividad_economica = '';
    if (preg_match('/Condición:\s*(.*)\s*y Agente de Retención del IVA/', $info, $c)) $condicion = $c[1];
    else $condicion = '';
    if ($condicion == '') if (preg_match('/Condición:\s*(.*)\s*La condición/', $info, $c)) $condicion = $c[1];
    else $condicion = '';
    $busco = 'La condición de este contribuyente';
    $pos = strpos($info, $busco);
    if ($pos !== false) $agente_retencion = substr($info, $pos + strlen($busco));
    else $agente_retencion = '';
    //Creo el array Info
    $info = array(
        'actividad_economica' => $actividad_economica,
        'condicion' => $condicion,
        'agente_retencion' => trim($agente_retencion),
    );
    //Combino los dos arreglos en uno solo
    $salida = array_merge(
        array('head' => $head),
        array('info' => $info)
    );
    $salida = convertArrayToUTF8($salida); //Limpio las entidades HTML
    //Creo un arreglo asociativo con los caracteres acentuados y sus correspondientes caracteres sin acento
    $acentos = array(
        'á' => 'a',
        'é' => 'e',
        'í' => 'i',
        'ó' => 'o',
        'ú' => 'u',
        'Á' => 'A',
        'É' => 'E',
        'Í' => 'I',
        'Ó' => 'O',
        'Ú' => 'U'
    );
    //Aplico una función anónima a cada elemento del arreglo $salida utilizando la función array_map()
    $out = array_map(function ($value) use ($acentos) {
        if (is_array($value)) { //Verifico si el valor actual es un arreglo
            //Si el valor actual es un arreglo, aplico otra función anónima a cada elemento del arreglo utilizando la función array_map()
            return array_map(function ($val) use ($acentos) {
                //Reemplazo los caracteres acentuados en el valor actual con sus correspondientes caracteres sin acento utilizando 
                //la función strtr() y devuelvo el resultado
                return strtr($val, $acentos);
            }, $value); //Cierro la función array_map() y aplico la misma al valor actual del arreglo
        } else { //Si el valor actual no es un arreglo
            //Reemplazo los caracteres acentuados en el valor actual con sus correspondientes caracteres sin acento 
            //utilizando la función strtr() y devuelvo el resultado
            return strtr($value, $acentos);
        }
    }, $salida); //Cierro la función array_map() y aplico la misma al arreglo $salida

    return $out; //Devuelvo en un array asociativo 
} //Fin de la funcion

// Esta función valida un documento de identificación (RIF o cédula) y devuelve un resultado en formato JSON
function validar_doc($doc)
{
    // Elimino los espacios en blanco del documento
    $doc = str_replace(' ', '', $doc);
    // Si el documento no está vacío, continúa con la validación
    if (!empty($doc)) {
        // Elimino cualquier carácter que no sea una letra o un número
        $doc = preg_replace('/[^a-zA-Z0-9]/', '', $doc);
        // Convierto el documento a mayúsculas
        $doc = strtoupper($doc);
        // Obtiengo la primera letra del documento
        $l = substr($doc, 0, 1);
        // Si el documento comienza con J, G, P, V o E, continúo con la validación
        if (preg_match('/^[JGPVE]/', $doc)) {
            // Si la primera letra es V o E, valido una cédula
            if (strpbrk($l, 'VE') !== false) {
                if (preg_match('/^[VE][0-9]{7,8}$/', $doc)) {
                    return json_encode(['res' => 'ok', 'data' => 'ok']);
                }
                return json_encode(['res' => 'error', 'data' => 'La cedula debe contener 7 u 8 digitos numericos']);
                // Si la primera letra es J, G o P, valido un RIF
            } else {
                if (preg_match('/^[JGP][0-9]{9}$/', $doc)) {
                    return json_encode(['res' => 'ok', 'data' => 'ok']);
                }
                return json_encode(['res' => 'error', 'data' => 'El rif debe contener 9 digitos numericos']);
            }
        }
        return json_encode(['res' => 'error', 'data' => 'Formato no valido, la primera letra debe ser J, G, P, V o E']);
    }
    return json_encode(['res' => 'error', 'data' => 'Debe ingresar el documento a consultar']);
}

$doc = null;
// Verifico si se ha enviado una solicitud GET o POST
if (isset($_GET) || isset($_POST)) {
    // Si se ha enviado una solicitud GET, recorro los parámetros y establezco el valor de "doc" en el último valor encontrado
    if (isset($_GET)) {
        foreach ($_GET as $key => $val) {
            $doc = $val;
        }
    }
    // Si se ha enviado una solicitud POST, recorro los parámetros y establezco el valor de "doc" en el último valor encontrado
    if (isset($_POST)) {
        foreach ($_POST as $key => $val) {
            $doc = $val;
        }
    }
}

$validar = json_decode(validar_doc($doc));
if ($validar->res==='ok') {

    set_time_limit(600); //Damos tiempo a php no se cuelgue, ya que OCR aveces no lee con exactitud y debo hacer un bucle infinito hasta lograrlo

    for ($i = 0;; $i++) { //Inicio un bucle for que se ejecutará indefinidamente
        $out = GetRif($doc); // Llamo a la función GetRif() y asigno el resultado a la variable $out
        //Verifico si el valor de la clave “nombre” del elemento “head” del arreglo $out es diferente de “codigo no coincide con la imagen.”
        if ($out['head']['nombre'] != 'codigo no coincide con la imagen.')
            break; //Si el valor es diferente, sale del bucle
    }
    $siglas = '';
    $cedula = '';
    //Verifico si la cadena “VENCIDO” está presente en el valor de la clave “nombre” del elemento “head” del arreglo $out
    if (strpos($out['head']['nombre'], 'VENCIDO') !== false) {
        $a = explode(" ", $out['head']['nombre']); //Divido la cadena en palabras utilizando el espacio como separador y asigno el resultado a la variable $a
        $b = array_slice($a, 2); //Obtengo un subconjunto del arreglo $a que comienza en el tercer elemento y lo asigno a la variable $b
        $c = implode(' ', $b); //Uno los elementos del arreglo $b en una cadena separada por espacios y lo asigno a la variable $c
        //Busco la primera palabra que no contenga paréntesis en la cadena $c utilizando una expresión regular y asigno el resultado a la variable $match
        preg_match('/\b[^()]+\b/', $c, $match);
        $nombre = $match[0]; //Asigno el valor de la primera palabra encontrada en el paso anterior a la variable $nombre
        if (strpos($c, '(') !== false) { //Verifico si la cadena $c contiene un paréntesis abierto
            //Busco el contenido entre paréntesis en la cadena $c utilizando una expresión regular y asigno el resultado a la variable $match
            preg_match('/\([^()]+\)/', $c, $match);
            $siglas = $match[0]; //Asigno el valor encontrado en el paso anterior a la variable $siglas
        }
        //Verifico si el segundo elemento del arreglo $a comienza con “V” o “E”. 
        //Si es así, asigno todos los caracteres excepto el último a la variable $cedula
        if (preg_match('/^[VE]/', $a[1])) $cedula = substr($a[1], 0, -1);
        $rif = $a[1]; //Asigno el segundo elemento del arreglo $a a la variable $rif
        //Creo un nuevo arreglo asociativo con los datos obtenidos
        $data = array(
            'nombre' => $nombre,
            'siglas' => $siglas,
            'rif' => $rif,
            'cedula' => $cedula,
            'actividad_economica' => strtoupper($out['info']['actividad_economica']),
            'condicion' => strtoupper($out['info']['condicion']),
            'retencion' => strtoupper($out['info']['agente_retencion'])
        );
    } else { //De no estar la cadena “VENCIDO” presente
        //Busco la primera palabra que no contenga paréntesis en el valor de la clave “nombre” del elemento “head” 
        //del arreglo $out utilizando una expresión regular y asigno el resultado a la variable $match
        preg_match('/\b[^()]+\b/', $out['head']['nombre'], $match);
        $nombre = $match[0]; //Asigno el valor de la primera palabra encontrada en el paso anterior a la variable $nombre
        //Verifico si la cadena “nombre” del elemento “head” del arreglo $out contiene un paréntesis abierto
        if (strpos($out['head']['nombre'], '(') !== false) {
            //Busco el contenido entre paréntesis en la cadena “nombre” del elemento “head” del arreglo $out 
            //utilizando una expresión regular y asigno el resultado a la variable $match
            preg_match('/\([^()]+\)/', $out['head']['nombre'], $match);
            $siglas = $match[0]; //Asigno el valor encontrado en el paso anterior a la variable $siglas
        }
        $rif = $out['head']['rif']; //Asigno el valor de la clave “rif” del elemento “head” del arreglo $out a la variable $rif
        //Verifico si el valor de la variable $rif comienza con “V” o “E”. Si es así, 
        //asigno todos los caracteres excepto el último a la variable $cedula
        if (preg_match('/^[VE]/', $rif)) $cedula = substr($rif, 0, -1);
        //Creo un nuevo arreglo asociativo con los datos obtenidos
        $data = array(
            'nombre' => $nombre,
            'siglas' => $siglas,
            'rif' => $rif,
            'cedula' => $cedula,
            'actividad_economica' => strtoupper($out['info']['actividad_economica']),
            'condicion' => strtoupper($out['info']['condicion']),
            'retencion' => strtoupper($out['info']['agente_retencion'])
        );
    }
    //Codifico el arreglo $data en formato JSON y lo imprimo en pantalla
    echo json_encode(array(
        'res' => 'ok',
        'data' => $data
    ), true);
} else {
    echo json_encode($validar, true);
}
