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
	
	public function suppr()
    {
		$here = $this->request->here();
		$pieces = explode("/", $here);
		$this->Sites->remove_site($pieces[4]);
		$this->redirect('/sites/liste');
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
		
		//Récupération du lien
		$lien = $this->Sites->recup_lien($TheChosenOne);
		
		$this->set('lien', $lien);
		
		
		//Récupération des statistiques
		$record = $this->Sites->recup_record($TheChosenOne);
		$this->set('record', $record);
		$record_type = $this->Sites->recup_record_type($TheChosenOne, $table[$TheChosenOne][2]);
		
		$total = 0;
		$max = 0;
		$min = 10000;
		
		for($i=0;$i<count($record_type);$i++)
		{
			$tmp = abs($record_type[$i][3]);
			$total += $tmp;
			if($tmp>$max) { $max=$tmp; }
			if($tmp<$min) { $min=$tmp; }
		}
		
		$nbreleve = count($record_type);
		$moyenne = round($total/$nbreleve, 2);
		
		$total_appro = 0;
		for($i=0;$i<count($lien);$i++) { $total_appro += $lien[$i][4]; }
		
		if($table[$TheChosenOne][2]=="consommateur") { $etat = "Consommation"; }
		if($table[$TheChosenOne][2]=="producteur") { $etat = "Production"; }
		
		
		$stat = ['tot'=>$total, 'max'=>$max, 'min'=>$min, 'moy'=>$moyenne, 'nbr'=>$nbreleve, 'totapp'=>$total_appro, 'etat'=>$etat];
		$this->set('stat', $stat);
		
		//debug($stat);
    }
	
	public function acheminement()
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
		
		//Récupération du lien
		$lien = $this->Sites->recup_lien($TheChosenOne);
		
		$this->set('lien', $lien);
		
		
		//Récupération des statistiques
		$record = $this->Sites->recup_record($TheChosenOne);
		$this->set('record', $record);
		$record_type = $this->Sites->recup_record_type($TheChosenOne, $table[$TheChosenOne][2]);
		
		$total = 0;
		$max = 0;
		$min = 10000;
		
		for($i=0;$i<count($record_type);$i++)
		{
			$tmp = abs($record_type[$i][3]);
			$total += $tmp;
			if($tmp>$max) { $max=$tmp; }
			if($tmp<$min) { $min=$tmp; }
		}
		
		$nbreleve = count($record_type);
		$moyenne = round($total/$nbreleve, 2);
		
		$total_appro = 0;
		for($i=0;$i<count($lien);$i++) { $total_appro += $lien[$i][4]; }
		
		if($table[$TheChosenOne][2]=="consommateur") { $etat = "Consommation"; }
		if($table[$TheChosenOne][2]=="producteur") { $etat = "Production"; }
		
		
		$stat = ['tot'=>$total, 'max'=>$max, 'min'=>$min, 'moy'=>$moyenne, 'nbr'=>$nbreleve, 'totapp'=>$total_appro, 'etat'=>$etat];
		$this->set('stat', $stat);
		
		//debug($stat);
    }
}
?>