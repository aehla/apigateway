<?php

 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use Illuminate\Http\Response;
 use App\Traits\ApiResponser;
 use App\Services\User2Service;
 //use App\Models\User;


 Class User2Controller extends Controller {

    use ApiResponser;
    /**
     * The service to consume the User2 Microservice
     * @var User2Service
     */
    public $user2Service;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(User2Service $user2Service){
        $this->user2Service = $user2Service;
    }

    //INDEX

    public function index()
    {
        return $this->successResponse($this->user2Service->obtainUsers2());
        
    }
    

    //ADD USER

    public function add(Request $request ){
        return $this->successResponse($this->user2Service->createUser2($request->all(),Response::HTTP_CREATED));
    }

    //Show ID
    public function show($id)
    {
        return $this->successResponse($this->user2Service->obtainUser2($id));
    }

    //UPDATE USER
     public function update(Request $request,$id)
    {
        return $this->successResponse($this->user2Service->editUser2($request->all(),$id));
    }

    //DELETE

    public function delete($id)
    {
        return $this->successResponse($this->user2Service->deleteUser2($id));
    }
}