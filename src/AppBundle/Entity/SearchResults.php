<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SearchResults
 *
 * @ORM\Table(name="search_results")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SearchResultsRepository")
 */
class SearchResults
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SearchHistory", inversedBy="search_history")
     * @ORM\JoinColumn(name="search_history_id", referencedColumnName="id")
     */
    private $searchHistory;

    /**
     * @var string
     *
     * @ORM\Column(name="search_history_id", type="integer")
     */
    private $searchHistoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="word", type="string", length=255)
     */
    private $word;

    /**
     * @var int
     *
     * @ORM\Column(name="times_repeated", type="integer")
     */
    private $timesRepeated;


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
     * Set word
     *
     * @param string $word
     *
     * @return SearchResults
     */
    public function setWord($word)
    {
        $this->word = $word;

        return $this;
    }

    /**
     * Get word
     *
     * @return string
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * Set timesRepeated
     *
     * @param integer $timesRepeated
     *
     * @return SearchResults
     */
    public function setTimesRepeated($timesRepeated)
    {
        $this->timesRepeated = $timesRepeated;

        return $this;
    }

    /**
     * Get timesRepeated
     *
     * @return int
     */
    public function getTimesRepeated()
    {
        return $this->timesRepeated;
    }

    /**
     * Set searchHistory
     *
     * @param $searchHistory
     *
     * @return SearchResults
     */
    public function setSearchHistory($searchHistory)
    {
        $this->searchHistory = $searchHistory;

        return $this;
    }

    /**
     * Get search_history_id
     *
     * @return
     */
    public function getSearchHistory()
    {
        return $this->searchHistory;
    }

    /**
     * Set searchHistoryId
     *
     * @param $searchHistory
     *
     * @return SearchResults
     */
    public function setSearchHistoryId($searchHistoryId)
    {
        $this->searchHistoryId = $searchHistoryId;

        return $this;
    }
      

    /**
     * Get search_history_id
     *
     * @return
     */
    public function getSearchHistoryId()
    {
        return $this->searchHistoryId;
    }
}

