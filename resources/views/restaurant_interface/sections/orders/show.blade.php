<div id="order-detail-modal" class="fixed inset-0 hidden items-center justify-center bg-black/50 z-50 p-4">

    <!-- Modal Card -->
    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl overflow-hidden animate-fadeIn">

        <!-- Header -->
        <div class="flex items-center justify-between p-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-800">
                Order #ORD-{{ $order->id }}
            </h2>

            <!-- Close Button -->
            <button onclick="closeModal('order-detail-modal')" 
                class="text-gray-400 hover:text-gray-600 text-xl">
                ✕
            </button>
        </div>

        <!-- Body -->
        <div class="p-5 space-y-4">

            <!-- Customer -->
            <div class="flex items-center justify-between">
                <span class="text-gray-500">Customer</span>
                <span class="font-medium text-gray-800">
                    {{ $order->customer_name }}
                </span>
            </div>

            <!-- Status -->
            @php
                $statusClasses = [
                    'pending' => 'bg-yellow-100 text-yellow-700',
                    'preparing' => 'bg-blue-100 text-blue-700',
                    'delivered' => 'bg-green-100 text-green-700',
                ];
            @endphp

            <div class="flex items-center justify-between">
                <span class="text-gray-500">Status</span>
                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-700' }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            <!-- Items -->
            <div class="border-t border-gray-100 pt-4">
                <span class="text-gray-500 block mb-2">Items</span>

                <ul class="space-y-2 max-h-40 overflow-y-auto pr-2">
                    @foreach($order->menus as $menu)
                        <li class="flex justify-between text-gray-800">
                            <span>
                                {{ $menu->name }} (x{{ $menu->pivot->quantity }})
                            </span>
                            <span class="text-sm text-gray-500">
                                ${{ number_format($menu->pivot->price, 2) }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Total -->
            <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                <span class="font-medium text-gray-800">Total</span>
                <span class="text-xl font-bold text-orange-500">
                    ${{ number_format($order->total_price, 2) }}
                </span>
            </div>

        </div>

    </div>
</div>