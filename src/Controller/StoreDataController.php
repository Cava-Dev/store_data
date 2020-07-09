<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\StoreData;

class StoreDataController extends AbstractController
{   
    public function index()
    {
        $getParams = json_decode(file_get_contents("data.json"));
        
        foreach($getParams as $valueParams){
            for($i = 0; $i < count($valueParams); $i++){
                $repositoryStoreData = $this->getDoctrine()->getRepository(StoreData::class);
                $repositoryStoreData->storeDataDb($valueParams[$i]->name_invoice, $valueParams[$i]->id_client, $valueParams[$i]->row);
            }
        }

        return $this->json([
            'message' => 'Dati Inseriti Correttamente'
        ]);
    }
}
