<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class Users extends Component
{
    public $isBtnAddClick = false;
    public $users =[];

    public function render()
    {
        return view('livewire.users.index',[
            'user'=>User::all()
        ])
            ->extends('layouts.admin')
            ->section('content');
    }

    public function  goToaddUser(){

        return $this->isBtnAddClick = true;
    }
    protected $messages =[
        'users.name.required'=>'le nom est requis',
    ];
    protected $rules =[
        'users.name'=>'required|string|min:3',
        'users.lastname'=>'required|string|min:3',
        'users.email'=>'required|email|unique:users',
        'users.role'=>'required',
        'users.password'=>'required|min:8|same:users.password_confirm',
        'users.password_confirm'=>'required'
    ];
    public function register(){

        $data = $this->validate();

        User::create($data['users']);

         $this->users =[];
         $this->dispatchBrowserEvent('showSuccessMessage',["message"=>"utilisateur creer avec success"]);
    }
    public function  backToList()
    {
        return $this->isBtnAddClick =false ;

    }
}
