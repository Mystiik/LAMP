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
		
		//debug($table);
    }
	
	public function detail()
    {
		//Récupération de tous les sites
		$this->loadModel('Sites');
		$table = $this->Sites->recup_sites();
		
		$this->set('table', $table);
		
		//Récupération de tous les sites producteurs
		$producteur = $this->Sites->recup_sites_producteurs();
		
		$this->set('producteur', $producteur);
		
		//Formulaire
		if($this->request->is('post'))
		{
			if(isset($this->request->data))
			{
				$this->set('TheChosenOne', $this->request->data['TheChosenOne']);
			}
		}
		else
		{
			$this->set('TheChosenOne', 0);
		}
		//debug($TheChosenOne);
    }
}
?>