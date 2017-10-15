<?php

class Pizza
{
	private $name;
	private $size;
	private $extraCheese;
	private $ham;
	private $mushrooms;

	public function __construct($name, $size, $extraCheese, $ham, $mushrooms)
	{
		$this->name = $name;
		$this->size = $size;
		$this->extraCheese = $extraCheese;
		$this->ham = $ham;
		$this->mushrooms = $mushrooms;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getSize()
	{
		return $this->size;
	}

	public function isExtraCheese()
	{
		return $this->extraCheese;
	}

	public function isHam()
	{
		return $this->ham;
	}

	public function isMushrooms()
	{
		return $this->mushrooms;
	}
}

class PizzaBuilder
{
	private $name;
	private $size = 30;
	private $extraCheese = false;
	private $ham = false;
	private $mushrooms = false;

	public function __construct($name) 
	{
		$this->name = $name;
	}

	public function setBigSize()
	{
		$this->size = 40;

		return $this;
	}

	public function setNormalSize()
	{
		$this->size = 30;

		return $this;
	}

	public function addExtraCheese()
	{
		$this->extraCheese = true;

		return $this;
	}

	public function addHam()
	{
		$this->ham = true;

		return $this;
	}

	public function addMushrooms()
	{
		$this->mushrooms = true;

		return $this;
	}

	public function build()
	{
		return new Pizza($this->name, $this->size, $this->extraCheese, $this->ham, $this->mushrooms);
	}
}

$pizza = (new PizzaBuilder('Margarita'))
	->addHam()
	->addMushrooms()
	->build();

echo 'Name: ' . $pizza->getName();
echo 'Size: ' . $pizza->getSize();
echo 'Extra cheese: ' . $pizza->isExtraCheese();
echo 'Ham: ' . $pizza->isHam();
echo 'Mushrooms: ' . $pizza->isMushrooms();

?>