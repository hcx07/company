<?php
/**
 * Created by hcx.
 * User: hcx
 * Date: 2019/2/26
 * Time: 18:07
 */

class tool
{

    /**
     * User: hcx
     * Date: 2019/2/26
     * @param $post
     * @return mixed|string
     * 处理接收数据
     */
    public function post_check($post)
    {
        foreach ($post as &$item) {
            $item = preg_replace("/<script[^>]*?>.*?<\/script>/si", "", strip_tags(html_entity_decode($item)));
            if (!get_magic_quotes_gpc()) // 判断magic_quotes_gpc是否为打开
            {
                $item = addslashes($item); // 进行magic_quotes_gpc没有打开的情况对提交数据的过滤
            }
            $item = str_replace("_", "\_", $item); // 把 '_'过滤掉
            $item = str_replace("%", "\%", $item); // 把' % '过滤掉
            $item = nl2br($item); // 回车转换
            $item = htmlspecialchars($item); // html标记转换
        }
        return $post;
    }

    /**
     * User: hcx
     * Date: 2019/2/26
     * @param array $data
     * @param int $code
     * @param string $msg
     * 返回json数据
     */
    static public function res_date($data = [], $code = 200, $msg = '操作成功')
    {
        header('Content-type: application/json');
        $result = ['data' => $data, 'code' => intval($code), 'message' => $msg, 'return_time' => time()];
        $result = json_encode($result);
        exit($result);
    }

}