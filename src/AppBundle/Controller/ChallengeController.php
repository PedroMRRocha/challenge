<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SearchHistory;
use AppBundle\Entity\SearchResults;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;

//require('jpgraph/jpgraph.php');

class ChallengeController extends Controller
{
    /**
     * @Route("/challenge/", name="index")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('challenge/index.html.twig');
    }

    /**
     * @Route("/challenge/parse-url", name="parse-url")
     */
    public function parseUrlAction(Request $request)
    {
        $data = $_POST['url'];

        // Validate url

        /////////////////////


        //If valid, parse
        $str = file_get_contents($data);

        $parseResult = array_count_values(str_word_count(strip_tags(strtolower($str)), 1));



        //print_r($parseResult);
        //die();

        $searchHistory = new SearchHistory();
        $searchHistory->setUrl($data);

        $searchHistory->setDateSearched(new \Datetime());


        $entityManager = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the searchHistory (no queries yet)
        $entityManager->persist($searchHistory);

        foreach ($parseResult as $word => $times) {
            $searchResults = new searchResults();
            $searchResults->setWord($word);
            $searchResults->setTimesRepeated($times);

            // relates this searchResults to the category
            $searchResults->setSearchHistory($searchHistory);

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($searchResults);
        }

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        $result = $entityManager->getRepository(SearchResults::class)
            ->findAllOrderedByTimesOccured();

        $resultTopTen = $entityManager->getRepository(SearchResults::class)
            ->findAllTopTenWords($searchHistory->getId());

        //var_dump($resultTopTen);

        $topTenLetters = $this->countTopLetters();

        $searchHistoryRepo = $this->getDoctrine()->getRepository(SearchHistory::class);

        $allSearchResults =  $searchHistoryRepo->findAll();

        //var_dump($allSearchResults);

        return $this->render('challenge/results.html.twig', array(
            'url'        => $data,
            'all_search_results' => $allSearchResults,
            'result_top_ten' => $resultTopTen,
            'result'        => $result,
            'top_ten_characters' => $topTenLetters
        ));

        echo 'Saved new searchHistory with id ' . $searchHistory->getId();

        die();

        //Clean some results maybe ?

        ////////

        //Prepare data to insert in database

        $dataToSave = array(
            'url' => $data,
            'words' => $parseResult
        );

        $result = new SearchHistoryRepository();

        $result = SearchHistoryRepository()->createUrlPase($dataToSave);
    }

    /**
     * Count the top 10 letters that appeared in the searches
     * 
     * @return array
     */
    public function countTopLetters()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $allResults = $entityManager->getRepository(SearchResults::class)->findAll();

        $topTenLetters = array();

        foreach ($allResults as $word) {
            $letterArray = str_split($word->getWord());

            foreach ($letterArray as $letter) {
                if( isset($topTenLetters[$letter]) ) {
                    $topTenLetters[$letter] = $topTenLetters[$letter] + 1;
                } else {
                    $topTenLetters[$letter] = 1;
                }
            }
        }

        arsort($topTenLetters, SORT_NUMERIC);

        $topTenLetters = array_slice($topTenLetters, 0, 10);

        return $topTenLetters;
    }
}
