<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Glucide\Categories;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function csv_to_array($filename='', $delimiter=',')
        {
            if(!file_exists($filename) || !is_readable($filename))
                return FALSE;

            $header = NULL;
            $data = array();
            if (($handle = fopen($filename, 'r')) !== FALSE)
            {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
                {
                    if(!$header)
                        $header = $row;
                    else
                        $data[] = array_combine($header, $row);
                }
                fclose($handle);
            }
            return $data;
        }

        $csvFile = public_path().'/csvs/categories.csv';

        $datas = csv_to_array($csvFile);

        DB::table('categories')->delete();

        foreach( $datas as $data ){
            Categories::create( $data );
        }


    }
}
