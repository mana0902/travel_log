<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
create
      </h2>
  </x-slot>

  <div class="py-12 bg-[#d9f99d]">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-#86efac">
                  {{ __("You're logged in!") }}
              </div>
          </div>
          <section class="text-gray-600 body-font relative text-center">
            <div class="container px-5 py-24 mx-auto">
              <form method="post" action="{{route('posts.dates.schedules.store',['post'=>$post_id,'date'=>$date_id])}}" enctype="multipart/form-data">
                @csrf
              <div class="lg:w-1/2 md:w-2/3 mx-auto ">
                <div class=" -m-2">
                  <div class="p-5 ">
                    <div class="relative">
                      <label for="start_time" class="leading-7 text-sm text-gray-600 ">到着時間</label>
                      <input type="time" id="start_time" name="start_time" class="drop-shadow-xl w-full bg-gray-20 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                  </div>
                  <div class="p-5 ">
                    <div class="relative">
                      <label for="end_time" class="leading-7 text-sm text-gray-600">出発時間</label>
                      <input type="time" id="end_time" name="end_time" class="drop-shadow-xl w-full bg-gray-20 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
                    </div>
                  </div>
                  <div class="p-5 ">
                    <div class="relative">
                      <label for="filename_1" class="leading-7 text-sm text-gray-600">画像</label>
                      <input type="file" id="filename_1" accept="image/png,image/jpeg,image/jpg" name="filename_1" class="drop-shadow-xl w-full bg-gray-20 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      <x-input-error :messages="$errors->get('filename_1')" class="mt-2" />
                    </div>
                  </div>
                  <div class="p-5 ">
                    <div class="relative">
                      <label for="filename_2" class="leading-7 text-sm text-gray-600">画像</label>
                      <input type="file" id="filename_2" accept="image/png,image/jpeg,image/jpg" name="filename_2" class="drop-shadow-xl w-full bg-gray-20 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      <x-input-error :messages="$errors->get('filename_2')" class="mt-2" />
                    </div>
                   </div>
                   <div class="p-5 ">
                    <div class="relative">
                      <label for="filename_3" class="leading-7 text-sm text-gray-600">画像</label>
                      <input type="file" id="filename_3" accept="image/png,image/jpeg,image/jpg" name="filename_3" class="drop-shadow-xl w-full bg-gray-20 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      <x-input-error :messages="$errors->get('filename_3')" class="mt-2" />
                    </div>
                  </div>
                  <div class="p-5 ">
                    <div class="relative">
                      <label for="filename_4" class="leading-7 text-sm text-gray-600">画像</label>
                      <input type="file" id="filename_4" accept="image/png,image/jpeg,image/jpg" name="filename_4" class="drop-shadow-xl w-full bg-gray-20 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      <x-input-error :messages="$errors->get('filename_4')" class="mt-2" />
                    </div>
                  </div>
                  <div class="p-5 ">
                    <div class="relative">
                      <label for="destination" class="leading-7 text-sm text-gray-600">目的地</label>
                      <input type="text" id="destination" name="destination" class="drop-shadow-xl w-full bg-gray-20 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      <x-input-error :messages="$errors->get('destination')" class="mt-2" />
                    </div>
                  </div>
                  <div class="p-5 ">
                    <div class="relative">
                      <label for="comment" class="leading-7 text-sm text-gray-600">コメント</label>
                      <textarea type="text" id="comment" name="comment" class="drop-shadow-xl w-full bg-gray-20 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                      <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                    </div>
                  </div>

                <div class="flex">
                  <div class="p-10 w-full">
                      <button type="submit" class=" drop-shadow-xl flex mx-auto text-white bg-[#84cc16] border-0 py-2 px-8 focus:outline-none hover:bg-[#65a30d] rounded text-lg">登録する</button>
                    </div>
                    <div class="p-10 w-full">
                      <button type="button" class="drop-shadow-xl flex mx-auto text-white bg-[#22c55e] border-0 py-2 px-8 focus:outline-none hover:bg-[#16a34a] rounded text-lg">戻る</button>
                  </div>
                </div>

                </div>
              </div>
              </form>
  </div>
</x-app-layout>
