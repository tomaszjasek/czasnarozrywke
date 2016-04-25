<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\EventListener;

use AppBundle\Entity\User;
use AppBundle\Services\DisciplineService;
use AppBundle\Services\StateService;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class InterestsListener implements EventSubscriberInterface
{
    protected $disciplineService;

    protected $stateService;

    public function __construct(
        DisciplineService $disciplineService,
        StateService $stateService
    ) {
        $this->disciplineService = $disciplineService;
        $this->stateService = $stateService;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_INITIALIZE => 'onRegistrationInit',
            FOSUserEvents::PROFILE_EDIT_INITIALIZE => 'onRegistrationInit',
            FormEvents::PRE_SUBMIT => 'onPreSubmit'
        );
    }

    public function onRegistrationInit(GetResponseUserEvent $event)
    {
        /** @var User $user */
        $user = $event->getUser();

        $userInterests = [];
        $request = $event->getRequest();
        if($request->request->has('fos_user_registration_form')) {
            $formData = $request->request->get('fos_user_registration_form');
            if(array_key_exists('interests', $formData)) {
                $interests = $formData['interests'];
                foreach($interests as $key => $interest) {
                    $userInterest = [];
                    if(array_key_exists('discipline', $interest) && $interest['discipline']) {
                        $userInterest['discipline'] = $this->disciplineService->getDiscipline($key);
                        if(array_key_exists('state', $interest) && $interest['state']) {
                            $userInterest['state'] = $this->stateService->getState((int)$interest['state']);
                        }
                        if(array_key_exists('city', $interest) && $interest['city']) {
                            $userInterest['city'] = $interest['city'];
                        }
                    }
                    if(count($userInterest) > 0) {
                        $userInterests[] = $userInterest;
                    }
                }
            }
        }

        if(count($userInterests) > 0) {
            $user->setInterests($userInterests);
        }
    }

    public function onPreSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $userInterests = [];
        foreach($data as $key => $interest) {
            $userInterest = [];
            if(array_key_exists('discipline', $interest) && $interest['discipline']) {
                $userInterest['discipline'] = $this->disciplineService->getDiscipline($key);
                if(array_key_exists('state', $interest) && $interest['state']) {
                    $userInterest['state'] = $this->stateService->getState((int)$interest['state']);
                }
                if(array_key_exists('city', $interest) && $interest['city']) {
                    $userInterest['city'] = $interest['city'];
                }
            }
            if(count($userInterest) > 0) {
                $userInterests[] = $userInterest;
            }
        }

        $form = $event->getForm();
        $form->setData($userInterests);
    }
}
