<?php

/**
 * 依照第一個輸入的為準，比較第二個輸入的位置。
 *
 * Class diffDir
 */

class diffDir
{
    public $path1;
    public $path2;

    public $pathDir1 = array();
    public $pathDir2 = array();

    public function __construct($argv)
    {
        $this->path1 = $argv[1];
        $this->path2 = $argv[2];
    }

    public function getDirList($path)
    {
        $files = scandir($path);
        $returnValue = array();

        foreach ($files as $file)
        {
            if (is_dir("{$path}/{$file}"))
            {
                $returnValue[] = $file;
            }
        }

        return $returnValue;
    }

    public function view($dataset)
    {
        foreach ($dataset as $data)
        {
            echo $data . "\n";
        }
    }

    public function execute()
    {
        $this->pathDir1 = $this->getDirList($this->path1);
        $this->pathDir2 = $this->getDirList($this->path2);

        $diff = array_diff($this->pathDir1, $this->pathDir2);

        $this->view($diff);
    }
}

(new diffDir($argv))->execute();
