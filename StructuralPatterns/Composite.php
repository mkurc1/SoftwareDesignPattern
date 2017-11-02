<?php

abstract class AbstractFileSystem
{
	abstract public function getContent();
}

class Folder extends AbstractFileSystem
{
	private $files = [];

	public function addFile(AbstractFileSystem $file)
	{
		$this->files[] = $file;
	}

	public function getContent()
	{
		$content = [];

		foreach ($this->files as $file) {
			$content[] = $file->getContent();
		}

		return $content;
	}
}

class File extends AbstractFileSystem
{
	public function getContent()
	{
		return 'File content';
	}
}


$file1 = new File();
$file2 = new File();
$file3 = new File();

$folder1 = new Folder();
$folder2 = new Folder();
$folder1->addFile($file1);
$folder1->addFile($file2);
$folder2->addFile($folder1);
$folder2->addFile($file3);

print_r($folder2->getContent());

?>