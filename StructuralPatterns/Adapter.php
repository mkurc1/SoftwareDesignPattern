<?php

class Product
{
	private $name;
	private $price;

	public function __construct($name, $price)
	{
		$this->name = $name;
		$this->price = $price;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getPrice()
	{
		return $this->price;
	}
}

class ProductAdapter
{
	private $product;

	public function __construct(Product $product)
	{
		$this->product = $product;
	}

	public function displayName()
	{
		return $this->product->getName();
	}

	public function displayPrice()
	{
		return $this->product->getPrice();
	}
}

$product = new Product('Keyboard 200', 29.99);
$productAdapter = new ProductAdapter($product);
echo 'Name: ' . $productAdapter->displayName();
echo 'Price: ' . $productAdapter->displayPrice();

?>