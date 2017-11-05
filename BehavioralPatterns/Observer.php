<?php

interface Observable
{
	public function addObserver(Subscriber $subscriber);
	public function notifyObservers(Newsletter $newsletter);
}

interface Observer
{
	public function __construct($email);
}

class Newsletter
{
	private $content;

	public function __construct($content)
	{
		$this->content = $content;
	}

	public function getContent()
	{
		return $this->content;
	}
}

class NewsletterServer implements Observable
{
	private $subscribers = [];

	public function addObserver(Subscriber $subscriber)
	{
		$this->subscribers[] = $subscriber;
	}

	public function notifyObservers(Newsletter $newsletter)
	{
		foreach ($this->subscribers as $subscriber) {
			$subscriber->onNewsletterPosted($newsletter);
		}
	}

	public function sendNewsletter(Newsletter $newsletter)
	{
		$this->notifyObservers($newsletter);
	}
}

class Subscriber implements Observer
{
	private $email;

	public function __construct($email)
	{
		$this->email = $email;
	}

	public function onNewsletterPosted(Newsletter $newsletter)
	{
		echo 'User: ' . $this->email . ' received newsletter: ' . $newsletter->getContent() . '<br>';
	}
}


$subscriber1 = new Subscriber('foo@bar.com');
$subscriber2 = new Subscriber('bar@qwe.net');

$newsletterServer = new NewsletterServer();
$newsletterServer->addObserver($subscriber1);
$newsletterServer->addObserver($subscriber2);

$newsletterServer->sendNewsletter(new Newsletter('Hello!'));

?>