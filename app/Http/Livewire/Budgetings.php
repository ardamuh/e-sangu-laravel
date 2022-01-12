<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Budgeting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Budgetings extends Component
{
    public $budgetings, $budget_id, $month, $year, $user_id, $remaining_budget, $total_expenses, $total_budget;
    public $isModal = 0;
  	//FUNGSI INI UNTUK ME-LOAD VIEW YANG AKAN MENJADI TAMPILAN HALAMAN BUDGET
    public function render()
    {
        $user_id = Auth::user()->id;
        $this->budgetings = Budgeting::where("user_id", $user_id)->get(); //MEMBUAT QUERY UNTUK MENGAMBIL DATA
        return view('livewire.budgeting'); //LOAD VIEW MEMBERS.BLADE.PHP YG ADA DI DALAM FOLDER /RESOURSCES/VIEWS/LIVEWIRE
    }

    //FUNGSI INI AKAN DIPANGGIL KETIKA TOMBOL TAMBAH ANGGOTA DITEKAN
    public function create()
    {
        //KEMUDIAN DI DALAMNYA KITA MENJALANKAN FUNGSI UNTUK MENGOSONGKAN FIELD
        $this->resetFields();
        //DAN MEMBUKA MODAL
        $this->openModal();
    }

    //FUNGSI INI UNTUK MENUTUP MODAL DIMANA VARIABLE ISMODAL KITA SET JADI FALSE
    public function closeModal()
    {
        $this->isModal = false;
    }

    //FUNGSI INI DIGUNAKAN UNTUK MEMBUKA MODAL
    public function openModal()
    {
        $this->isModal = true;
    }

    //FUNGSI INI UNTUK ME-RESET FIELD/KOLOM, SESUAIKAN FIELD APA SAJA YANG KAMU MILIKI
    public function resetFields()
    {
        $this->month = '';
        $this->year = '';
        $this->user_id = '';
        $this->remaining_budget = '';
        $this->total_expenses = '';
        $this->total_budget = '';
    }

    //METHOD STORE AKAN MENG-HANDLE FUNGSI UNTUK MENYIMPAN / UPDATE DATA
    public function store()
    {
        //MEMBUAT VALIDASI
        $this->validate([
            'budget_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'user_id' => 'required',
            'remaining_budget' => 'required',
            'total_expenses' => 'required',
            'total_budget' => 'required',
        ]);

        //QUERY UNTUK MENYIMPAN / MEMPERBAHARUI DATA MENGGUNAKAN UPDATEORCREATE
        //DIMANA ID MENJADI UNIQUE ID, JIKA IDNYA TERSEDIA, MAKA UPDATE DATANYA
        //JIKA TIDAK, MAKA TAMBAHKAN DATA BARU
        Budgeting::updateOrCreate(['id' => $this->budget_id], [
            'month' => $this->month,
            'year' => $this->year,
            'user_id' => $this->user_id,
            'remaining_budget' => $this->remaining_budget,
            'total_expenses' => $this->total_expenses,
            'total_budget' => $this->total_budget,
        ]);

        //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
        session()->flash('message', $this->budget_id ? 'Data updated successfully.' : 'Data added successfully.');
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD
    }

    //FUNGSI INI UNTUK MENGAMBIL DATA DARI DATABASE BERDASARKAN ID MEMBER
    public function edit($id)
    {
        $budgeting = Budgeting::find($id); //BUAT QUERY UTK PENGAMBILAN DATA
        //LALU ASSIGN KE DALAM MASING-MASING PROPERTI DATANYA
        $this->budget_id = $id;
        $this->month = $budgeting->month;
        $this->year = $budgeting->year;
        $this->user_id = $budgeting->user_id;
        $this->remaining_budget = $budgeting->remaining_budget;
        $this->total_expenses = $budgeting->total_expenses;
        $this->total_budget = $budgeting->total_budget;

        $this->openModal(); //LALU BUKA MODAL
    }
}
