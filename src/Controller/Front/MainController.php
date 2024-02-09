<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{
    #[Route('/front/main', name: 'app_front_main')]
    public function index(): Response
    {

        // Remplacez 'YOUR_API_TOKEN' par votre propre token
        $apiKey = 'eyJ4NXQiOiJOelU0WTJJME9XRXhZVGt6WkdJM1kySTFaakZqWVRJeE4yUTNNalEyTkRRM09HRmtZalkzTURkbE9UZ3paakUxTURRNFltSTVPR1kyTURjMVkyWTBNdyIsImtpZCI6Ik56VTRZMkkwT1dFeFlUa3paR0kzWTJJMVpqRmpZVEl4TjJRM01qUTJORFEzT0dGa1lqWTNNRGRsT1RnelpqRTFNRFE0WW1JNU9HWTJNRGMxWTJZME13X1JTMjU2IiwidHlwIjoiYXQrand0IiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiI5ZGQxNGJmZi0yZDIwLTQ1MDItYjI5ZC1mOTI1YjhjMDEyZDkiLCJhdXQiOiJBUFBMSUNBVElPTiIsImF1ZCI6ImdwTTM3MjI5QUlwZEMzWnllZU5LZl9nZDBPZ2EiLCJuYmYiOjE3MDc1MTQ5ODEsImF6cCI6ImdwTTM3MjI5QUlwZEMzWnllZU5LZl9nZDBPZ2EiLCJzY29wZSI6ImRlZmF1bHQiLCJpc3MiOiJodHRwczpcL1wvcG9ydGFpbC1hcGkubWV0ZW9mcmFuY2UuZnJcL29hdXRoMlwvdG9rZW4iLCJleHAiOjE3MDc1MTg1ODEsImlhdCI6MTcwNzUxNDk4MSwianRpIjoiNjkwODdkYmItMWMyMC00Y2I0LWIwYjktMWUxNjAzMGU5NTc0IiwiY2xpZW50X2lkIjoiZ3BNMzcyMjlBSXBkQzNaeWVlTktmX2dkME9nYSJ9.dkgH2USucZ1hjpOwTpqKLm6pVYK5X1awLT-5zCxcnOJmCF5Ipoh12E3IUyH-o8PtRDi1xCp5AbtXMeAURsE7whsKok1sO0T8D0q3hncljsMZJiLUoCwrTZRZ_trnsYHBZ6MI-KD--eOL8BZugeS56XTZKwzBEF1L56r6LYKLsgwryVt0im3bz4VNRAPZHre2Q8lbBpIiRCZzU7JANQB1gUQLkNviYUOQS7UuTNijuc3Uau6AQe1YMh1ClJSo7jXkjwK9vxrT-0JZBHZGfuhTdYCchlLzDCsblsQMBoHhQSNdyitFr4jhPUY2UKllV5NZLeT5ryJmZt5wNpPsbZyCSA';

        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'https://public-api.meteofrance.fr/public/DPClim/v1/liste-stations/quotidienne?id-departement=77', [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ],
        ]);

        $data = $response->toArray();

        return $this->render('front/main/index.html.twig', [
            'data' => $data,
        ]);
    }
}
