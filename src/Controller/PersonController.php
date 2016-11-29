<?php
/**
 * Portus - PersonController.php
 * Developed by Juanan Ruiz
 * Created 9/5/16 - 16:55
 */

namespace US\Portus\Controller;

use US\Portus\Entity\Person\Person;
use US\Portus\Repository\PersonRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonController
{

    /**
     * @var personRepository
     */
    protected $personRepository;

    /**
     * @param PersonRepository $personRepository
     */
    function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * function indexAction
     * @param Application $app
     * @param int $page
     * @param int $limit
     * @return Response
     */
    public function indexAction(Application $app, $page, $limit)
    {
        $criteria = array();
        $orderBy = array('lastName' => 'ASC');
        $currentPage = $page;
        $numPages = 0;
        $total = $this->personRepository->count();
        if ($total > 0) {
            $numPages = ceil($total / $limit);
            if ($currentPage < 1) {
                $currentPage = 1;
            } else if ($currentPage > $numPages) {
                $currentPage = $numPages;
            }
            $offset = ($currentPage - 1) * $limit;
            $people = $this->personRepository->findBy($criteria, $orderBy, $limit, $offset);
        } else {
            $people = null;
        }

        return $app['twig']->render('person/person_index.html.twig', array(
            'people' => $people,
            'currentPage' => $currentPage,
            'numPages' => $numPages,
            'url' => $app['url_generator']->generate('people'),
        ));
    }

    /**
     * @param Application $app
     * @param $id
     * @return Response/RedirectResponse
     */
    public function viewAction(Application $app, $id)
    {
        /** @var Person $person */
        $person = $this->personRepository->find($id);
        if ($person) {
            $response = $app['twig']->render('person/person_view.html.twig', array(
                'person' => $person
            ));
        } else {
            $response = $this->redirectOnInvalidId($app, $id);
        }

        return $response;
    }

    /**
     * @param Application $app
     * @param $id
     * @return RedirectResponse
     */
    private function redirectOnInvalidId(Application $app, $id)
    {
        $message = "There is no record for ID " . $id;
        $app['session']->getFlashBag()->add('danger', $message);
        return $app->redirect($app['url_generator']->generate('people'));
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return RedirectResponse
     */
    public function saveAction(Request $request, Application $app)
    {
        $data['firstName'] = $request->get('firstName');
        $data['lastName'] = $request->get('lastName');
        $data['email'] = $request->get('email');
        $data['gender'] = $app['repository.gender']->find($request->get('genderId'));

        if ($data['id'] = $request->get('id')) {
            /** @var Person $person */
            $person = $this->personRepository->find($data['id']);
            $person->setFirstName($data['firstName']);
            $person->setLastName($data['lastName']);
            $person->setEmail($data['email']);
            $person->setGender($data['gender']);
            $message = "Person data has been updated"; // in case of success
            $redirect = $app['url_generator']->generate('person_edit', $data); // in case of failure
        } else {
            $data['startDate'] = new \DateTime();
            $person = new Person($data);
            $message = "Person has been created"; // in case of success
            $redirect = $app['url_generator']->generate('person_add'); // in case of failure
        }
        $this->personRepository->save($person);

        // Valida los datos
        // http://silex.sensiolabs.org/doc/providers/validator.html
        /** @var array(ConstraintViolation) $errors */
        $errors = $app['validator']->validate($person);

        // Check for failure or success
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                $message = $error->getPropertyPath() . ' ' . $error->getMessage();
                $app['session']->getFlashBag()->add('danger', $message);
            }
        } else {
            $this->personRepository->save($person);
            $app['session']->getFlashBag()->add('success', $message);
            $redirect = $app['url_generator']->generate('person_view', array('id' => $person->getId()));
        }

        return $app->redirect($redirect);
    }

    /**
     * @param Application $app
     * @return Response
     */
    public function addAction(Application $app)
    {
        $genders = $app['repository.gender']->findAll();
        return $app['twig']->render('person/person_add.html.twig', array('genders' => $genders));
    }

    /**
     * @param Application $app
     * @param int $id
     * @return Response/ResponseRedirect
     */
    public function editAction(Application $app, $id)
    {
        /** @var Person $person */
        $person = $this->personRepository->find($id);
        if ($person) {
            $response = $app['twig']->render('person/person_edit.html.twig', array(
                'person' => $person));
        } else {
            $response = $this->redirectOnInvalidId($app, $id);
        }

        return $response;
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return RedirectResponse
     */
    public function deleteAction(Request $request, Application $app)
    {
        $id = $request->get('id');
        /** @var Person $person */
        $person = $this->personRepository->find($id);
        if ($person) {
            $this->personRepository->delete($person);
            $response = $app->redirect($app['url_generator']->generate('people'));
        } else {
            $response = $this->redirectOnInvalidId($app, $id);
        }

        return $response;
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return Response/ResponseRedirect
     */
    public function photoEditAction(Request $request, Application $app)
    {
        $id = $request->get('id');
        /** @var Person $person */
        $person = $this->personRepository->find($id);
        if ($person) {
            $response = $app['twig']->render('person/photo_edit.html.twig', array(
                'person' => $person,
            ));
        } else {
            $response = $this->redirectOnInvalidId($app, $id);
        }

        return $response;
    }

    // TODO: está función viene tal cual de otra app y hay que hacerle algunos ajuestes
    public function photoSaveAction(Request $request, Application $app)
    {
        $personId = $request->get('id_person');
        $imageBase64 = $request->get('image');
//        $personId = filter_input(INPUT_POST, 'id_person', FILTER_SANITIZE_NUMBER_INT);
//        $imageBase64 = filter_input(INPUT_POST, 'image');

        if ($personId && $imageBase64) {
            $filename = CC_DIR_PRIVATE_UPLOAD . CC_DIR_FOTO_PERSONA . $personId . ".jpg";
            // Extract the string "data:image/jpeg;base64," from $imageBase64
            $imageBase64Exploded = explode(',', $imageBase64);
            $imageString = $imageBase64Exploded[1];
            file_put_contents($filename, base64_decode($imageString));
            $redirect = $app['url_generator']->generate('person_edit', array('id' => $personId));
            $location = "index.php?page=person/person_editar&id=$personId";
        } else {
            $redirect = $app['url_generator']->generate('person_edit', array('id' => $personId));
            $message = "Faltan datos.";
            $location = "index.php?page=person/person_editar&id=$personId&mensaje=$message";
        }
        $response = $app->redirect($redirect);

        return $response;
    }
}