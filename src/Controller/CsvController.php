<?php
namespace App\Controller;

use Cake\Core\Configure;

use CsvCombine\Form\CsvImportForm;

class CsvController extends AppController
{
    public $components = [
        'CsvCombine.CsvExport'
    ];

    public function export()
    {
        $list = [
            [
                'test1',
                'test2',
                'test3',
            ],
            [
                'test4',
                'test5',
                'test6',
            ],
        ];
        /*
         *@array $list 出力のための配列(二次元配列が基本)
         *@param $file_name 出力ファイル名(デフォルトはexport.csv)
         *@param $delimiter 区切り文字の設定(デフォルトは",")
         *@param $directory 一時保存ディレクトリ(デフォルトはTMP,最終的にファイルを削除をする)
         *@param $export_encoding 出力するファイルのエンコード(デフォルトはSJIS-win
         *@param $array_encoding 入力する配列のエンコード(デフォルトはUTF-8
        */
        return $this->CsvExport->export($list);
    }

    public function import()
    {
        $import = new CsvImportForm();
        $file = TMP . 'test.csv';
        $column = [
            'key1',
            'key2',
            'key3',
        ];
        /*
         *@array file ファイルパス(必須
         *@array $column カラム名を並び順に(必須
         *@param $delimiter 区切り文字を設定 (デフォルトは","で"\t"や"|"などを指定することが可能)
         *@param $column_name カラム名を設定
         *@param $array_encoding 出力する配列のエンコード(デフォルトはUTF-8
         *@param $import_encoding 入力するファイルのエンコード(デフォルトはSJIS-win
        */
        $result = $import->loadDataCsv($file,$column);
        debug($result);
        exit;
    }
}