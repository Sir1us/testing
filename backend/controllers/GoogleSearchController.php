<?php

namespace backend\controllers;

class GoogleSearchController extends \yii\web\Controller
{


    /**
     * @return string
     */
    public function actionIndex()
    {

        $url = "https://www.googleapis.com/customsearch/v1?key=AIzaSyAmKSeatIGdPA9IXcYTPVSCK1-8svWmt8Y&cx=015478557852572190756:uadg1dmibw0&q=природа&searchType=image&imgSize=large";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $body = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($body, true);
        return $this->render('index', [
            'json' => $json,
        ]);
    }

}
