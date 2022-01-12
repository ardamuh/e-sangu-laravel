<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class Transactions extends Component
{
    public $transactions, $created_at, $amount, $user_id, $category;
    public $isModal = 0; 

    public function render()
    {
        $user_id = Auth::user()->id;
        $this->transactions = Transaction::where("user_id", $user_id)->get();
        return view('livewire.transactions');
    }

    public function openModal()
    {
        $this->isModal = true;
    }

    public function closeModal()
    {
        $this->isModal = false;
    }

    public function edit($id)
    {
        $transaction = Transaction::find($id); 
        $this->transaction_id = $id;
        $this->amount = $transaction->amount;
        $this->created_at = $transaction->created_at;
        $this->user_id = $transaction->user_id;
        $this->category = $transaction->category;

        $this->openModal(); //LALU BUKA MODAL
    }
}
