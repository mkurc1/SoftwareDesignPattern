<?php

interface Image
{
	public function render();
}

class RealImage implements Image
{
	private $filename;

	public function __construct($filename)
	{
		$this->filename = $filename;
		$this->loadImage();
	}

	private function loadImage()
	{
		echo 'Load image: ' . $this->filename . '<br>';
	}

	public function render()
	{
		echo 'Image content: ' . $this->filename . '<br>';
	}
}

class ProxyImage implements Image
{
	private $filename;
	private $image;

	public function __construct($filename)
	{
		$this->filename = $filename;
	}

	public function render()
	{
		if (null === $this->image) {
			$this->image = new RealImage($this->filename);
		}

		return $this->image->render();
	}
}

$image = new ProxyImage('image_big');
echo $image->render();
echo $image->render();

?>