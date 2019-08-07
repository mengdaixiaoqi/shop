<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Http\Requests\OrderRequest;
use App\Models\ProductSku;
use App\Models\UserAddress;
use App\Models\Order;

class OrdersController extends Controller
{
    //
    public function store(OrderRequest $request, OrderService $orderService){
        $user  = $request->user();
        $address = UserAddress::find($request->input('address_id'));

        return $orderService->store($user, $address, $request->input('remark'), $request->input('items'));
    }

    public function index(Request $request){
        $orders = Order::query()
            // 使用 with 方法预加载，避免N + 1问题
            ->with(['items.product', 'items.productSku'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('orders.index', ['orders' => $orders]);
    }

    //订单详情
    public function show(Order $order , Request $request){
        //策略验证
        $this->authorize('own', $order);
        return view('orders.show',['order'=>$order->load(['items.productSku','items.product'])]);
    }
}
