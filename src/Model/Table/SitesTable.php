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
	
	public function recup_sites_order()
	{
		$bdd = ConnectionManager::get('default');
		$result = $bdd->execute('SELECT * FROM sites ORDER BY name')->fetchAll();
		
		return $result;
	}
	
	public function recup_lien($idsite)
	{
		$bdd = ConnectionManager::get('default');
		
		$req = $bdd->prepare('SELECT * FROM paths WHERE starting_site_id=:start OR ending_site_id=:end');
		$req->execute(array('start' => $idsite, 'end' => $idsite));
		
		return $req->fetchAll();
	}
	
	public function new_site($name, $type, $locx, $locy, $stock)
	{
		$bdd = ConnectionManager::get('default');
		$result = $bdd->execute('INSERT INTO sites (name, type, location_x, location_y, stock)
								VALUES ("'.$name.'", "'.$type.'", "'.$locx.'", "'.$locy.'", "'.$stock.'")');
	}
}



