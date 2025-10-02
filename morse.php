<html>
<body>
<h2>Carattere a Morse</h2>
<form action="morse.php" method="get">
    Inserisci stringa: <input type="text" name="caratteri">
    <button type="submit">Genera</button>
</form>
<h2>Morse a carattere</h2>
<form action="morse.php" method="get">
    Inserisci morse: <input type="text" name="morse">
    <button type="submit">Genera</button>
</form>
</body>
</html>

<?php
    $parole= array('a'=>'._', 'b'=>'_...', 'c'=>'_._.', 'd'=>'_..', 'e'=>'.', 'f'=>'.._.', 'g'=>'__.', 'h'=>'....', 'i'=>'..', 'j'=>'.___', 'k'=>'_._', 'l'=>'._..', 'm'=>'__', 'n'=>'_.', 'o'=>'___', 'p'=>'.__.', 'q'=>'__._', 'r'=>'._.', 's'=>'...', 't'=>'_', 'u'=>'.._', 'v'=>'.._', 'w'=>'.___', 'x'=>'_.._', 'y'=>'_._', 'z'=>'__..');
    $morse = array(
    '._'=>'a',   '_...'=>'b', '_._.'=>'c', '_..'=>'d',  '.'=>'e',   '.._.'=>'f',
    '__.'=>'g',  '....'=>'h', '..'=>'i',   '.___'=>'j', '_._'=>'k', '._..'=>'l',
    '__'=>'m',   '_.'=>'n',   '___'=>'o',  '.__.'=>'p', '__._'=>'q','._.'=>'r',
    '...'=>'s',  '_'=>'t',    '.._'=>'u',  '..._'=>'v', '.__'=>'w', '_.._'=>'x',
    '_.__'=>'y', '__..'=>'z');
    
    if(isset($_GET['caratteri'])){
    $input = strtolower($_GET['caratteri']);
    $res = '';
    for($i=0; $i<strlen($input); $i++){
        $c = $input[$i];
        if($c == ' '){
            $res .= '/ ';
        } else {
            $res .= $parole[$c] . ' ';
        }
    }

    echo $res;
}

if(isset($_GET['morse'])){
    $input = $_GET['morse'];
    $p = explode(' / ', $input);
    $res = '';
    for($w=0; $w<count($p); $w++){
        $letters = explode(' ', $p[$w]);
        for($l=0; $l<count($letters); $l++){
            $res .= $morse[$letters[$l]];
        }
        if($w < count($p)-1) $res .= ' ';
    }
    echo $res;
}

?>


