<?php

class GalleryTest extends WebTestCase
{
	public $fixtures=array(
		'galleries'=>'Gallery',
	);

	public function testShow()
	{
		$this->open('?r=gallery/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=gallery/create');
	}

	public function testUpdate()
	{
		$this->open('?r=gallery/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=gallery/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=gallery/index');
	}

	public function testAdmin()
	{
		$this->open('?r=gallery/admin');
	}
}
