<?php

interface ShortPathStrategy
{
	public function find($graf);
}	

class DijkstryStrategy implements ShortPathStrategy
{
	public function find($graf)
	{
		echo 'The shortest path find by Dijkstry algorithm';
		return [];
	}
}

class BellmanFordStrategy implements ShortPathStrategy
{
	public function find($graf)
	{
		echo 'The shortest path find by Bellman-Ford algorithm';
		return [];
	}
}

class ShortPathComponent 
{
	private $shortPathStrategy;

	public function __construct(ShortPathStrategy $shortPathStrategy)
	{
		$this->shortPathStrategy = $shortPathStrategy;
	}

	public function findShortPathInGraph($graph)
	{
		return $this->shortPathStrategy->find($graph);
	}
}

$graph = [[0, 2], [2, 1], [1, 0]];
$component = new ShortPathComponent(new DijkstryStrategy());
$component->findShortPathInGraph($graph);

?>
