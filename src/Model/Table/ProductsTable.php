<?php

// src/Model/Table/ProductsTable.php

namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\Table;

class ProductsTable extends Table {

	public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            // You can configure as many upload fields as possible,
            // where the pattern is `field` => `config`
            //
            // Keep in mind that while this plugin does not have any limits in terms of
            // number of files uploaded per request, you should keep this down in order
            // to decrease the ability of your users to block other requests.
            'photo_url' => [
        		'path' => 'webroot{DS}files{DS}',
    		],
		]);
    }

	public function validationDefault(Validator $validator) {

	    $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 191)
            ->requirePresence('slug', 'create')
            ->notEmpty('slug')
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

		$validator
            ->scalar('body')
            ->allowEmpty('body');

        $validator
        	->integer('in_stock')
            ->requirePresence('in_stock', 'create')
            ->notEmpty('in_stock');

        $validator
        	->numeric('price_eur')
        	->requirePresence('price_eur', 'create')
        	->notEmpty('price_eur');

        $validator
        	->numeric('weight_kg')
            ->allowEmpty('weight_kg');

        $validator
        	->numeric('length_cm')
            ->allowEmpty('length_cm');

        $validator
        	->numeric('age_years')
            ->allowEmpty('age_years');

        $validator
            ->scalar('sex')
            ->maxLength('sex', 6)
            ->requirePresence('sex', 'create')
            ->notEmpty('sex')
            ->add('sex', 'custom', [
    			'rule' => [$this, 'sexOptions'],
    			'message' => 'Sex of animal must be male, female or other'
			]);

        $validator
            ->provider('upload', \Josegonzalez\Upload\Validation\DefaultValidation::class)
            ->maxLength('photo_url', 255)
            ->allowEmpty('photo_url')
            ->add('photo_url', 'fileUnderPhpSizeLimit', [
                'rule' => 'isUnderPhpSizeLimit',
                'message' => 'This file is too large',
                'provider' => 'upload'
            ])
            ->add('photo_url', 'fileFileUpload', [
                'rule' => 'isFileUpload',
                'message' => 'There was no file found to upload',
                'provider' => 'upload'
            ])
            ->add('photo_url', 'fileSuccessfulWrite', [
                'rule' => 'isSuccessfulWrite',
                'message' => 'This upload failed',
                'provider' => 'upload'
            ]);

	    return $validator;
	}

	public function sexOptions($value, array $context) {
		if ($value == "male" || $value == "female" || $value == "other") {
			return true;
		}
		return false;
	}

}