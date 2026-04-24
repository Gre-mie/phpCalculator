<?php

namespace App\Console\Commands;

use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Console\Command;

class PrintBakery extends Command implements PromptsForMissingInput
{
    protected $signature = 'print:bakery
                            {name : The bakerys name}
                            {--t|test}
                            {ingredients?* : A list of available ingredients}';
    protected $description = 'Attempts to make cakes from ingredients';

    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => "What is the bakery's name?"
        ];
    }

    public function handle()
    {
        $test = $this->option("test");
        $name = $this->argument('name');
        $ingredients = $this->argument('ingredients');
        $baked = "";

        $number_of_shelves = 1;
        $space_per_shelf = 27;
        $max_space = $space_per_shelf * $number_of_shelves;

        $accepted_ingredients = [
            'milk' => ['milk', '🥛', 'cow', '🐮'],
            'egg' => ['egg', '🥚', 'chicken', '🐔'],
            'butter' => ['butter', '🧈', 'cow', '🐮'],
            'sugar' => ['sugar', 'honey', '🍯', 'bee', '🐝'],
            'flour' => ['flour', 'wheat', '🌾', 'farmer', '👨‍🌾', '👩‍🌾']
        ];
        $required = [
            'milk' => false,
            'egg' => false,
            'butter' => false,
            'sugar' => false,
            'flour' => false
        ];


        // trunicate long inputs
        $max_name_len = 29;
        if (strlen($name) > $max_name_len) {
            $name = subStr($name, 0, $max_name_len);
        }
        $max_ingredients = $max_space * count($required);
        if (count($ingredients) > $max_ingredients) {
            $ingredients = array_slice($ingredients, 1, $max_ingredients);
        }


        // attempt to bake
        $chunks = array_chunk($ingredients, 5);
        foreach ($chunks as $chunk) {
            // search ingredients for a match in accepted_ingredients and update required if found
            for ($i = 0; $i < count($chunk); $i++) {
                $ingredient = mb_strtolower($chunk[$i]);
                $found = false;
                foreach ($accepted_ingredients as $ingredient_name => $accept_list) {
                    if ($found) { break; }
                    foreach ($accept_list as $acceptable) {
                        if ($found) { break; }
                        if ($ingredient == $acceptable) {
                            if (!$required[$ingredient_name]) {
                                $required[$ingredient_name] = true;
                                $found=true;
                                break;
                            }
                        }
                    }
                }
            }

            // check all required ingredients are ture and add emoji to 'baked'
            $can_bake = true;
            foreach ($required as $key => $req) {
                if (!$req) {
                    $can_bake = false;
                    break;
                }
            }
            if ($can_bake) {
                $baked = $baked . "🍰";
            } else {
                $baked = $baked . "💩";
            }
            $required = falsify_array($required);
        }


        // builds the bakery visual display and prints it to terminal
        if ($test) {
            $this->line($baked);
        } else {
            $centered_name = center_text($name, $max_name_len, " ");
            $window = get_shelves($baked, $space_per_shelf);
            $this->line(<<<END
               _____________________________
              /                             \
             / {$centered_name} \
            /_________________________________\
            |   ___________________________   |{$window}
            | ||___________________________|| |
            |_________________________________|
            END);
        }
    }
}


// returns all the shelves for the window
function get_shelves($string, $space) {
    $split_by = 9;
    $str_array = grapheme_str_split($string, $split_by);
    $window = "";
    for ($i = 0; $i < count($str_array); $i++) {
        $window = $window . make_shelf($str_array[$i], $space, $i + 1);
    }
    return $window;
}


// Adds baked goods to a shelf
function make_shelf($string, $space, $shelf_num) {
    $prefix = "\n| ||";
    $main = "";
    $postfix = "|| |";
    $str_arr = mb_str_split($string, 1);
    $units_used = 0;

    if (count($str_arr) < 1) {
        return $prefix . center_shelf($string, $units_used, $space, "_", $shelf_num) . $postfix;
    } else {
        for ($i=0; $i<count($str_arr)-1; $i++) {
            $main = "{$main}{$str_arr[$i]}_";
            $units_used += 3;
        }
        $index = count($str_arr) - 1;
        $main = "{$main}{$str_arr[$index]}";
        $units_used += 2;
        return $prefix . center_shelf($main, $units_used, $space, "_", $shelf_num) . $postfix;
    }
}


// adds padding to start and end of string to center emoji strings
function center_shelf($string, $units_used, $space, $pad, $shelf_num) {
    $prefix = "";
    $postfix = "";
    $space_left = $space - $units_used;
    if ($space_left > 0 && $space_left % 2 != 0) {
        $space_left--;
        if ($shelf_num % 2 == 0) {
            $prefix = $prefix . $pad;
        } else {
            $postfix = $postfix . $pad;
        }
    }
    for ($i = 0; $i < $space_left/2; $i++) {
        $prefix = $prefix . $pad;
        $postfix = $postfix . $pad;
    }
    return $prefix . $string . $postfix;
}


// center a string with white space
function center_text($string, $space, $pad) {
    if (grapheme_strlen($string) == $space) {
        return $string;
    }
    $prefix = "";
    $postfix =  "";
    $white_space = $space - grapheme_strlen($string);
    if ($white_space % 2 != 0) {
        $postfix = $pad;
        $white_space--;
    }
    for ($i = 0; $i < $white_space/2; $i++) {
        $prefix = $prefix . $pad;
        $postfix = $postfix . $pad;
    }
    return $prefix . $string . $postfix;
}


// return a string of array keys and values formatted for terminal printing
function stringify_array($array) {
    $str = "[\n";
    foreach ($array as $key => $value) {
        if (is_null($value)) {
            $value = 'null';
        } else if (is_string($value) || is_numeric($value)) {
            $value = "{$value}";
        } else if ($value == true) {
            $value = 'true';
        } else if ($value == false) {
            $value = 'false';
        }
        $str = "{$str}{$key}: {$value},\n";
    }
    return "{$str}]\n";
}


// returns a copy of the array with all values set to false
function falsify_array($array) {
    foreach ($array as $key => $value) {
        $array[$key] = false;
    }
    return $array;
}
