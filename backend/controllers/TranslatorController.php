<?php

namespace backend\controllers;
use  Yii;
use SimpleXMLElement;

class TranslatorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://translate.yandex.net/api/v1.5/tr.json/getLangs?ui=ru&key=trnsl.1.1.20160607T070613Z.e3e7be15b748c2bc.848fa976b500120b6d6f4b6eba51066f025d5136');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $out = curl_exec($curl);
        $all_lenguages = json_decode($out, true);

        $translate_text = '';
        $choose_language = Yii::$app->request->post('choose_language');
        $do_translate_to = Yii::$app->request->post('do_translate_to');
        $post_text = Yii::$app->request->post('post_text');
        $url_serialization = urlencode($post_text);

        if (!empty($choose_language) && !empty($do_translate_to) && !empty($post_text)) {

        $url1 = "https://translate.yandex.net/api/v1.5/tr/translate";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url1); // set url to post to
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
        curl_setopt($ch, CURLOPT_TIMEOUT, 3); // times out after 4s
        curl_setopt($ch, CURLOPT_POST, 1); // set POST method
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "key=trnsl.1.1.20160607T070613Z.e3e7be15b748c2bc.848fa976b500120b6d6f4b6eba51066f025d5136&text=".$url_serialization."&lang=".$choose_language."-".$do_translate_to.""); // add POST fields
        $result1 = curl_exec($ch); // run the whole process
        curl_close($ch);
            $translate_text = new SimpleXMLElement($result1);
        }

        return $this->render('index', [
            'translate_text' => $translate_text,
            'all_lenguages' => $all_lenguages,
        ]);
    }

}
