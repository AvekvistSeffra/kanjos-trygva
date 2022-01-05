<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Users extends BaseController
{
    use ResponseTrait;

    /**
     * Get all Users
     * @return Response
     */
    public function index()
    {
        $model = new UserModel();
        return $this->getResponse(
            [
                'message' => 'Users retrieved successfully',
                'users' => $model->findAll()
            ]
        );
    }

    /**
     * Create a new User
     */
    public function store()
    {
        $input = $this->getRequestInput($this->request);

        $userEmail = $input['email'];

        $model = new UserModel();
        $model->save($input);

        $user = $model->where('email', $userEmail)->first();

        return $this->getResponse(
            [
                'message' => 'user added successfully',
                'user' => $user
            ]
        );
    }

    /**
     * Get a single user by ID
     */
    public function show($id)
    {
        try {
            $model = new UserModel();
            $user = $model->findUserById($id);

            return $this->getResponse(
                [
                    'message' => 'User retrieved successfully',
                    'user' => $user
                ]
            );
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'message' => 'Could not find user for specified ID'
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }

    public function update($id)
    {
        try {

            $model = new UserModel();
            $model->findUserById($id);

            $input = $this->getRequestInput($this->request);

            $model->update($id, $input);
            $user = $model->findUserById($id);

            return $this->getResponse(
                [
                    'message' => 'User updated successfully',
                    'user' => $user
                ]
            );
        } catch (Exception $exception) {

            return $this->getResponse(
                [
                    'message' => $exception->getMessage()
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }

    public function destroy($id)
    {
        try {
            $model = new UserModel();
            $user = $model->findUserById($id);
            $model->delete($user);

            return $this
                ->getResponse(
                    [
                        'message' => 'User deleted successfully',
                    ]
                );
        } catch (Exception $exception) {
            return $this->getResponse(
                [
                    'message' => $exception->getMessage()
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
}

