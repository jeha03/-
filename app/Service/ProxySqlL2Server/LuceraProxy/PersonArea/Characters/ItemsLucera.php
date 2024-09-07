<?php

namespace App\Service\ProxySqlL2Server\LuceraProxy\PersonArea\Characters;

use Config;
use Log;
use App\Service\ProxySqlL2Server\Template\Chars\CharactersTemplateChars;
use App\Service\ProxySqlL2Server\Template\Lucera\LuceraTemplateItemsSql;

class ItemsLucera extends LuceraTemplateItemsSql {

    private $inventory_name;

    public function __construct() {
        $this->inventory_name = Config::get('lineage2.server.inventory_item');
    }

    public function addL2itemLucera($modelItemsDb, $char_name, $item_id, $count, $owner_id) {
        // Получаем все существующие предметы с таким item_id у персонажа
        $existing_items = $this->getL2itemLucera($modelItemsDb, $char_name, $item_id, $owner_id);

        if (count($existing_items) === 0) {
            // Если предметов нет, создаем новую запись
            $new_obj_id = $this->getMaxIdItems($modelItemsDb, "item_id") + 1;
            $this->addItemToSql($modelItemsDb, $owner_id, $new_obj_id, $item_id, $count, $this->inventory_name);
        } elseif (count($existing_items) === 1) {
            // Если есть одна стопка, увеличиваем количество
            $item = $existing_items[0];
            $new_count = $item['amount'] + $count;
            $this->updateItemCount($modelItemsDb, $item['item_id'], $new_count);
        } else {
            // Если несколько стопок, объединяем их в одну и обновляем количество
            $total_count = $count;
            $primary_item = $existing_items[0];
            $total_count += $primary_item['amount'];

            // Удаляем остальные стопки
            $exits_count = 0;
            foreach ($existing_items as $item) {
                if ($exits_count !== 0) {
                    $total_count += $item['amount'];
                    $this->deleteItem($modelItemsDb, $item['item_id']);
                }
                $exits_count++;
            }

            // Обновляем количество у оставшейся стопки
            $this->updateItemCount($modelItemsDb, $primary_item['item_id'], $total_count);
        }

        info("Добавлен предмет по промокоду, персонажу > " . $char_name . " ид предмета " . $item_id . " количество " . $count);
    }

    public function getL2itemLucera($modelItemsDb, $char_name, $item_id, $owner_id) {
        return $this->getItemToSql($modelItemsDb, $owner_id, $item_id);
    }

    private function updateItemCount($modelItemsDb, $object_id, $new_count) {
        $itemModel = new $modelItemsDb;
        $itemModel->where('item_id', $object_id)->update(['amount' => $new_count]);
    }

    private function deleteItem($modelItemsDb, $object_id) {
        $itemModel = new $modelItemsDb;
        $itemModel->where('item_id', $object_id)->delete();
    }

}
?>
