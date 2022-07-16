<?php

namespace App\Http\Livewire;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use phpDocumentor\Reflection\Types\This;

class Users extends Component
{
    public $isBtnAddClick = false;
    public $users =[];
    public $usersEdit =[];
    public $currentPage =PAGELIST;

    public function render()
    {
        return view('livewire.users.index',[
            'user'=>User::all()
        ])
            ->extends('layouts.admin')
            ->section('content');
    }

    public function  goToaddUser(){

         $this->currentPage = PAGECREATE;
    }
    protected $messages =[
        'users.name.required'=>'le nom est requis',
    ];

    public  function rules(){
        if($this->currentPage==PAGEEDIT){
            return  [
                'usersEdit.name'=>'required|string|min:3',
                'usersEdit.lastname'=>'required|string|min:3',
                'usersEdit.email'=>['required','email',Rule::unique("users","email")->ignore($this->usersEdit['id'])],
                'users.role'=>'required',
                'users.password'=>'required|min:8|same:users.password_confirm',
                'users.password_confirm'=>'required'
            ];
        }
        return  [
            'users.name'=>'required|string|min:3',
            'users.lastname'=>'required|string|min:3',
            'users.email'=>'required|email|unique:users',
            'users.role'=>'required',
            'users.password'=>'required|min:8|same:users.password_confirm',
            'users.password_confirm'=>'required'
        ];
    }
    public function register(){

        $this->validate();
        $data = array(
            "name"=>$this->users['name'],
            'lastname'=>$this->users['lastname'],
            'email'=>$this->users['email'],
            'role'=>$this->users['role'],
            'password'=>Hash::make($this->users['password']),
        );

        User::create($data);

         $this->users =[];
        $this->isBtnAddClick =false ;
         $this->dispatchBrowserEvent('showSuccessMessage',["message"=>"utilisateur creer avec success"]);
    }
    public function confirmDelete($id,$name){


       $this->dispatchBrowserEvent('showWarningMessage',["message"=> [
            "text"=>"Vous etes sur le point de supprimer $name  des'utilisateur. voulez-vous continuer",
            "title"=>"Etes-vous sur de continuer",
            "type"=>"warning",
            "data"=> [
                "user_id"=>$id
            ]
        ]

        ]);
    }
    public function deleteUser($id){
        if(Auth::user()->id !== $id){
            User::destroy($id);
            $this->dispatchBrowserEvent('showSuccessMessage',["message"=>"utilisateur supprimer avec success"]);
        }else{
            $this->dispatchBrowserEvent('showErrorMessage',["message"=>"impossible d'effacer l'utlisateur actuel"]);
        }


    }
    public function  backToList()
    {
        $this->currentPage = PAGELIST;
        $this->usersEdit=[];

    }
    public function  goToEdit($id)
    {
        $this->usersEdit = User::Find($id)->ToArray();
        $this->currentPage = PAGEEDIT;

    }
    public  function updateEdit(){
        $this->rules();
        $data = array(
            "name"=>$this->usersEdit['name'],
            'lastname'=>$this->usersEdit['lastname'],
            'email'=>$this->usersEdit['email'],
            'role'=>$this->usersEdit['role'],
            'password'=>Hash::make($this->usersEdit['password']),
        );
        user::find($this->usersEdit['id'])->update($data);
        $this->dispatchBrowserEvent('showSuccessMessage',["message"=>"utilisateur a ete modifier avec success"]);
        $this->backToList();
    }
}
