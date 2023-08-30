<?php

namespace Jemer\StringHelper;

class PathHelper
{
    /**
     * Returns the containing directory from a file's path
     *  returns string
     */
    public static function ContainingDirectory(string $path)
    {
        $info = pathinfo($path);
        return $info['dirname'];
    }
    /**
     * Returns the file name + extension.
     *  returns string 
     */
    public static function FileName(string $path)
    {
        $info = pathinfo($path);
        return $info['basename'];
    }    
    /**
     * Returns the extension
     *  returns string
     */
    public static function Extension(string $path)
    {
        $info = pathinfo($path);
        return $info['extension'];
    }      
    /**
     * Returns file name with out its extension
     * returns string
     */
    public static function FileNamewithoutExtension(string $path)
    {
        $info = pathinfo($path);
        return $info['filename'];
    }    
    /**
     * Generates a path from an array
     *  returns string
     */
    public static function GeneratePath(array $arr) : string
    {
        $cache = "";

        foreach ($arr as $key) 
        {
            $cache .= $key . DIRECTORY_SEPARATOR;
        }

        return rtrim($cache, DIRECTORY_SEPARATOR);
    } 
    /**
     * Get all of the files inside of a parent directory. Excludes the ".", ".."
     *  returns array
     */    
    public static function GetFiles(string $path) : array
    {
        $fileArr = [];

        foreach (array_diff(scandir($path), array('.', '..')) as $file) 
        {
            if(is_file($file) && !is_dir($file))
            {
                $fileArr[] = $file;
            }
        }

        return $fileArr;
    } 
    /**
     * Get all of the directories inside of a parent directory. Excludes the ".", ".."
     *  returns array
     */
    public static function GetDirectories(string $path) : array
    {
        $fileArr = [];

        foreach (array_diff(scandir($path), array('.', '..')) as $file) 
        {
            if(!is_file($file) && is_dir($file))
            {
                $fileArr[] = $file;
            }
        }

        return $fileArr;
    } 
}

?>