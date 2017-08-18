<?php

namespace Cxb\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Cxb\AppBundle\Service\Status;
use Cxb\AppBundle\Service\Describe;

class PersonController extends Controller
{
    public function createAction(Request $request)
    {
        $name = $request->get("name");
        $sex  = $request->get("sex");
        $id_number = $request->get("id_number");
        $address = $request->get("address");

        $person_manager = $this->get("cxb_app.person_manager");
        $response = new JsonResponse();
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $content = [
            "code" => Status::CREATED_PERSON_P,
            "success" => Status::SUCCESS,
            "desc" => Describe::CREATE_PERSON_P
        ];

        if ($name == null || $sex == null || $id_number == null || $address == null) {
            $content["code"] = Status::REQUIRE_PARAMETER;
            $content["success"] = Status::FAILURE;
            $content["person"] = $person_manager->createEmpty();

            return $response->setContent(json_encode($content));
        }

        if ($person_manager->getByIdNumber($id_number)->getId() !== null) {
            $content["code"] = Status::CREATED_PERSON_N;
            $content["success"] = Status::FAILURE;
            $content["desc"] = Describe::PERSON_ID_NUMBER_EXISTS;
            $content["person"] = $person_manager->createEmpty();

            return $response->setContent(json_encode($content));
        }

        $person = $person_manager->create($name, $sex, $id_number, $address, md5(uniqid()));

        $content['person'] = $person;

        return $response->setContent(json_encode($content));
    }

    public function getByIdAction(int $id)
    {
        $person_manager = $this->get("cxb_app.person_manager");
        $person = $person_manager->get($id)->toArray();
        $response = new JsonResponse();

        $content = [
            "code" => Status::INTERNAL_ERROR,
            "success" => Status::SUCCESS,
            "desc" => Describe::GET_PERSON_P,
            "person" => $person
        ];

        $content["code"] = $person["id"] === null ? Status::GET_PERSON_N : Status::GET_PERSON_P;
        $content["desc"] = $person["id"] === null ? Describe::GET_PERSON_N : Describe::GET_PERSON_P;
        $content["success"] = $person["id"] === null ? Status::FAILURE : Status::SUCCESS;

        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($content));

        return $response;
    }

    public function getByTokenAction(string $token)
    {
        $person_manager = $this->get("cxb_app.person_manager");
        $person = $person_manager->getByToken($token)->toArray();
        $response = new JsonResponse();

        $content = [
            "code" => Status::INTERNAL_ERROR,
            "success" => Status::SUCCESS,
            "desc" => Describe::GET_PERSON_P,
            "person" => $person
        ];

        $content["code"] = $person["id"] === null ? Status::GET_PERSON_N : Status::GET_PERSON_P;
        $content["desc"] = $person["id"] === null ? Describe::GET_PERSON_N : Describe::GET_PERSON_P;
        $content["success"] = $person["id"] === null ? Status::FAILURE : Status::SUCCESS;

        $response->setContent(json_encode($content));

        return $response;
    }

    public function paginationAction(int $page, int $count)
    {
        $person_manager = $this->get("cxb_app.person_manager");
        $response       = new JsonResponse();
        $data           = $person_manager->pagination($page, $count);

        $content = [
            "code" => Status::GET_PERSONS_P,
            "success" => Status::SUCCESS,
            "desc" => Describe::GET_PERSON_P,
            "page" => $data->page,
            "max_page" => $data->max_page,
            "count" => $data->count,
            "max_count" => $data->max_count,
            "persons" => ($data->toArray)()
        ];

        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response->setContent(json_encode($content));
    }
}