<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;
use Cake\I18n\FrozenTime;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

class SitesTable extends Table{
    
    public function initialize(array $config)
    {
        $this->table('sites');
    }
	
	public function recup_sites()
	{
		$bdd = ConnectionManager::get('default');
		$result = $bdd->execute('SELECT * FROM sites')->fetchAll();
		
		return $result;
	}
	
	public function recup_sites_producteurs()
	{
		$bdd = ConnectionManager::get('default');
		$result = $bdd->execute('SELECT * FROM sites WHERE type="producteur"')->fetchAll();
		
		return $result;
	}
}



