<?php
namespace Opencart\Admin\Model\Extension\BlockBEE\Payment;
class BlockBEE extends \Opencart\System\Engine\Model {

    public function install() {
        $this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "blockbee_order` (
			  `order_id` int(11) NOT NULL,
			  `response` TEXT
			) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;");
    }

    public function getOrder($order_id): array
    {
        $qry = $this->db->query("SELECT * FROM `" . DB_PREFIX . "blockbee_order` WHERE `order_id` = '" . (int)$order_id . "' LIMIT 1");

        if ($qry->num_rows) {
            $order = $qry->row;
            return $order;
        } else {
            return [];
        }
    }
}