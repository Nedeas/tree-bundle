<?php

namespace Umanit\Bundle\TreeBundle\Entity;

use Umanit\Bundle\TreeBundle\Model\SeoInterface;
use Umanit\Bundle\TreeBundle\Entity\Translation\SeoMetadataTranslation;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * SeoMetadata
 * @ORM\Table(name="treebundle_seometadata")
 * @ORM\Entity()
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 * @Gedmo\TranslationEntity(class="Umanit\Bundle\TreeBundle\Entity\Translation\SeoMetadataTranslation")
 */
class SeoMetadata
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    protected $title;

    /**
     * @var string
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @var string
     * @ORM\Column(name="keywords", type="text",  nullable=true)
     */
    protected $keywords;

    /**
     * @ORM\OneToMany(
     *   targetEntity="Umanit\Bundle\TreeBundle\Entity\Translation\SeoMetadataTranslation",
     *   mappedBy="object",
     *   cascade={"persist", "remove"}
     * )
     */
    private $translations;

    /**
     * Get the value of Title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of Title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of Description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of Keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set the value of Keywords
     *
     * @param string $keywords
     *
     * @return self
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get the value of Translations
     *
     * @return SeoMetadataTranslation[]
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * Set the value of Translations
     *
     * @param SeoMetadataTranslation[] $translations
     *
     * @return self
     */
    public function setTranslations($translations)
    {
        $this->translations = $translations;
        foreach ($this->translations as &$translation) {
            $translation->setObject($this);
        }

        return $this;
    }

    /**
     * Add a translation
     *
     * @param SeoMetadataTranslation $t
     *
     * @return self
     */
    public function addTranslation(SeoMetadataTranslation $t)
    {
        if (!$this->translations->contains($t)) {
            $this->translations[] = $t;
            $t->setObject($this);
        }

        return $this;
    }

    /**
     * Get the value of Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param integer $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
