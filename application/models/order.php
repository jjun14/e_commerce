<?php 

class Order extends CI_Model
{
  public function get_all_orders($post)
  { 
    $offset = 5 * ($post['page_num'] - 1);
    if(isset($post['search']))
    {
      // var_dump($post['search']);
      // die();
      $like = '%'.$post['search'].'%';
      $count = $this->db->query("SELECT count(orders.id) as num_orders
                                 FROM orders
                                 LEFT JOIN billings ON billing_id = billings.id
                                 LEFT JOIN cities ON cities_id = cities.id
                                 LEFT JOIN states ON states_id = states.id
                                 LEFT JOIN zipcodes ON zipcodes_id = zipcodes.id
                                 WHERE billings.first_name LIKE (?)
                                 OR billings.last_name LIKE (?)
                                 OR concat_ws(' ', billings.address_1, billings.address_2, city_name, state_name, zipcode) LIKE (?)", array($like, $like, $like))->row_array();
      $query = "SELECT orders.id,
                concat_ws(' ', billings.first_name, billings.last_name) AS name,
                DATE_FORMAT(billings.created_at, '%c/%e/%Y') AS date,
                concat_ws(' ', billings.address_1, billings.address_2, city_name, state_name, zipcode) AS address,
                orders.total, orders.status FROM orders
                LEFT JOIN billings ON billing_id = billings.id
                LEFT JOIN cities ON cities_id = cities.id
                LEFT JOIN states ON states_id = states.id
                LEFT JOIN zipcodes ON zipcodes_id = zipcodes.id
                WHERE billings.id = ?
                OR billings.first_name LIKE (?)
                OR billings.last_name LIKE (?)
                OR concat_ws(' ', billings.address_1, billings.address_2, city_name, state_name, zipcode) LIKE (?)
                ORDER by orders.id DESC
                LIMIT 5 OFFSET ?";
      $all_orders = array($this->db->query($query, array(intval($like),$like, $like, $like, $offset))->result_array(), $count['num_orders']);
      return $all_orders;
    }
    else if($post['order_status'] == 'show_all')
    {
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
    else if($post['order_status'] == 'Shipped' || $post['order_status'] == 'Order in process')
    {
      $count = $this->db->query("SELECT count(orders.id) as num_orders FROM orders
                                 WHERE orders.status = ?", $post['order_status'])->row_array();
      $query = "SELECT orders.id,
                concat_ws(' ', billings.first_name, billings.last_name) AS name,
                DATE_FORMAT(billings.created_at, '%c/%e/%Y') AS date,
                concat_ws(' ', billings.address_1, billings.address_2, city_name, state_name, zipcode) AS address,
                orders.total, orders.status FROM orders
                LEFT JOIN billings ON billing_id = billings.id
                LEFT JOIN cities ON cities_id = cities.id
                LEFT JOIN states ON states_id = states.id
                LEFT JOIN zipcodes ON zipcodes_id = zipcodes.id
                WHERE orders.status = ?
                ORDER by orders.id DESC
                LIMIT 5 OFFSET ?";
      $all_orders = array($this->db->query($query, array($post['order_status'], $offset))->result_array(), $count['num_orders']);
      return $all_orders;
    }
  }
  public function get_by_id($id)
  {
    $query = "SELECT 
              orders.*,
              concat_ws(' ', shippings.first_name, shippings.last_name) AS shipping_name,
              concat_ws(' ', shippings.address_1, shippings.address_2) AS shipping_address,
              city1.city_name AS shipping_city,
              state1.state_name AS shipping_state,
              zipcode1.zipcode AS shipping_zip,
              concat_ws(' ', billings.first_name, billings.last_name) AS billing_name,
              concat_ws(' ', billings.address_1, billings.address_2) AS billing_address,
              city1.city_name AS billing_city,
              state1.state_name AS billing_state,
              zipcode1.zipcode AS billing_zip
              FROM orders
              LEFT JOIN billings ON billing_id = billings.id
              LEFT JOIN cities AS city1 ON billings.cities_id = city1.id
              LEFT JOIN states AS state1 ON billings.states_id = state1.id
              LEFT JOIN zipcodes AS zipcode1 ON billings.zipcodes_id = zipcode1.id
              LEFT JOIN shippings ON shipping_id = shippings.id
              LEFT JOIN cities AS city2 ON shippings.cities_id = city2.id
              LEFT JOIN states AS state2 ON shippings.states_id = state2.id
              LEFT JOIN zipcodes AS zipcode2 ON shippings.zipcodes_id = zipcode2.id
              WHERE orders.id = ?";
    $order = $this->db->query($query, $id)->row_array();
    return $order;
  }
  public function get_products($order_id)
  {
    $query = "SELECT * FROM orders_have_products
              JOIN products ON products_id = products.id
              WHERE orders_id = ?";
    $products = $this->db->query($query, $order_id)->result_array();
    return $products;
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