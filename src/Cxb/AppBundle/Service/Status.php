<?php

namespace Cxb\AppBundle\Service;

class Status
{
    /**
     * P: Positive
     * N: Negative
     */

    /**
     * 返回获取状态
     */
    const SUCCESS           = "Success";
    const FAILURE           = "Failure";
    const INTERNAL_ERROR    = "Internal Error";

    const GET_PERSON_N = 4040;
    const GET_PERSON_P = 4041;

    const GET_PERSONS_N = 4042;
    const GET_PERSONS_P = 4043;

    const REQUIRE_PARAMETER = 4044;

    const CREATED_PERSON_P = 4025;
    const CREATED_PERSON_N = 4026;
}