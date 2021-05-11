<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Pokemon extends Model
{
    use HasFactory;
    private $id;
    private $name;
    private $detalhes;
    private $imagem;

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDetalhes($value)
    {
        $this->detalhes = $value;
    }

    public function getDetalhes()
    {
        return $this->detalhes;
    }

    public function setImagem($value)
    {
        $this->imagem = $value;
    }

    public function getImagem()
    {
        return $this->imagem;
    }
    public function consultaAPI($url){
        $Client = new Client([
                'base_uri' => $url,
                'verify' => false
            ]);
        $res =  $Client->get($url);
        $content = (string) $res->getBody();
        return json_decode($content);

    }




}
