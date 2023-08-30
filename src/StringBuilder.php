<?php 
namespace Jemer\StringHelper;

class StringBuilder
{
    private $strArr = [];

    /**
     * Add a new string to the string builder
     */
    public function Add(string $str)
    {
        $this->strArr[] = $str;
    }
    /**
     * Adds a line with an indent. $indents = 1 is the same a space. $indents = 5 is a tab
     */
    public function Add_Indented(string $str, int $indents)
    {
        $cache = "";

        for ($i=0; $i < $indents; $i++) { 
            $cache .= "\t";
        }
        $cache .= $str;
        $this->Add($cache);
    }
    /**
     * Adds a new line then your text then another new line
     */
    public function AddNewLineText($str)
    {
        $this->strArr[] = $this->NewLine();
        $this->strArr[] = $str;
        $this->strArr[] = $this->NewLine();

    }
    /**
     * Adds dashed line
     */
    public function AddHorizontalLine(int $width)
    {
        $cache = "";

        for ($i=0; $i < $width; $i++) 
        { 
            $cache .= "-";
        }
        $this->AddNewLineText($cache);
    }
    /**
     * Adds text to the string builder followed by a new line
     */
    public function NewLine()
    {
        $this->strArr[] = PHP_EOL;
    }
    /**
     * Adds text but as a comment "//this is a comment"
     */
    public function AddComment(string $str)
    {
        $this->AddNewLineText('//'.$str);
    }
    /**
     * var_dumps the containing array
     */
    public function Dump()
    {
        var_dump($this->strArr);
    }
    /**
     * Converts to a string
     */
    public function ToString() : string
    {
        $str = "";

        foreach ($this->strArr as $key) 
        {
            $str .= $key;
        }

        return $str;
    }
    /**
     * clears the containing array
     */
    public function Clear()
    {
        $this->strArr = [];
    }    
}

?>