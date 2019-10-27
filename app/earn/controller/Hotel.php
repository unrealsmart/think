<?php

namespace app\earn\controller;

use app\BaseController;
use think\facade\Db;
use think\Request;

class Hotel extends BaseController
{
    /**
     * 全文搜索字段
     *
     * @var array
     */
    protected $fulltext_search_fields = [
        'name_cn',
        'name_en',
    ];

    /**
     * 搜索
     */
    public function search()
    {
        $page_size = request()->param('page_size', 20);
        $type = request()->param('type', 'fulltext');
        $content = request()->param('content', '');
        $fields = request()->param('fields', []);

        $model = Db::connect('fz')->table('hotel_list');

        $data = [];
        if ($type === 'fulltext') {
            foreach ($this->fulltext_search_fields as $value) {
                $model->whereLike($value, '%' . $content . '%', 'OR');
            }
            $data = $model->paginate($page_size);
        } else if ($type === 'fields') {
            //
        }

        return json($data);
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     * @throws \think\db\exception\DbException
     */
    public function index()
    {
        $page_size = request()->param('page_size', 20);

        $list = Db::connect('fz')
            ->table('hotel_list')
            ->withoutField('facilities')
            ->order('id desc')
            ->paginate($page_size);

        return json($list);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}