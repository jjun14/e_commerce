<?php 

class Order extends CI_Model
{
  public function get_all_orders($arr)
  { 
    $offset = 5 * ($arr['page_num'] - 1);
    $count = $this->db->query("SELECT count(orders.id) as num_orders FROM orders")->row_array();
    $query = "SELECT orders.id,
              concat_ws(' ', billings.first_name, billings.last_name) AS name,
              DATE_FORMAT(billings.created_at, '%c/%e/%Y') AS date,
              concat_ws(' ', billings.address_1, billings.address_2, city_name, state_name, zipcode) AS address,
              orders.total, orders.status FROM orders
              LEFT JOIN billings ON billing_id = billings.id
              LEFT JOIN cities ON cities_id = cities.id
              LEFT JOIN states ON states_id = states.id
              LEFT JOIN zipcodes ON zipcodes_id = zipcodes.id
              ORDER by orders.id DESC
              LIMIT 5 OFFSET ?";
    $all_orders = array($this->db->query($query, $offset)->result_array(), $count['num_orders']);
    return $all_orders;
  }
  public function update_status($post)
  {
    $query = "UPDATE orders
              SET status = ?, updated_at = NOW()
              WHERE id = ?";
    return $this->db->query($query, array($post['status'], $post['order_id']));
  }
}

?>