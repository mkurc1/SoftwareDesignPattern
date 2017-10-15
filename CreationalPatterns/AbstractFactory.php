<?php

abstract class AbstractProduct
{
	abstract public function getName();
}

class DigitalProduct extends AbstractProduct
{
	public function getName()
	{
		return 'Digital product';
	}
}

class MaterialProduct extends AbstractProduct
{
	public function getName()
	{
		return 'Material product';
	}
}

abstract class AbstractProductFactory
{
	abstract public function createProduct();
}

class DigitalProductFactory extends AbstractProductFactory
{
	public function createProduct()
	{
		return new DigitalProduct();
	}
}

class MaterialProductFactory extends AbstractProductFactory
{
	public function createProduct()
	{
		return new MaterialProduct();
	}
}

class Factory
{
	const FACTORY_DIGITAL_PRODUCT = 'digital';
	const FACTORY_MATERIAL_PRODUCT = 'material';

	public static function chooseFactory($name)
	{
		switch ($name) {
			case self::FACTORY_DIGITAL_PRODUCT:
				return new DigitalProductFactory();
			case self::FACTORY_MATERIAL_PRODUCT:
				return new MaterialProductFactory();
		}
	}
}

$digitalFactory = Factory::chooseFactory('digital');
$materialFactory = Factory::chooseFactory('material');
$digitalProduct = $digitalFactory->createProduct();
$materialProduct = $materialFactory->createProduct();

echo $digitalProduct->getName();
echo $materialProduct->getName();

?>