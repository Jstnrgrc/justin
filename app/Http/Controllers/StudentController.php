<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return 'Display Students List';
    }

    public function store()
    {
        return 'Save Data students';
    }

    public function update($sid, $name)
    {
        return 'Update Data students with SID: ' . $sid . ' and name: ' . $name;
    }

     public function delete($sid)
    {
        return 'Delete Data students';
    }
}
