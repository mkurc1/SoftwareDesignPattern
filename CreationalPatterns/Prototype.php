<?php

class Pizza
{
	private $name;
	private $size;
	private $extraCheese;
	private $ham;
	private $mushrooms;

	public function __construct($name, $size, $extraCheese, $ham)
	{
		$this->name = $name;
		$this->size = $size;
		$this->extraCheese = $extraCheese;
		$this->ham = $ham;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getSize()
	{
		return $this->size;
	}

	public function setSize($size)
	{
		$this->size = $size;
	}

	public function isExtraCheese()
	{
		return $this->extraCheese;
	}

	public function setExtraCheese($extraCheese)
	{
		$this->extraCheese = $extraCheese;
	}

	public function isHam()
	{
		return $this->ham;
	}

	public function setHam($ham)
	{
		$this->ham = $ham;
	}
}

$pizza = new Pizza('Margarita', 30, false, false);
$pizza2 = clone $pizza;
$pizza2->setName('Vesuvio');
$pizza2->setHam(true);

echo 'Name: ' . $pizza2->getName();
echo 'Size: ' . $pizza2->getSize();
echo 'Extra cheese: ' . $pizza2->isExtraCheese();
echo 'Ham: ' . $pizza2->isHam();

?>