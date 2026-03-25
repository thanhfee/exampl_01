<x-app-layout>
    <div class="py-8 bg-[#f5f5f5] min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-4 flex items-center justify-between">
                <a href="{{ route('product.index') }}" class="group flex items-center text-sm font-medium text-gray-500 hover:text-[#ee4d2d] transition-colors">
                    <svg class="w-5 h-5 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Quay lại danh sách sản phẩm
                </a>
                
                <nav class="flex text-xs text-gray-400 gap-2">
                    <a href="{{ route('dashboard') }}" class="hover:underline">Shopee</a>
                    <span>/</span>
                    <a href="{{ route('product.index') }}" class="hover:underline">Sản phẩm</a>
                    <span>/</span>
                    <span class="text-gray-600 truncate max-w-[100px]">{{ $product->name }}</span>
                </nav>
            </div>

            <div class="bg-white shadow-sm rounded-sm overflow-hidden border border-gray-200">
                <div class="flex flex-col md:flex-row p-5 gap-10">
                    
                    <div class="w-full md:w-2/5 max-w-[400px] flex-shrink-0">
                        <div class="aspect-square relative bg-white border border-gray-100 flex items-center justify-center group overflow-hidden">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-contain">
                            @else
                                <div class="w-full h-full bg-gray-50 flex flex-col items-center justify-center text-gray-300 italic text-xs">
                                    Chưa có hình ảnh
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex-1 flex flex-col">
                        <h1 class="text-xl font-medium text-gray-800 leading-7 mb-4">
                            {{ $product->name }}
                        </h1>

                        <div class="bg-[#fafafa] p-5 rounded-sm mb-8">
                            <span class="text-3xl font-medium text-[#ee4d2d]">₫{{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>

                        <div class="space-y-8 text-sm px-2">
                            <div class="flex gap-4 pt-6">
                                <button class="h-12 px-6 border border-[#ee4d2d] bg-[#ff57221a] text-[#ee4d2d] rounded-sm hover:bg-[#ff57222a] transition flex items-center gap-2 font-medium">
                                    Thêm Vào Giỏ Hàng
                                </button>
                                <button class="h-12 px-12 bg-[#ee4d2d] text-white rounded-sm hover:opacity-90 transition font-medium shadow-sm">
                                    Mua Ngay
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>