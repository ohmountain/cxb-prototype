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

    const REQUIRE_PARAMETER = 4042;

    const CREATED_PERSON_P = 4023;
    const CREATED_PERSON_N = 4024;
}