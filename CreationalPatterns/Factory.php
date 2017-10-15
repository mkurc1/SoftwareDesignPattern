<?php

class Product
{
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}

class ProductCreator
{
	public static function createProduct($name)
	{
		return new Product($name);
	}
}

$product = ProductCreator::createProduct('ford');
echo $product->getName();

?>