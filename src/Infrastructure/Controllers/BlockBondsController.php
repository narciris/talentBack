<?php
namespace Src\Infrastructure\Controllers;
use App\Models\Blocks;
use Illuminate\Http\Request;
use Src\Application\Traits\ApiResponse;


class BlockBondsController{

    use ApiResponse;

    public function __invoke(int $userId, int $bonoId)
    {
        $block = Blocks::where('user_id', $userId)
            ->where('bono_id', $bonoId)
            ->first();

        if ($block) {
            $block->delete();

            return $this->success(
                [
                    'visible' => true,
                    'bono_bloqueado' => false
                ],
                "Bloqueo eliminado",
                200
            );
        }

        $newBlock = Blocks::firstOrCreate(
            [
                'user_id' => $userId,
                'bono_id' => $bonoId
            ],
            [
                'bloqueo_vigente' => true
            ]
        );

        return $this->success(
            [
                'visible' => false,
                'bono_bloqueado' => true
            ],
            "Bloqueo creado",
            200
        );
    }



}
