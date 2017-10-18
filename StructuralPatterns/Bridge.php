<?php

interface System
{
	public function getName();
}

class Windows implements System
{
	public function getName()
	{
		return 'Windows';
	}
} 

class Linux implements System
{
	public function getName()
	{
		return 'Linux';
	}
} 

interface Component
{
	public function __construct(System $system);

	public function getName();
}

class TaskbarComponent implements Component
{
	private $system;

	public function __construct(System $system)
	{
		$this->system = $system;
	}

	public function getName()
	{
		return 'Taskbar-' . $this->system->getName();
	}
}

class ManagerComponent implements Component
{
	private $system;

	public function __construct(System $system)
	{
		$this->system = $system;
	}

	public function getName()
	{
		return 'Manager-' . $this->system->getName();
	}
}

$windows = new Windows();
$linux = new Linux();
$taskbarForWindows = new TaskbarComponent($windows);
$managerForLinux = new ManagerComponent($linux);

echo $taskbarForWindows->getName();
echo $managerForLinux->getName();
?>