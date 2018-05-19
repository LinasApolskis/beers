<?php

namespace App\Controller;

use App\Entity\Beers;
use App\Entity\breweries;
use App\Entity\Geocodes;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RouteController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('route/index.html.twig', [
            'controller_name' => 'RouteController',
        ]);
    }


    /**
     * @Route("/route", name="route")
     */
    public function route()
    {
        $bakuze_lat = 51.355468; //first cord
        $bakuze_lon = 11.100790; //second cord
        $kilometrai = 2000;


        $entityManager = $this->getDoctrine()->getManager();
        //$beers = $entityManager->getRepository(Beers::class)->findAll();
        //$breweries = $entityManager->getRepository(Breweries::class)->findAll();
        $geocodes = $entityManager->getRepository(Geocodes::class)->findAll();


        $cords = array();
        foreach($geocodes as $geocode)
        {
            $theta = $bakuze_lon - $geocode -> getLongitude();
            $dist = sin(deg2rad($bakuze_lat)) * sin(deg2rad($geocode -> getLatitude())) +  cos(deg2rad($bakuze_lat)) * cos(deg2rad($geocode -> getLatitude())) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $distance_to_home = $dist * 60 * 1.1515 * 1.609344;
            $cords[] = array("id" => $geocode -> getID(),
                "brewery_id" => $geocode -> getBreweryId(),
                "lat" => $geocode -> getLatitude(),
                "lon" => $geocode -> getLongitude(),
                "beers" => count($entityManager->getRepository(Beers::class)->findBy(['brewery_id' =>  $geocode -> getBreweryId()])),
                "km_to_home" => $distance_to_home,
                "km_to_pos" => ""
                );
        }


        return $this->render('route/route.html.twig', [
            'controller_name' => 'RouteController',
            'data' => $cords,
        ]);
    }
}
