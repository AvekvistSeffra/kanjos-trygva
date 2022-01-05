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


    // single user
    // public function check()
    // {
    //     $model = new UserModel();
    //     $email = $this->request->getVar('email');
    //     $password = $this->request->getVar('password');

    //     $data = $model->where('email', $email)->first();
    //     if ($data) {
    //         if ($data["password"] == $password) {
    //             return "User found!";
    //         }
    //     } else {
    //         return "User NOT found!";
    //     }
    //     return "User NOT found!";
    // }

    // update
    // public function update($id = null)
    // {
    //     $model = new UserModel();
    //     $id = $this->request->getVar('id');
    //     $data = [
    //         'name' => $this->request->getVar('name'),
    //         'email'  => $this->request->getVar('email'),
    //         'password'  => $this->request->getVar('password')
    //     ];
    //     $model->update($id, $data);
    //     $response = [
    //         'status'   => 200,
    //         'error'    => null,
    //         'messages' => [
    //             'success' => 'Employee updated successfully'
    //         ]
    //     ];
    //     return $this->respond($response);
    // }

    // // delete
    // public function delete($id = null)
    // {
    //     $model = new UserModel();
    //     $data = $model->where('id', $id)->delete($id);
    //     if ($data) {
    //         $model->delete($id);
    //         $response = [
    //             'status'   => 200,
    //             'error'    => null,
    //             'messages' => [
    //                 'success' => 'Employee successfully deleted'
    //             ]
    //         ];
    //         return $this->respondDeleted($response);
    //     } else {
    //         return $this->failNotFound('No employee found');
    //     }
    // }
}

    /**
     * Get a single client by ID
     */
    // public function show($id)
    // {
    //     try {

    //         $model = new ClientModel();
    //         $client = $model->findUserById($id);

    //         return $this->getResponse(
    //             [
    //                 'message' => 'Client retrieved successfully',
    //                 'client' => $client
    //             ]
    //         );

    //     } catch (Exception $e) {
    //         return $this->getResponse(
    //             [
    //                 'message' => 'Could not find client for specified ID'
    //             ],
    //             ResponseInterface::HTTP_NOT_FOUND
    //         );
    //     }
    // }
