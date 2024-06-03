<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
abstract class Controller
{    
    static $eavs = [
        'nome', 'sobrenome', 'idade'
    ];
    /**
     * getRelation
     *
     * @return array
     */
    protected function map(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:15',
            'idade' => 'required|integer|min:0 | max:120',
        ]);
        $entity = [];
        foreach(self::$eavs as $attr){
            $entity[$attr] = $request->input($attr);
        }
        return $entity;
    }
}
