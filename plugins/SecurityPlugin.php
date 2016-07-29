<?php

namespace Wise\Plugins;
use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;

/**
 * SecurityPlugin
 *
 * This is the security plugin which controls that users only have access to the modules they're assigned to
 */
class SecurityPlugin extends Plugin
{
	/**
	 * Returns an existing or new access control list
	 *
	 * @returns AclList
	 */
	public function getAcl()
	{
		if (!isset($this->persistent->acl)) {

			$acl = new AclList();

			$acl->setDefaultAction(Acl::DENY);

			// Register roles
			$roles = [
				'admin'  => new Role(
					'Admin',
					'Utilisateur avec tous les droits d\'accès'
				),
				'superviseur'  => new Role(
					'Superviseur',
					'Utilisateur avec les accès en ajout,ecture, modification sur les RDV'
				),
				'partenaire'  => new Role(
					'Partenaire',
					'Utilisateur avec accès lecture et modification sur les RDV'
				),
				'agent' => new Role(
					'Agent',
					'Utilisateur avec acces en lecture sur ses RDV'
				),
				'public' => new Role(
					'Public',
					'Utilisateur avec accès à la page de connexion'
				)
			];

			foreach ($roles as $role) {
				$acl->addRole($role);
			}

			//Admin area resources
			$adminResources = array(
				'user'    	=> array('index','new','create','save','delete','edit'),
				'rdv'	  	=> array('index','new','create','save','delete','edit','details','upload'),
				'dashboard' => array('index','profile'),
			);
			foreach ($adminResources as $resource => $actions) {
				$acl->addResource(new Resource($resource), $actions);
			}

			//Superviseur area resources
			$superviserResources = array(
				'rdv'	    => array('index','new','create','edit','save','details'),
				'dashboard' => array('index','profile'),
			);
			foreach ($superviserResources as $resource => $actions) {
				$acl->addResource(new Resource($resource), $actions);
			}

			//Partenaire area resources
			$partenaireResources = array(
				'rdv'	    => array('index','edit','save','details'),
				'dashboard' => array('index','profile'),
			);
			foreach ($partenaireResources as $resource => $actions) {
				$acl->addResource(new Resource($resource), $actions);
			}


			//Agent area resources
			$agentResources = array(
				'rdv'	    => array('index','details'),
				'dashboard' => array('index','profile'),
			);
			foreach ($agentResources as $resource => $actions) {
				$acl->addResource(new Resource($resource), $actions);
			}

			//Public area resources
			$publicResources = array(
				'index'      => array('index'),
				'errors'     => array('show401', 'show404', 'show500'),
				'session'    => array('index', 'connexion' , 'end')
			);
			foreach ($publicResources as $resource => $actions) {
				$acl->addResource(new Resource($resource), $actions);
			}

			//PUBLIC
			foreach ($roles as $role) {
				foreach ($publicResources as $resource => $actions) {
					foreach ($actions as $action){
						$acl->allow($role->getName(), $resource, $action);
					}
				}
			}

			//AGENT
			foreach ($agentResources as $resource => $actions) {
				foreach ($actions as $action){
					$acl->allow('Agent', $resource, $action);
				}
			}

			//PARTENAIRE
			foreach ($partenaireResources as $resource => $actions) {
				foreach ($actions as $action){
					$acl->allow('Partenaire', $resource, $action);
				}
			}

			//SUPERVISEUR
			foreach ($superviserResources as $resource => $actions) {
				foreach ($actions as $action){
					$acl->allow('Superviseur', $resource, $action);
				}
			}

			//SUPERVISEUR
			foreach ($adminResources as $resource => $actions) {
				foreach ($actions as $action){
					$acl->allow('Admin', $resource, $action);
				}
			}

			//The acl is stored in session, APC would be useful here too
			$this->persistent->acl = $acl;
		}

		return $this->persistent->acl;
	}

	/**
	 * This action is executed before execute any action in the application
	 *
	 * @param Event $event
	 * @param Dispatcher $dispatcher
	 * @return bool
	 */
	public function beforeDispatch(Event $event, Dispatcher $dispatcher)
	{
		$auth = $this->session->get('auth');
		$role='Public';
		if ($auth){
			$role = $auth['role'];
		}
		$controller = $dispatcher->getControllerName();
		$action = $dispatcher->getActionName();

		$acl = $this->getAcl();

		if (!$acl->isResource($controller)) {
			$dispatcher->forward([
				'controller' => 'errors',
				'action'     => 'show404'
			]);

			return false;
		}
		
		$allowed = $acl->isAllowed($role, $controller, $action);
		if ($allowed != Acl::ALLOW) {
			$dispatcher->forward(array(
				'controller' => 'errors',
				'action'     => 'show401'
			));
			return false;
		}
		
	}
}
