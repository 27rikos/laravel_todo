<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth as FacadesAuth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.login')]
class Auth extends Component
{
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.auth');
    }

    public function login()
    {
        $credential = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (FacadesAuth::attempt($credential)) {
            session()->regenerate();
            return $this->redirect('todo', navigate: true);
        }

        return back()->with('error', 'Login Failed');
    }
}