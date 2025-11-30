<?php
namespace Src\Infrastructure\Controllers;
use App\Models\Blocks;
use Illuminate\Http\Request;
use Src\Application\Traits\ApiResponse;


class BlockBondsController{

    use ApiResponse;

public function __invoke(int $userId, int $bonoId)
{
    // Busca el bloqueo específico del usuario y bono
     $deleted = Blocks::where('user_id', $userId)
                     ->where('bono_id', $bonoId)
                     ->delete();

    // Si no existía, crear uno nuevo
   if (!$deleted) {
        Blocks::create([
            'user_id' => $userId,
            'bono_id' => $bonoId,
            'bloqueo_vigente' => true
        ]);
    }

    // Retorna el estado actual
    return $this->success(
         ['visible' => !$deleted,
         "bono_bloqueado"=>true] ,
        "Operación ejecutada",
        200,
       // true si se creó, false si se eliminó
    );
}



}