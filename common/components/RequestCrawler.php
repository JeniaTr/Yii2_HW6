<?php
/**
 * Created by PhpStorm.
 * User: jeniatr
 * Date: 29.01.17
 * Time: 14:11
 */

namespace common\components;


use yii\base\Component;

class RequestCrawler extends Component
{

    public $serializer;
    /** @var  string $pathToSave */
    public $pathToSave;

    public function __construct(SerializerInterface $serializer, array $config)
    {
        $this->serializer = $serializer;
        parent::__construct($config);
    }

//    public function saveFile($path, $type, $name, $data)
//    {
//        $fp = fopen($path . $name . "." . $type, "w+");
//        fwrite($fp, $data);
//        fclose($fp);
//    }

    public function saveF($decodedOrEncoded)
    {
        return file_put_contents(__DIR__ . $this->pathToSave . '/' . time() . '.txt', $decodedOrEncoded, FILE_APPEND | LOCK_EX);
    }


}