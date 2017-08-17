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
        $addrss = $request->get("address");

        $person_manager = $this->get("cxb_app.person_manager");
        $response = new JsonResponse();

        $content = [
            "code" => Status::CREATED_PERSON_P,
            "success" => Status::SUCCESS,
            "desc" => Describe::CREATE_PERSON_SUCCESS
        ];

        if ($name == null || $sex == null || $id_number == null || $address == null) {
            $content["code"] = Status::REQUIRE_PARAMETER;
            $content["success"] = Status::FAILURE;
            $content["person"] = $person_manager->createEmpty();

            return $response->setContent(json_encode($content));
        }

        if ($person_manager->getByIdNumber($id_number) !== null) {
            $content["code"] = Status::REQUIRE_PARAMETER;
            $content["success"] = Status::FAILURE;
            $content["person"] = $person_manager->createEmpty();

            return $response->setContent(json_encode($content));
        }
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
            "Person" => $person
        ];

        $content["code"] = $person["id"] === null ? Status::GET_PERSON_N : Status::GET_PERSON_P;
        $content["desc"] = $person["id"] === null ? Describe::GET_PERSON_N : Describe::GET_PERSON_P;
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
            "Person" => $person
        ];

        $content["code"] = $person["id"] === null ? Status::GET_PERSON_N : Status::GET_PERSON_P;
        $content["desc"] = $person["id"] === null ? Describe::GET_PERSON_N : Describe::GET_PERSON_P;
        $response->setContent(json_encode($content));

        return $response;
    }
}