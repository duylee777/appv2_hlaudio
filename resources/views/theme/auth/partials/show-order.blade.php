<button data-modal-target="edit-modal-{{$order->id}}" data-modal-toggle="edit-modal-{{$order->id}}" class="block p-2">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="fill-blue-300 hover:fill-blue-600" height="16" width="16">
        <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
    </svg>
</button>
<div id="edit-modal-{{$order->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[1000] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Create modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Create modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    <span>Đơn hàng : {{ $order->order_code }}</span>
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-modal-{{$order->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Create modal body -->
            <div class="p-4">
                <div class="mb-4">
                    <h3 class="text-blue-600">Khách hàng đặt:</h3>
                    <span>{{ $order->orderUser->name }} - {{ $order->orderUser->phone }} - {{ $order->orderUser->email }}</span>
                </div>                
                <div class="mb-4">
                    <h3 class="text-blue-600">Thông tin người nhận hàng:</h3>
                    <div class="flex flex-col">
                        <span>Họ tên: <strong>{{ $order->delivery_name }}</strong></span>
                        <span>Số điện thoại: <strong>{{ $order->delivery_phone }}</strong></span>
                        <span>Email: <strong>{{ $order->delivery_email }}</strong></span>
                        <span>Địa chỉ: <strong>{{ $order->delivery_address }}</strong></span>
                    </div>
                </div>
                <div class="">
                    <h3 class="text-blue-600">Thông tin đơn hàng</h3>
                    <div class="mt-2">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="border border-blue-300 px-4 py-2">Sản phẩm</th>
                                    <th class="border border-blue-300 px-4 py-2">Số lượng</th>
                                    <th class="border border-blue-300 px-4 py-2">Giá tiền</th>
                                    <th class="border border-blue-300 px-4 py-2">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->cartItem()->get() as $item)
                                    <tr>
                                        <td class="border border-blue-300 px-4 py-2">{{ $item->product->name }}</td>
                                        <td class="border border-blue-300 px-4 py-2">{{ $item->quantity }}</td>
                                        <td class="border border-blue-300 px-4 py-2">
                                            {{ Illuminate\Support\Number::currency($item->product->odd_price, in: 'VND', locale: 'vi') }}
                                        </td>
                                        <td class="border border-blue-300 px-4 py-2">
                                            {{ Illuminate\Support\Number::currency($item->product->odd_price * $item->quantity, in: 'VND', locale: 'vi') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="border border-blue-300 px-4 py-2 text-center" colspan="3">Thuế(10%)</td>
                                    <td class="border border-blue-300 px-4 py-2">
                                        {{ Illuminate\Support\Number::currency($order->total_price*0.1, in: 'VND', locale: 'vi') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border border-blue-300 px-4 py-2 text-center" colspan="3">Phí vận chuyển</td>
                                    <td class="border border-blue-300 px-4 py-2">
                                        {{ Illuminate\Support\Number::currency(50000, in: 'VND', locale: 'vi') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border border-blue-300 px-4 py-2 text-center font-bold" colspan="3">Tổng tiền</td>
                                    <td class="border border-blue-300 px-4 py-2 font-bold text-xl text-blue-600">
                                        {{ Illuminate\Support\Number::currency($order->total_price, in: 'VND', locale: 'vi') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>