<?php

namespace App\Http\Controllers;

use App\Services\PersonService;
use Exception;
use Illuminate\Http\Request;

class PersonController extends BaseController {
    public function __construct(PersonService $service)
    {
        parent::__construct($service);
        $this->middleware('signed')->only('verify');
    }

    public function uploadAvatar(int $id, Request $request) {
        try {
            if($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $result = $this->service->changeAvatar($id, $avatar);
                if($result === true) {
                    return $this->getResponse200();
                }
            }
            return $this->getResponse500("Change avatar error");
        } catch (Exception $e) {
            return $this->getResponse500($e->getMessage());
        }
    }


    public function verifyEmail(Request $request) {
        try {
            return $this->service->verifyEmail($request);
        } catch (Exception $e) {
            return $this->getResponse500($e->getMessage());
        }
    }
}
