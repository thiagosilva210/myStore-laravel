<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use DB;

class DashboardController extends Controller
{
    //
    public function index(){
        $users = User::all()->count();

        //grafico 1 -usuários
        $usersData = User::select([
            DB::raw('YEAR(created_at) as year'),
            DB::raw('COUNT(*)as total')
        ])

        ->groupBy('year')
        ->orderBy('year', 'asc')
        ->get();

        //prepare arrays

        foreach($usersData as $user){

            $year[] = $user->year;
            $total[] = $user->total;
        }
            //formatar para chratjs

            $userLabel = "'Comparativo de cadastros de usuários'";
            $userYear = implode(',', $year);
            $userTotal = implode(',', $total);


        //gráfico 2 - categorias

       // $catData = Category::all();
       $catData = Category::with('products')->get();

        //preparar array
        foreach($catData as $cat){
            $catName[] = "'".$cat->name."'";
        //    $catTotal[] = Product::where('id_category', $cat->id)->count();
        $catTotal[] = $cat->products->count();
        }


        //formatar para chartjs
        $catLabel = implode(',', $catName);
        $catTotal = implode(',', $catTotal);

    

        return view('admin.dashboard', compact('users', 'userLabel', 'userYear', 'userTotal', 'catLabel', 'catTotal'));
    }
}
