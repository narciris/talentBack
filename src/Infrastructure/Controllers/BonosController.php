<?php
namespace Src\Infrastructure\Controllers;
 use App\Models\Bonos;
use Src\Application\Traits\ApiResponse;
use App\Models\Blocks;


 class BonosController  {
   use ApiResponse;


 public function __invoke() {
    $data = Bonos::where('tipos', 'bono_redimible')
        ->where('habilitada', true)
        ->whereDoesntHave('bloqueos', function($query) {
            $query->where('bloqueo_vigente', true);
        })
        ->with('bloqueos') 
        ->get();

    return $this->success($data, "bonos con blocks no vigentes retornados", 200);
}



}