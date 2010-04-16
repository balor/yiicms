<?php

class GalleryItemTest extends WebTestCase
{
	public $fixtures=array(
		'galleryItems'=>'GalleryItem',
	);

	public function testShow()
	{
		$this->open('?r=galleryItem/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=galleryItem/create');
	}

	public function testUpdate()
	{
		$this->open('?r=galleryItem/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=galleryItem/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=galleryItem/index');
	}

	public function testAdmin()
	{
		$this->open('?r=galleryItem/admin');
	}
}
