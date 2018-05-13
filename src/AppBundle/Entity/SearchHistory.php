<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * SearchHistory
 *
 * @ORM\Table(name="search_history")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SearchHistoryRepository")
 */
class SearchHistory
{

    /**
     * @ORM\OneToMany(targetEntity="SearchResults", mappedBy="category")
     */
    private $seach_results;

    public function __construct()
    {
        $this->seach_results = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_searched", type="datetime")
     */
    private $dateSearched;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return SearchHistory
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set dateSearched
     *
     * @param \DateTime $dateSearched
     *
     * @return SearchHistory
     */
    public function setDateSearched($dateSearched)
    {
        $this->dateSearched = $dateSearched;

        return $this;
    }

    /**
     * Get dateSearched
     *
     * @return \DateTime
     */
    public function getDateSearched()
    {
        return $this->dateSearched;
    }
}

