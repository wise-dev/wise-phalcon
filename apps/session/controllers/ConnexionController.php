<?php

/**
 * SessionController
 *
 * Allows to authenticate user
 */
namespace Wise\Session\Controllers;
use Wise\Library\Encryption as Encryption;
use Wise\Session\Models\User as User;

class ConnexionController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Session');
        parent::initialize();
    }
    

    public function indexAction()
    {
        
        $auth = $this->session->get('auth');
        if($auth) return $this->response->redirect("profile/index");
        else return $this->response->redirect("session/connexion/signin");
    }

    /**
     * Register an authenticated user into session data
     *
     * @param User $user
     */
    private function _registerSession(User $user)
    {
        $this->session->set('auth', array(
            'id' => $user->id,
            'username' => $user->username,
            'fname' => $user->first_name,
            'lname' => $user->lastname,
            'role' => array(),
            'image'=>$user->image
        ));
        $picture_url=APP_PATH.'/public/avatars/'.$user->image;
        
        if ($user->image == '' || !file_exists($picture_url)){
            $auth = $this->session->get('auth');
            $auth['image']='user.jpg';
            $this->session->set('auth', $auth);
        }
    }

    /**
     * This action authenticate and logs an user into the application
     *
     */
    public function signinAction()
    {
        echo "string";
        $auth = $this->session->get('auth'); 
        if($auth) return $this->response->redirect("profile/index");

        if ($this->request->isPost()) {

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $encryption=new Encryption($username);
            $crypted_password=$encryption->encrypt($password);
            $user = User::findFirst(
                array(
                "( email = :email: OR username = :email: ) AND password = :password: ",
                'bind' => array('email' => $username, 'password' => $password)
            ));

            if ($user != false) {
                $this->_registerSession($user);
                return $this->response->redirect("profile");
            }else{
                echo "string";
                $this->flashSession->error('
                    <button class="close" data-close="alert"></button>
                    <span>Username or password incorect.</span>'
                );
            }
           
        }
    }

    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function endAction()
    {
        $this->session->remove('auth');
        return $this->response->redirect("session/connexion");
    }
}