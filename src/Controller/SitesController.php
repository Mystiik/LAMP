<?php
namespace App\Controller;
use App\Controller\AppController;

class SitesController extends AppController
{
	public function index()
    {

    }
	
	public function test()
    {

    }
	
	public function liste()
    {
		//Récupération de tous les sites
		$this->loadModel('Sites');
		$table = $this->Sites->recup_sites();
		
		$this->set('table', $table);
		
		
		//Formulaire
		if($this->request->is('post'))
		{
			if(isset($this->request->data))
			{
				//Initialisation
				$err=0;
				$name = $this->request->data['name'];
				$type = $this->request->data['type'];
				$locx = floatval($this->request->data['locx']);
				$locy = floatval($this->request->data['locy']);
				$stock = floatval($this->request->data['stock']);
				
				//Blindage des valeurs
				if( gettype($name)!="string" ) { $err+=1; }
				if( !($type=="producteur" or $type=="consommateur") ) { $err+=1; }
				if( gettype($locx)!="double" ) { $err+=1; }
				if( gettype($locy)!="double" ) { $err+=1; }
				if( gettype($stock)!="double" ) { $err+=1; }
				
				//Appel de la fonction
				if($err==0) { $this->Sites->new_site($name, $type, $locx, $locy, $stock); }
				
				//debug($name);
			}
		}
		//debug($table);
    }
	
	public function detail()
    {
		//Récupération de tous les sites
		$this->loadModel('Sites');
		$table = $this->Sites->recup_sites();
		$tableorder = $this->Sites->recup_sites_order();
		
		$this->set('table', $table);
		$this->set('tableorder', $tableorder);
		
		//Formulaire
		if($this->request->is('post'))
		{
			if(isset($this->request->data))
			{
				$TheChosenOne = $this->request->data['TheChosenOne'];
				$this->set('TheChosenOne', $TheChosenOne);
			}
		}
		else
		{
			$TheChosenOne = 1;
			$this->set('TheChosenOne', $TheChosenOne);
		}
		
		//Récupération de tous les liens du site actuel
		$lien = $this->Sites->recup_lien($TheChosenOne);
		
		$this->set('lien', $lien);
		
		
		//debug($TheChosenOne);
    }
}
?>