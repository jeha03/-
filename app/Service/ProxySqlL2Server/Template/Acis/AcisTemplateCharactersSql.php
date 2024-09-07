<?php

namespace App\Service\ProxySqlL2Server\Template\Acis;

use Config;
use App\Service\ProxySqlL2Server\Support\ProxyFilters\GeneralFilters;
use App\Models\Server\Lucera\LuceraServerCharactersSubclasses;
/*use App\Models\Server\Lucera\LuceraServerCharactersClans;*/


class AcisTemplateCharactersSql
{

    public function getPkPvpServerCharacters($current_server_characters){
        $filtersPk = new GeneralFilters(['toppkpvpfilter'] , []);
        $result = $current_server_characters::filter($filtersPk)->get(['obj_id', 'char_name' , 'base_class_id' , 'clanid' , 'pvpkills' , 'pkkills' , 'onlinetime' , 'online']);
        //$this->characterGetLevel($result);
        return $result;
    }

    public function getClanIdToClanName($unique_clan_id , $current_clandata_db_model){
        $clanidfilter = new GeneralFilters(['clandatafilter'] , $unique_clan_id);
        return  $current_clandata_db_model::filter($clanidfilter)->get(['clan_name' ,'clan_id']);
    }


    //example $dataOr['field'], $dataOr['comparison'], $dataOr['data']
    public function getAllCharsToArrayName($chacters_db_model , $data_search){
        if(count($data_search) > 0){
            $filters = new GeneralFilters(['simplefilterarray'] , $data_search);
            $result =   $chacters_db_model::filter($filters)->get(['obj_id', 'char_name' , 'account_name' , 'clanid' , 'pvpkills' , 'pkkills' , 'lastAccess' , 'online']);
            $this->characterGetLevel($result);
            return $result;
        }

        return [];
    }


    public function getCharToByName(){
        $filtersPk = new GeneralFilters(['simplefilter'] , [['login', '=', $username]]);
        $resultmodel =  $modelAccountDb::filter($filtersPk)->get()->first();
    }

    public function getLoginByCharName($charactersDb , $char_name){
        $filtersPk = new GeneralFilters(['simplefilter'] , [['char_name', '=', $char_name]]);
        return $charactersDb::filter($filtersPk)->get(['account_name','char_name'])->first();
    }

    public function getObjIdByCharName($charactersDb , $char_name){
        $filtersPk = new GeneralFilters(['simplefilter'] , [['char_name', '=', $char_name]]);
        return $charactersDb::filter($filtersPk)->get(['obj_Id','char_name'])->first();
    }


    public function saveAllCharacters($allModelCharactersPvp , $allModelCharactersPk){

        //  info('CharactersSql->saveAllCharacters');
        //  info(count($allModelCharactersPvp));
        //  info(count($allModelCharactersPk));

        $this->saveSql($allModelCharactersPk);
    }

    //insert массовая запись не сработала. Но теперь это и не нужно т.к мы ограничиваем сколько записей
    //мы получим из игровой базы (настраиваем в конфиге!)
    private function saveSql(&$modelArr){
        if(count($modelArr) > 0){
            foreach($modelArr as $model){
                $model->save();
            }
        }
    }

    private function characterGetLevel($modelArr) {
        $newMassArray = [];
        foreach($modelArr as $model){
            $model_character_subclasses = new LuceraServerCharactersSubclasses();
            $character_subclusses = $model_character_subclasses->where('char_obj_id', $model['obj_id'])->first();
            $character_level = $character_subclusses !== null ? $character_subclusses->level : 1;
            unset($model['obj_id']);
            $model['level'] = $character_level;
        }
    }

    /*private function characterGetClanId($modelArr) {
        $newMassArray = [];
        foreach($modelArr as $model){
            $model_LuceraServerCharactersClans = new LuceraServerCharactersClans();
            $character_LuceraServerCharactersClans = $model_LuceraServerCharactersClans->where('clan_id', $model['clanid'])->first();
            $character_clanid = $character_LuceraServerCharactersClans !== null ? $character_LuceraServerCharactersClans->clan_id : 1;
            unset($model['clanid']);
            $model['clanid'] = $character_LuceraServerCharactersClans;
        }
    }*/

    private function  clearTableCharactersStatic(){
        CharactersStatic::truncate();
    }


}
?>
