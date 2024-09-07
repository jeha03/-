<?php

namespace App\Service\ProxySqlL2Server\LuceraProxy\Sheldure;

use Config;
use Log;
use App\Service\ProxySqlL2Server\Support\ProxyFilters\GeneralFilters;
use App\Service\ProxySqlL2Server\Template\Acis\AcisTemplateCharactersSql;
use App\Models\Server\Lucera\LuceraServerCharactersSubclasses;


   class CharactersSqlLucera  extends AcisTemplateCharactersSql
   {

            public function getPkPvpServerCharactersLucera($current_server_characters){
                $filtersPk = new GeneralFilters(['toppkpvpfilter'] , []);
                $result =  $current_server_characters::filter($filtersPk)->get(['obj_id', 'char_name' , 'base_class_id' , 'clanid' , 'pvpkills' , 'pkkills' , 'onlinetime' , 'online']);
                $this->convertNullTo0($result);
                return $result;
            }


            public function getObjIdByCharNameLucera($charactersDb , $char_name){
                $filtersPk = new GeneralFilters(['simplefilter'] , [['char_name', '=', $char_name]]);
                return $charactersDb::filter($filtersPk)->get(['obj_Id','char_name'])->first();
            }

            public function getClanIdToClanNameLucera($unique_clan_id , $current_clandata_db_model){
               return $this->getClanIdToClanName($unique_clan_id , $current_clandata_db_model);
            }




            public function saveAllCharactersLucera($allModelCharactersPvp , $allModelCharactersPk){
                    $this->saveAllCharacters($allModelCharactersPvp , $allModelCharactersPk);
            }


            private function convertNullTo0($modelArr){
                if(count($modelArr) > 0){
                    $arr_field_clear = ['onlinetime' , 'online' ,  'pvpkills' , 'pkkills' , 'clanid' ];
                    $this->clearNull($arr_field_clear , $modelArr);
                }
            }

            private function clearNull($arr_field_clear , $modelArr){
                foreach($arr_field_clear as $field_name){
                    foreach($modelArr as $model){
                        if(is_null($model[$field_name])){
                            $model[$field_name] = 0;
                        }
                    }
                }
            }

   }
?>

