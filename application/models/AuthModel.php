<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AuthModel extends CI_Model
{

    public function login($arr)
    {

        $user = $arr['username'];
        $pass = md5($arr['password']);
        return 0;
        $where = "(username = '$user' Or email = '$user') AND encrypted_password = '$pass' ANd deleted=0";
        $res = $this->db->select("*")->from("admins")->where($where)->get();

        if ($res->num_rows() == 1) {
            $row = $res->row_array();
            $data = array(
                'last_sign_in_ip' => $row['current_sign_in_ip'],
                'sign_in_count' => (1 + ($row['sign_in_count'])),
                'current_sign_in_at' => date('Y-m-d H:i:s'),
                'last_sign_in_at' => $row['current_sign_in_at'],
            );
            $res1 = $this->db->where("id", $row['id'])->update("admins", $data);
            if ($res1) {
                return array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'mobile' => $row['mobile'],
                    'image' => $row['image'],
                    'email' => $row['email'],
                    'username' => $row['username'],
                    '2FA' => $row['2FA'],
                );
            }
            return 0;
        }
        return 0;
    }
}
/* End of file AuthModel.php */
/* Location: ./application/controllers/AuthModel.php */
