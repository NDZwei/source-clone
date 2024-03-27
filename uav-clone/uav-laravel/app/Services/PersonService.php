<?php

namespace App\Services;

use App\Repositories\PersonRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PersonService extends BaseService {

    private $userRepository;
    private $roleRepository;

    public function __construct(PersonRepository $repository,
                                UserRepository $userRepository,
                                RoleRepository $roleRepository)
    {
        parent::__construct($repository);
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function uploadAvatar(int $id, $avatar) {
        $person = $this->repository->getById($id);
        if($person != null) {
            $imagePath = 'images/persons/'.$id;
            if ($person->avatar) {
                $previousAvatar = basename($person->avatar);
                Storage::disk('public')->delete($imagePath.'/'.$previousAvatar);
            }
            $extension = $avatar->getClientOriginalExtension(); // .png, .jpeg...
            $avatarName = strtolower(preg_replace('/[^a-zA-Z0-9_]/', '_', pathinfo($avatar->getClientOriginalName(), PATHINFO_FILENAME)));
            $avatarName = $avatarName . '_' . time() . '.' .$extension;
            $avatar->storeAs($imagePath, $avatarName, 'public');
            $person->update(['avatar' => $avatarName]);
            return true;
        }
        return false;
    }

    public function save(array $data) {
        $userData = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        $user = $this->userRepository->save($userData);
        if(isset($data['roles'])) {
            $user->roles()->detach();
            $user->roles()->attach($data['roles']);
        } else {
            $rolePerson = $this->roleRepository->findByConditions([
                ['column' => 'name', 'operator' => 'LIKE', 'value' => 'ROLE_PILOT']
            ]);
            $user->roles()->detach();
            $user->roles()->attach($rolePerson);
        }
        $user->save();
        $data['user_id'] = $user->id;
        $person = $this->repository->save($data);
        // send mail verification
        Auth::login($user);
        $user->sendMailVerification();
        return $person;
    }

    public function verifyEmail(Request $request) {
        auth()->loginUsingId($request->route('id'));
        if ($request->route('id') != $request->user()->getKey()) {
            throw new AuthorizationException;
        }
        $user = $request->user();
        if ($user->hasVerifiedEmail()) {
            $message = "Email has been confirmed";
        } else if ($user->markEmailAsVerified()) {
            event(new Verified($user));
            $user->is_active = true;
            $user->save();
            $message = "Email verification successful";
        }

        return view('confirm-success', ['message' => $message]);

    }
}
