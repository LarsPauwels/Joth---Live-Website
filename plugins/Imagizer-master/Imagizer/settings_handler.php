<?php

if (isset($_POST['imagizer-save-settings'])){
    
    $config->min->height=(int)(isset($_POST['min']['height'])?$_POST['min']['height']:$config->min->height);
    $config->min->width=(int)(isset($_POST['min']['width'])?$_POST['min']['width']:$config->min->width);
    $config->max->height=(int)(isset($_POST['max']['height'])?$_POST['max']['height']:$config->max->height);
    $config->max->width=(int)(isset($_POST['max']['width'])?$_POST['max']['width']:$config->max->width);
    $config->exact->height=(int)(isset($_POST['exact']['height'])?$_POST['exact']['height']:$config->exact->height);
    $config->exact->width=(int)(isset($_POST['exact']['width'])?$_POST['exact']['width']:$config->exact->width);
    
    $config->size=$_POST['size']=='var'?'var':'exact';
    $config->priority=$_POST['priority']=='min'?'min':'max';
    
    if ($config->min->height>$config->max->height){ swap($config->min->height,$config->max->height); }
    if ($config->min->width>$config->max->width){ swap($config->min->width,$config->max->width); }

    $config->convert_to_jpeg = (int)isset($_POST['convert-to-jpeg']);
    $config->watermark = (int)isset($_POST['place-watermark']);
    $config->compress=(int)isset($_POST['compress']);
    $config->compress_level=isset($_POST['compress-level']) ? (int)$_POST['compress-level'] : $config->compress_level;

    $config->exclude = isset($_POST['exclude']) ? trim($_POST['exclude'],'/\\') : '';
}


function swap(&$a,&$b){
    $c=$a;
    $a=$b;
    $b=$c;
}


?>