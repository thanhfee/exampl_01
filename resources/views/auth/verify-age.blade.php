<x-guest-layout>
    <div class="min-h-[450px] flex flex-col items-center justify-center p-8">
        <div class="w-24 h-24 bg-indigo-50 rounded-full flex items-center justify-center mb-8 shadow-inner">
            <svg class="w-12 h-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>

        <h2 class="text-3xl font-extrabold text-gray-900 mb-3 text-center tracking-tight">Xác Minh Độ Tuổi</h2>
        <p class="text-gray-500 text-center mb-8 leading-relaxed max-w-[280px]">
            Vui lòng xác nhận tuổi của bạn để tiếp tục truy cập vào hệ thống quản trị.
        </p>

        <form method="POST" action="{{ route('age.verify.post') }}" class="w-full max-w-xs space-y-6">
            @csrf
            
            <div class="relative">
                <label for="age" class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Tuổi của bạn:</label>
                <input type="number" 
                       name="age" 
                       id="age" 
                       required 
                       min="1" 
                       max="120"
                       placeholder="VD: 20"
                       value="{{ old('age') }}"
                       class="w-full px-4 py-3 rounded-xl shadow-sm text-center text-xl font-bold transition-all border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 @error('age') border-red-500 ring-1 ring-red-500 @enderror">
                
                @error('age')
                    <p class="mt-2 text-sm text-red-600 font-medium text-center italic">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" style="background-color: #4f46e5;" class="w-full py-4 px-6 rounded-2xl shadow-lg text-base font-bold text-white bg-indigo-600 hover:bg-indigo-700 transition-all duration-300 transform hover:-translate-y-1 uppercase tracking-wider">
                Xác nhận & Tiếp tục
            </button>

            <div class="text-center pt-2">
                <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-semibold text-gray-400 hover:text-indigo-600 transition-all">
                    ← Quay lại trang chủ
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>