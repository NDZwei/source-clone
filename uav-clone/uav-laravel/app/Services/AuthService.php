<?php

namespace App\Services;

use App\Http\Resources\RoleResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class AuthService {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request)
    {
        $usernamePassword = $request->only('email', 'password');
        if (!Auth::attempt($usernamePassword)) {
            return [
                'status' => Response::HTTP_UNAUTHORIZED,
                'message' => 'Unauthorized',
                'data' => null,
            ];
        }
        $user = auth()->user();
        if ($user && $user->is_active) {
            $token = $user->createToken($user)->accessToken;
            return [
                'status' => Response::HTTP_OK,
                'message' => 'Successfully',
                'data' => [
                    'access_token' => $token,
                    'email' => $user->email,
                    'roles' => RoleResource::collection($user->roles),
                ],
            ];
        } else {
            return [
                'status' => Response::HTTP_BAD_REQUEST,
                'message' => 'User not active',
                'data' => null,
            ];
        }
    }

    public function fotgotPassword($email) {
        $user = $this->userRepository->getUserByEmail($email);
        if($user) {
            $token = $this->createToken($user);
            $actionUrl = url(route('password.reset', [
                'token' => $token,
                'email' => $email
            ], false));

            Mail::send('emails.reset-password', ['reset_url' => $actionUrl], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Reset password');
            });
        }
    }

    public function resetPassword(array $request) {

    }
}
