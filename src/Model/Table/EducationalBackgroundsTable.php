<?php


namespace App\Model\Table;

use Search\Manager;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;


class EducationalBackgroundsTable extends Table
{
	 
    public function initialize(array $config)
    {
        $this->belongsTo('Users');
        
    }

}



?>