<?php
// src/Model/Table/ArticlesTable.php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    public function initialize(array $config)
    {
		$options = array(
			// Refer to php.net fgetcsv for more information
			'length' => 0,
			'delimiter' => ',',
			'enclosure' => '"',
			'escape' => '\\',
			// Generates a Model.field headings row from the csv file
			'headers' => true,
			// If true, String $content is the data, not a path to the file
			'text' => false,
		);
        $this->addBehavior('Timestamp');
		$this->addBehavior('CakePHPCSV.Csv', $options);
		
		
		
    }
	
	public function loadCSV($filename){
            $this->begin();
            try{
                $this->deleteAll('1=1',false);
                $csvData = file($filename,FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
                foreach($csvData as $line){
                    $record = split(',',$line);
                    $data = array(
                        'title' => $record[0],
                        'body' => $record[1],
                    );
                    $this->create($data);
                    $this->save();
                }
                $this->commit();
            }catch(Exception $e){
                $this->rollback();
            }
       }
		
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->requirePresence('title')
            ->notEmpty('body')
            ->requirePresence('body');

        return $validator;
    }

    public function isOwnedBy($articleId, $userId)
    {
        return $this->exists(['id' => $articleId, 'user_id' => $userId]);
    }
}
