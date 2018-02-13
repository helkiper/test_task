<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 14.02.2018
 * Time: 0:05
 */

namespace Helkiper\BlogBundle\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
	private $targetDir;

	public function __construct($targetDir)
	{
		$this->targetDir = $targetDir;
	}

	public function upload(UploadedFile $file)
	{
		$fileName = md5(uniqid()).'.'.$file->guessExtension();

		$file->move($this->getTargetDir(), $fileName);

		return $fileName;
	}

	public function getTargetDir()
	{
		return $this->targetDir;
	}
}