<?php

namespace App\Console\Commands\Service;

use Illuminate\Console\Command;

class CategoryParsing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parsing:category {--no-truncate : Clear categories table before parse}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing categories table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $categories_2 = \DB::connection('mysql_2')->table('categories');
        $categories = \DB::connection('mysql')->table('categories');
        $noTruncate = $this->option('no-truncate');

        $this->info('Start parsing categories...');

        if (!$noTruncate) {
            $this->line('Clearing categories table');
            $categories->truncate();
        }

        $bar = $this->output->createProgressBar($categories_2->cursor()->count());

        $this->line('Parsing categories');

        foreach ($categories_2->get() as $category_2) {

            $categories->insert([
                'published' => $category_2->published,
                'name' => $category_2->name,
                'slug' => $category_2->slug,
                'created_at' => now(),
                'updated_at' => null,
            ]);

            $bar->advance();
        }

        $bar->finish();

        return 1;
    }
}
