<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      </h2>
  </x-slot>

  <div class="py-12 bg-[#d9f99d]">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

          <section class="text-gray-600 body-font relative text-center">
            <div class="container px-5 py- mx-auto">
              <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
                @csrf
              <div class="lg:w-1/2 md:w-2/3 mx-auto ">
                <div class=" -m-2">
                  <div class="p-5 ">
                    <div class="relative">
                      <label for="title" class="leading-7 text-sm text-gray-600 ">タイトル</label>
                      <input type="text" id="title" name="title" class="drop-shadow-xl w-full bg-gray-20 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                  </div>
                  <div class="p-5 ">
                    <div class="relative">
                      <label for="departure_day" class="leading-7 text-sm text-gray-600">出発日</label>
                      <input type="date" id="departure_day" name="departure_day" class="drop-shadow-xl w-full bg-gray-20 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      <x-input-error :messages="$errors->get('departure_day')" class="mt-2" />
                    </div>
                  </div>
                  <div class="p-5 ">
                    <div class="relative">
                      <label for="return_day" class="leading-7 text-sm text-gray-600">帰宅日</label>
                      <input type="date" id="return_day" name="return_day" class="drop-shadow-xl w-full bg-gray-20 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      <x-input-error :messages="$errors->get('return_day')" class="mt-2" />
                    </div>
                  </div>
                  <div class="p-5 ">
                    <div class="relative">
                      <label for="thumbnail" class="leading-7 text-sm text-gray-600">サムネイル</label>
                      <input type="file" id="thumbnail" accept="image/png,image/jpeg,image/jpg" name="thumbnail" class="drop-shadow-xl w-full bg-gray-20 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>
                  </div>
                <div class="flex">
                  <div class="p-10 w-full">
                      <button type="submit" class=" drop-shadow-xl flex mx-auto text-white bg-[#84cc16] border-0 py-2 px-8 focus:outline-none hover:bg-[#65a30d] rounded text-lg">登録</button>
                    </div>
                    <div class="p-10 w-full">
                      <button onclick=location.href='{{ route('posts.index')}}' type="button" class="drop-shadow-xl flex mx-auto text-white bg-[#22c55e] border-0 py-2 px-8 focus:outline-none hover:bg-[#16a34a] rounded text-lg">戻る
                      </button>
                  </div>
                </div>

                </div>
              </div>
              </form>
  </div>
</x-app-layout>
