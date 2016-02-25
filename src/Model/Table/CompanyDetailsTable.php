<?php


namespace App\Model\Table;

use Search\Manager;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

class CompanyDetailsTable extends Table
{

    public function initialize(array $config)
    {
       $this->belongsTo('AlumniProfiles', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',        // OR specify the type 
        ]);
        $this->belongsTo('EducationalBackground', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }


}


?>