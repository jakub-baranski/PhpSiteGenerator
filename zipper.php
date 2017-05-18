<?php
class Utils {

    public static function listDirectory($dir) {
        $result = array();
        $root = scandir($dir);
        foreach ($root as $value) {
            if ($value === '.' || $value === '..') {
                continue;
            }
            if (is_file("$dir$value")) {
                $result[] = "$dir$value";
                continue;
            }
            if (is_dir("$dir$value")) {
                $result[] = "$dir$value/";
            }
            foreach (self::listDirectory("$dir$value/") as $value) {
                $result[] = $value;
            }
        }
        return $result;
    }

}

$source_dir = "generated/";
$zip_file = "generated/page.zip";
$file_list = Utils::listDirectory($source_dir);

$zip = new ZipArchive();
if ($zip->open($zip_file, ZipArchive::CREATE) === true) {
    foreach ($file_list as $file) {
        if ($file !== $zip_file) {
            $zip->addFile($file, substr($file, strlen($source_dir)));
        }
    }
    $zip->close();
} 
