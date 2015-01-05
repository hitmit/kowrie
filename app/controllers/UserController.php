<?php

class UserController extends BaseController
{

    protected $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    


    public function getLogin()
    {
        return View::make("site/user/login");
    }

    public function postLogin()
    {
//        try {
//            $this->rules->validate($input = Input::only('email', 'password'));
//            Sentry::authenticate($input, Input::has('remember'));
//        } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
//            return Redirect::back()->withInput()->withErrorMessage('Invalid credentials provided');
//        } catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e) {
//            return Redirect::back()->withInput()->withErrorMessage('User Not Activated.');
//        } catch (\Laracasts\Validation\FormValidationException $e) {
//            return Redirect::back()->withInput()->withErrors($e->getErrors());
//        }
//        // Logged in successfully - redirect based on type of user
//        $user = Sentry::getUser();
//        $admin = Sentry::findGroupByName('admins');
//        $users = Sentry::findGroupByName('users');
//        if ($user->inGroup($admin))
//            return Redirect::intended('admin');
//        elseif ($user->inGroup($users))
//            return Redirect::intended('user');
//        else
//            return Redirect::intended('/');
    }

}
