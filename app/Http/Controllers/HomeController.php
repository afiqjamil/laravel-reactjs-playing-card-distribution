<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function distribute()
    {
        $number_of_player = request('player');
        $players = range(1, $number_of_player);

        $card_stacks = self::cards();
        $total_cards = count($card_stacks);

        // shuffle cards
        shuffle($card_stacks);

        // count number of card per player
        $card_per_person = floor($total_cards / $number_of_player);
        $card_per_person = ($card_per_person < 1) ? 1 : intval($card_per_person);

        $player_result = [];

        foreach ($players as $player)
        {
            $card_set = [];
            for ($i=1; $i <= $card_per_person; $i++){

                if (count($card_stacks) > 0) {
                    // pick first card and remove it from stack
                    $pick = array_shift($card_stacks);

                    if ($pick)
                    {
                        array_push($card_set, $pick);
                    }
                }

            }

            array_push($player_result, ['player' => $player, 'cards' => $card_set]);
        }

        return response()->json([
            'status' => true,
            'result' => $player_result
        ]);
    }

    static function cards()
    {
        $card_type = [
            'spade' => 'S',
            'heart' => 'H',
            'diamond' => 'D',
            'club' => 'C'
        ];

        $numbers = [
            1 => 'A',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
            10 => 'X',
            11 => 'J',
            12 => 'Q',
            13 => 'K',
        ];

        $card_list = [];

        foreach ($card_type as $key => $type)
        {
            foreach ($numbers as $number)
            {
                $card_list[] = $type . '-' . $number;
            }
        }

        return $card_list;
    }
}
