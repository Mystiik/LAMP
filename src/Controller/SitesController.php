<?php
namespace App\Controller;
use App\Controller\AppController;

class SitesController extends AppController
{
	public function index()
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
				if($err==0)
				{
					$this->Sites->new_site($name, $type, $locx, $locy, $stock);
					$this->request->session()->write('success', 1);
				}
				
				$this->redirect(array('controller' => 'sites', 'action' => 'liste'));
				//debug($name);
			}
		}
		//debug($table);
		
		//Succès d'une requete utilisateur
		$session = $this->request->session();
		
		if($session->check('success'))
		{
			$this->set('success', 1);
			$session->delete('success');
		}
    }
	
	public function detail()
    {
		//Session start
		$session = $this->request->session();
		
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
				$session->write('TheChosenOne', $TheChosenOne);
				$this->set('TheChosenOne', $TheChosenOne);
			}
		}
		else
		{
			if($session->check('TheChosenOne'))
			{
				$TheChosenOne = $session->read('TheChosenOne');
			}
			else
			{
				$TheChosenOne = 1;
			}
			
			$this->set('TheChosenOne', $TheChosenOne);
		}
		
		//Récupération du lien
		$lien = $this->Sites->recup_lien($TheChosenOne);
		
		$this->set('lien', $lien);
		
		
		//Récupération des statistiques
		$record = $this->Sites->recup_record($TheChosenOne);
		$this->set('record', $record);
		$record_type = $this->Sites->recup_record_type($TheChosenOne, $table[$TheChosenOne-1][2]);
		
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
		
		if(count($record_type)!=0) { $moyenne = round($total/$nbreleve, 2); }
		else { $moyenne = 0; $min = 0; }
		
		$total_appro = 0;
		for($i=0;$i<count($lien);$i++) { $total_appro += $lien[$i][4]; }
		
		if($table[$TheChosenOne-1][2]=="consommateur") { $etat = "Consommation"; }
		if($table[$TheChosenOne-1][2]=="producteur") { $etat = "Production"; }
		
		
		$stat = ['tot'=>$total, 'max'=>$max, 'min'=>$min, 'moy'=>$moyenne, 'nbr'=>$nbreleve, 'totapp'=>$total_appro, 'etat'=>$etat];
		$this->set('stat', $stat);
		
		//debug($stat);
		
		//Succès d'une requete utilisateur
		if($session->check('success'))
		{
			$this->set('success', 1);
			$session->delete('success');
		}
    }
	
	public function acheminement()
    {
		//Session start
		$session = $this->request->session();
		
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
				$session->write('TheChosenOne', $TheChosenOne);
				$this->set('TheChosenOne', $TheChosenOne);
			}
		}
		else
		{
			if($session->check('TheChosenOne'))
			{
				$TheChosenOne = $session->read('TheChosenOne');
			}
			else
			{
				$TheChosenOne = 1;
			}
			
			$this->set('TheChosenOne', $TheChosenOne);
		}
		
		//Récupération du lien
		$lien = $this->Sites->recup_lien($TheChosenOne);
		
		$this->set('lien', $lien);
		
		
		//Récupération des statistiques
		$record = $this->Sites->recup_record($TheChosenOne);
		$this->set('record', $record);
		$record_type = $this->Sites->recup_record_type($TheChosenOne, $table[$TheChosenOne-1][2]);
		
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
		
		if(count($record_type)!=0) { $moyenne = round($total/$nbreleve, 2); }
		else { $moyenne = 0; $min = 0; }
		
		$total_appro = 0;
		for($i=0;$i<count($lien);$i++) { $total_appro += $lien[$i][4]; }
		
		if($table[$TheChosenOne-1][2]=="consommateur") { $etat = "Consommation"; }
		if($table[$TheChosenOne-1][2]=="producteur") { $etat = "Production"; }
		
		
		$stat = ['tot'=>$total, 'max'=>$max, 'min'=>$min, 'moy'=>$moyenne, 'nbr'=>$nbreleve, 'totapp'=>$total_appro, 'etat'=>$etat];
		$this->set('stat', $stat);
		
		//debug($stat);
		
		//Succès d'une requete utilisateur
		if($session->check('success'))
		{
			$this->set('success', 1);
			$session->delete('success');
		}
    }
	
	public function supprSite()
    {
		$here = explode("/", $this->request->here());
		
		if(isset($here[4]) and intval($here[4])!=0)
		{
			$this->loadModel('Sites');
			$this->Sites->suppr_site(intval($here[4]));
			
			$this->request->session()->write('success', 1);
			
			$TheChosenOne = 1;
			$session->write('TheChosenOne', $TheChosenOne);
			$this->set('TheChosenOne', $TheChosenOne);
		}
		$this->redirect(array('controller' => 'sites', 'action' => 'liste'));
    }
	
	public function supprRecord()
    {
		$here = explode("/", $this->request->here());
		
		if(isset($here[4]) and intval($here[4])!=0)
		{
			$this->loadModel('Sites');
			$this->Sites->suppr_record(intval($here[4]));
			
			$this->request->session()->write('success', 1);
		}
		$this->redirect(array('controller' => 'sites', 'action' => 'detail'));
    }
	
	public function modifSite()
    {
		//Event
		$here = explode("/", $this->request->here());
		
		if(isset($here[4]) and intval($here[4])!=0)
		{
			if($this->request->is('post'))
			{
				if(isset($this->request->data))
				{
					$name = $this->request->data['name'];
					$type = $this->request->data['type'];
					$locx = $this->request->data['locx'];
					$locy = $this->request->data['locy'];
					$stock = $this->request->data['stock'];
					$this->Sites->modif_site(intval($here[4]), $name, $type, $locx, $locy, $stock);
					
					$this->request->session()->write('success', 1);
				}
			}
		}
		$this->redirect(array('controller' => 'sites', 'action' => 'detail'));
    }
	
	public function ajoutReleve()
    {
		$here = explode("/", $this->request->here());
		
		if(isset($here[4]) and intval($here[4])!=0)
		{
			if($this->request->is('post'))
			{
				if(isset($this->request->data))
				{
					$date = date("Y-m-d H:i:s");
					$value = $this->request->data['valeur'];
					
					$this->Sites->new_record(intval($here[4]), $date, $value);
					
					$this->request->session()->write('success', 1);
				}
			}
		}
		$this->redirect(array('controller' => 'sites', 'action' => 'detail'));
    }
	
	public function ajoutLien()
    {
		$here = explode("/", $this->request->here());
		
		if(isset($here[4]) and intval($here[4])!=0)
		{
			if($this->request->is('post'))
			{
				if(isset($this->request->data))
				{
					$name = "LINK ".strval(20000+rand(0, 9999));
					
					if(isset($this->request->data['producteur']))
					{
						$this->Sites->new_lien($name, $this->request->data['producteur'], intval($here[4]));
						$this->request->session()->write('success', 1);
					}
					if(isset($this->request->data['consommateur']))
					{
						$this->Sites->new_lien($name, intval($here[4]), $this->request->data['consommateur']);
						$this->request->session()->write('success', 1);
					}
				}
			}
		}
		
		$this->redirect(array('controller' => 'sites', 'action' => 'detail'));
    }
}
?>