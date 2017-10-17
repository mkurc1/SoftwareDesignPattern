<?php

interface Price
{
	public function calculatePrice();
}

class BasePrice implements Price
{
	public function calculatePrice()
	{
		return 20;
	}
}

interface PriceDecorator
{
	public function __construct($price);

	public function calculatePrice();
}

class BoxPrice implements PriceDecorator
{
	private $price;

	public function __construct($price)
	{
		$this->price = $price;
	}

	public function calculateBoxPrice()
	{
		return 8;
	}

	public function calculatePrice()
	{
		return $this->price->calculatePrice() + $this->calculateBoxPrice();
	}
}

class PromotionPrice implements PriceDecorator
{
	private $price;

	public function __construct($price)
	{
		$this->price = $price;
	}

	public function calculatePromotionPrice()
	{
		return 4;
	}

	public function calculatePrice()
	{
		return $this->price->calculatePrice() - $this->calculatePromotionPrice();
	}
}


$price = new BasePrice(); 
$price = new BoxPrice($price);
$price = new PromotionPrice($price);
echo $price->calculatePrice();

?>