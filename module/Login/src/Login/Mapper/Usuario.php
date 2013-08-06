<?php

namespace Login\Mapper;

class Usuario extends \JVBase\Mapper\AbstractMapper
{
    protected $model = '\Login\Model\Usuario';
    protected $table = 'usuario';
    protected $tableFields = array('id','uid','email','nome');
    protected $tableKeyFields = array('id','email');
}
