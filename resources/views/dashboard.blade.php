<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-indigo-800 leading-tight">
            {{ __('Bảng Điều Khiển Hệ Thống') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full text-blue-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 11v10l8 4"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 uppercase font-bold">Sản phẩm</p>
                            <p class="text-2xl font-semibold">{{ $totalProducts }}</p> 
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full text-green-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 uppercase font-bold">Doanh thu</p>
                            <p class="text-2xl font-semibold">15.4M VNĐ</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-purple-500">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full text-purple-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 uppercase font-bold">Người dùng</p>
                            <p class="text-2xl font-semibold">1,042</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2">
                    <div class="bg-white overflow-hidden shadow-sm rounded-xl mb-6">
                        <div class="p-8 text-gray-900">
                            <h3 class="text-xl font-bold mb-2 text-indigo-700">Chào mừng trở lại, {{ Auth::user()->name }}! 👋</h3>
                            <p class="text-gray-600">Bạn đã đăng nhập thành công vào hệ thống quản lý của <strong>Phí Văn Thành</strong>.</p>
                            
                            <div class="mt-8 flex flex-wrap gap-4">
                                <a href="{{ route('product.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition">
                                    Quản lý sản phẩm
                                </a>
                                <a href="{{ url('/banco/8') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition">
                                    Xem bàn cờ
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-sm rounded-xl p-6">
                    <h3 class="font-bold text-lg mb-4">Sản phẩm mới cập nhật</h3>
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-gray-400 text-sm border-b">
                                <th class="pb-3 font-medium">Ảnh</th>
                                <th class="pb-3 font-medium">Tên sản phẩm</th>
                                <th class="pb-3 font-medium">Giá bán</th>
                                <th class="pb-3 font-medium">Ngày thêm</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse($recentProducts as $product)
                                <tr class="border-b hover:bg-gray-50 transition">
                                    <td class="py-3">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" class="w-10 h-10 object-cover rounded-lg border">
                                        @else
                                            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-[10px] text-gray-400">No Img</div>
                                        @endif
                                    </td>
                                    <td class="py-4 font-semibold text-gray-800">{{ $product->name }}</td>
                                    <td class="py-4 text-indigo-600 font-bold">{{ number_format($product->price) }}đ</td>
                                    <td class="py-4 text-gray-500">{{ $product->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-8 text-center text-gray-400">
                                        Chưa có sản phẩm nào được cập nhật.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    @if($recentProducts->count() > 0)
                        <div class="mt-4 text-right">
                            <a href="{{ route('product.index') }}" class="text-xs text-indigo-600 hover:underline font-bold">
                                Xem tất cả sản phẩm &rarr;
                            </a>
                        </div>
                    @endif
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-indigo-700 rounded-xl p-6 text-white mb-6">
                        <h3 class="font-bold text-lg mb-2">Hỗ trợ kỹ thuật</h3>
                        <p class="text-sm opacity-80 mb-4">Bạn gặp vấn đề khi vận hành hệ thống? Đừng ngần ngại liên hệ với chúng tôi.</p>
                        <button class="w-full bg-white text-indigo-700 font-bold py-2 rounded-lg hover:bg-indigo-50 transition">
                            Gửi yêu cầu ngay
                        </button>
                    </div>

                    <div class="bg-white shadow-sm rounded-xl p-6">
                        <h3 class="font-bold text-lg mb-4">Thông tin SV</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Sinh viên:</span>
                                <span class="font-bold text-gray-800">Phí Văn Thành</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">MSSV:</span>
                                <span class="font-bold text-gray-800">0149167</span>
                            </div>
                            <div class="flex justify-between text-sm border-t pt-4">
                                <span class="text-gray-500">Phiên bản:</span>
                                <span class="text-indigo-600 font-mono">v1.2.4</span>
                            </div>
                        </div>
                    </div>
                </div>
                <p style="margin-top: 20px;">
        <a href="{{ route('home') }}">Quay lại trang chủ</a>
    </p>

            </div>
        </div>
    </div>
</x-app-layout>