<?php

namespace App\Console\Commands;

use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Console\Command;

class PrintBakery extends Command implements PromptsForMissingInput
{
    protected $signature = 'print:bakery
                            {name : The bakerys name}
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
        $name = $this->argument('name');
        $ingredients = $this->argument('ingredients');
        $baked = "";
        $message = "For sale in {$name}: \n{$baked}";

        // NOTE: TO FUTURE SELF:
        // DO NOT make this into a tree
        // Its not important enough to spend the time on
        $acceptedIngredients = [];
        $required = [];

        $list = implode(', ', $required); //
        $this->line("[{$list}]"); //


        $chunks = array_chunk($ingredients, 5);
        foreach ($chunks as $chunk) {
            $this->line("baking...");


            $list = implode(', ', $chunk);//
            $this->line("[{$list}]");//




        }


        $list = implode(" ", $ingredients); //
        $this->line("ingredients: {$list}"); //

        $this->line($message);
    }
}
