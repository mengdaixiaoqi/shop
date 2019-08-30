<?php

namespace App\Admin\Controllers;

use App\Models\CouponCode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

class CouponCodesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\CouponCode';

    public function index(Content $content)
    {
        return $content
            ->header('优惠卷列表')
            ->body($this->grid());
    }

    public function create(Content $content)
    {
        return $content
            ->header('新增优惠券')
            ->body($this->form());
    }

    public function edit($id,Content $content)
    {
        return $content
            ->header('编辑优惠券')
            ->body($this->form()->edit($id));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CouponCode);

        $grid->model()->orderBy('created_at', 'desc');
        $grid->column('id', __('Id'))->sortable();
        $grid->column('name', '名称');
        $grid->column('code', '优惠码');
        $grid->column('description', '描述');
        $grid->column('usage', '用量')->display(function ($value) {
            return "{$this->used} / {$this->total}";
        });
        /*$grid->column('type', '类型')->display(function ($value){
            return CouponCode::$typeMap[$value];
        });
        $grid->column('value', '折扣')->display(function ($value){
            return $this->type === CouponCode::TYPE_FIXED ? '￥'.$value : $value.'%';
        });*/

        $grid->column('enabled', '是否启用')->display(function ($value){
            return $value ? '是' : '否';
        });
        $grid->column('created_at', '创建时间');
        /*$grid->actions(function ($actions){
            $actions->disableView();
        });*/

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(CouponCode::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('code', __('Code'));
        $show->field('type', __('Type'));
        $show->field('value', __('Value'));
        $show->field('total', __('Total'));
        $show->field('used', __('Used'));
        $show->field('min_amount', __('Min amount'));
        $show->field('not_before', __('Not before'));
        $show->field('not_after', __('Not after'));
        $show->field('enabled', __('Enabled'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CouponCode);

        $form->display('id','ID');
        $form->text('name', '名称')->rules('required');
        $form->text('code', '优惠码')->rules(function ($form) {
            //如果$form->model()->id不为空，代表是编辑操作
            if($id = $form->model()->id) {
                return 'nullable|unique:coupon_codes,code,'.$id.',id';
            } else {
                return 'nullable|unique:coupon_codes';
            }
        });
        $form->radio('type', '类型')->options(CouponCode::$typeMap)->rules('required');
        $form->text('value', '折扣')->rules(function ($form){
            if($form->type === CouponCode::TYPE_PERCENT){
                // 如果选择了百分比折扣类型，那么折扣范围只能是 1 ~ 99
                return 'required|numeric|between:1,99';
            } else {
                // 否则只要大等于 0.01 即可
                return 'required|numeric|min:0.01';
            }
        });
        $form->number('total', '总量')->rules('required|numeric|min:1')->default(1);
        $form->currency('min_amount', '最低金额')->rules('required|numeric|min:0.01')->symbol('￥');;
        $form->datetime('not_before', '开始时间')->default(date('Y-m-d H:i:s'));
        $form->datetime('not_after', '结束时间')->default(date('Y-m-d H:i:s'));
        $form->switch('enabled', '启动')->options( [
            'on'  => ['value' => 1, 'text' => '是', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
        ]);

        $form->saving(function (Form $form){
           if(!$form->code){
               $form->code = CouponCode::findAvailableCode();
           }
        });

        return $form;
    }
}
