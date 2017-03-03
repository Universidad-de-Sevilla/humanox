<?php

namespace US\Humanox\Controller;

use US\Humanox\Entity\Unit\Unit;
use US\Humanox\Repository\UnitRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UnitController
{

    /**
     * @var unitRepository
     */
    protected $unitRepository;

    /**
     * @param UnitRepository $unitRepository
     */
    function __construct(UnitRepository $unitRepository)
    {
        $this->unitRepository = $unitRepository;
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
        $orderBy = array('shortName' => 'ASC');
        $currentPage = $page;
        $numPages = 0;
        $total = $this->unitRepository->count();
        if ($total > 0) {
            $numPages = ceil($total / $limit);
            if ($currentPage < 1) {
                $currentPage = 1;
            } else if ($currentPage > $numPages) {
                $currentPage = $numPages;
            }
            $offset = ($currentPage - 1) * $limit;
            $units = $this->unitRepository->findBy($criteria, $orderBy, $limit, $offset);
        } else {
            $units = null;
        }

        return $app['twig']->render('unit/unit_index.html.twig', array(
            'units' => $units,
            'currentPage' => $currentPage,
            'numPages' => $numPages,
            'url' => $app['url_generator']->generate('units'),
        ));
    }

    /**
     * @param Application $app
     * @param $id
     * @return Response/RedirectResponse
     */
    public function viewAction(Application $app, $id)
    {
        /** @var Unit $unit */
        $unit = $this->unitRepository->find($id);
        if ($unit) {
            $response = $app['twig']->render('unit/unit_view.html.twig', array(
                'unit' => $unit
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
        return $app->redirect($app['url_generator']->generate('units'));
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return RedirectResponse
     */
    public function saveAction(Request $request, Application $app)
    {
        $data['endDate'] = $request->get('endDate');
        $data['longName'] = $request->get('longName');
        $data['miniName'] = $request->get('miniName');
        $data['notes'] = $request->get('notes');
        $data['shortName'] = $request->get('shortName');
        $data['startDate'] = $request->get('startDate');

        if ($data['id'] = $request->get('id')) {
            /** @var Unit $unit */
            $unit = $this->unitRepository->find($data['id']);
            $unit->setEndDate($data['endDate']);
            $unit->setLongName($data['longName']);
            $unit->setMiniName($data['miniName']);
            $unit->setNotes($data['notes']);
            $unit->setShortName($data['shortName']);
            $unit->setStartDate($data['startDate']);
            $message = "Unit data has been updated"; // in case of success
            $redirect = $app['url_generator']->generate('unit_edit', $data); // in case of failure
        } else {
            $unit = new Unit($data);
            $message = "Unit has been created"; // in case of success
            $redirect = $app['url_generator']->generate('unit_add'); // in case of failure
        }
        $this->unitRepository->save($unit);

        // Valida los datos
        // http://silex.sensiolabs.org/doc/providers/validator.html
        /** @var array(ConstraintViolation) $errors */
        $errors = $app['validator']->validate($unit);

        // Check for failure or success
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                $message = $error->getPropertyPath() . ' ' . $error->getMessage();
                $app['session']->getFlashBag()->add('danger', $message);
            }
        } else {
            $this->unitRepository->save($unit);
            $app['session']->getFlashBag()->add('success', $message);
            $redirect = $app['url_generator']->generate('unit_view', array('id' => $unit->getId()));
        }

        return $app->redirect($redirect);
    }

    /**
     * @param Application $app
     * @return Response
     */
    public function addAction(Application $app)
    {
        return $app['twig']->render('unit/unit_add.html.twig');
    }

    /**
     * @param Application $app
     * @param int $id
     * @return Response/ResponseRedirect
     */
    public function editAction(Application $app, $id)
    {
        /** @var Unit $unit */
        $unit = $this->unitRepository->find($id);
        if ($unit) {
            $response = $app['twig']->render('unit/unit_edit.html.twig', array(
                'unit' => $unit));
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
        /** @var Unit $unit */
        $unit = $this->unitRepository->find($id);
        if ($unit) {
            $this->unitRepository->delete($unit);
            $response = $app->redirect($app['url_generator']->generate('units'));
        } else {
            $response = $this->redirectOnInvalidId($app, $id);
        }

        return $response;
    }

}