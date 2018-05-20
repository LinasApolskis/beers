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
        $kilometrai = 200000;


        $entityManager = $this->getDoctrine()->getManager();
        //$beers = $entityManager->getRepository(Beers::class)->findAll();
        //$breweries = $entityManager->getRepository(Breweries::class)->findAll();
        $geocodes = $entityManager->getRepository(Geocodes::class)->findAll();


        $cords = array();
        $arrayid = 0;
        foreach($geocodes as $geocode)
        {
            $theta = $bakuze_lon - $geocode -> getLongitude();
            $dist = sin(deg2rad($bakuze_lat)) * sin(deg2rad($geocode -> getLatitude())) +  cos(deg2rad($bakuze_lat)) * cos(deg2rad($geocode -> getLatitude())) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $distance_to_home = $dist * 60 * 1.1515 * 1.609344;
            $count = count($entityManager->getRepository(Beers::class)->findBy(['brewery_id' =>  $geocode -> getBreweryId()]));
            if($count!=0)
            $value_per_km = $distance_to_home / $count;
            else
                $value_per_km = 9999999999999999999999999999999999999;
            $cords[] = array("id" => $geocode -> getID(),
                "arrayid" => $arrayid,
                "brewery_id" => $geocode -> getBreweryId(),
                "lat" => $geocode -> getLatitude(),
                "lon" => $geocode -> getLongitude(),
                "beers" => $count,
                "km_to_home" => $distance_to_home,
                "km_to_pos" => $distance_to_home,
                "value_per_km" => $value_per_km
                );
            $arrayid++;
        }

        $min = min(array_column($cords, 'value_per_km'));

        foreach ($cords as $key => $val) {
            if ($val['value_per_km'] === $min) {
                $nextid =  $key;
            }
        }


        $beerarray = array();
        $visited = array();
        $visited[] = $nextid;
        while($kilometrai - ($cords[$nextid]['km_to_pos'] + $cords[$nextid]['km_to_home']) >= 0)
        {

            //Add found brewery and count lasting distance
            //$beerarray[] = $cords[$nextid];
            $kilometrai -= $cords[$nextid]['km_to_pos'];
            //$beerarray[] = $kilometrai;

            //Update distance to current brewery
            foreach($cords as $cord) {
                $theta = $cords[$nextid]['lon'] - $cord['lon'];
                $dist = sin(deg2rad($cords[$nextid]['lat'])) * sin(deg2rad($cord['lat'])) + cos(deg2rad($cords[$nextid]['lat'])) * cos(deg2rad($cord['lon'])) * cos(deg2rad($theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                $distance_to_pos = $dist * 60 * 1.1515 * 1.609344;
                $id = $cord['arrayid'];
                $cords[$id]['km_to_pos'] = $distance_to_pos;
                $count = $cord['beers'];

                if ($count != 0 && !in_array($id,$visited))
                    $cords[$id]['value_per_km'] = $distance_to_pos / $count;
                else
                    $cords[$id]['value_per_km'] = 9999999999999999999999999999999999999;

            }

            $min = min(array_column($cords, 'value_per_km'));

            foreach ($cords as $key => $val) {
                if ($val['value_per_km'] === $min) {
                    $nextid = $val['arrayid'];
                }
            }
            $visited[] = $nextid;
            $beerarray[] = $cords[$nextid];
        }








        return $this->render('route/route.html.twig', [
            'controller_name' => 'RouteController',
            'data' => $beerarray,
            'bakuze_lat' => $bakuze_lat,
            'bakuze_lon' => $bakuze_lon,
        ]);
    }
}
