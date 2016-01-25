<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Table(name="load_file")
 * @ORM\Entity(repositoryClass="BlogBundle\Entity\FileLoaderRepository")
 * @ORM\HasLifecycleCallbacks
 */
class FileLoader
{
    /**
     * @Assert\File(
     *     maxSize = "5M",
     *     mimeTypes = {"image/jpeg", "image/png"},
     *     mimeTypesMessage = "Please upload a valid JPEG"
     * )
     */

    private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    public $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */

    public $path;

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir()
    {

        return $this->getUploadDir();
    }

    protected function getUploadDir()
    {

        return 'load/image';
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */

    public function preUpload()
    {
        if(null !== $this->getFile()){
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath();
        if ($file) {
            unlink($file);
        }
    }

    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        $this->getFile()->move($this->getUploadRootDir(), $this->path);


        if (isset($this->temp)) {

            unlink($this->getUploadRootDir() . '/' . $this->temp);
            $this->temp = null;
        }
        $this->file = null;
    }
}

