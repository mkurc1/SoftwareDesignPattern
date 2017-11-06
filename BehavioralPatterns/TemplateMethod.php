<?php

abstract class Checkout
{
	abstract protected function cart();
	abstract protected function addressed();
	abstract protected function shippingMethod();
	abstract protected function paymentMethod();

	final public function processOrder()
	{
		$this->cart();
		$this->addressed();
		$this->shippingMethod();
		$this->paymentMethod();
	}
}

class ShopCheckout extends Checkout
{
	protected function cart()
	{
		echo 'Process order. Step: cart' . '<br>';
	}

	protected function addressed()
	{
		echo 'Process order. Step: addressed' . '<br>';
	}

	protected function shippingMethod()
	{
		echo 'Process order. Step: shippingMethod' . '<br>';
	}

	protected function paymentMethod()
	{
		echo 'Process order. Step: paymentMethod' . '<br>';
	}
}

$shopCheckout = new ShopCheckout();
$shopCheckout->processOrder();

?>
