<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          show
      </h2>
  </x-slot>

  {{-- <div class="py-5">

  </div> --}}


        @foreach( $dates as $key )
        <section class="text-gray-600 body-font">
        <div>
            <div class="title-font text-5xl py-10 px-20 m-10 w-15 bg-blue-100 sm:text-xl text-gray-900 font-medium mb-2 flex justify-between">
                <p class="title-font text-4xl ">{{$key->date}}</p>

            </div>
            <div class="float-right mr-20 ">
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('posts.dates.schedules.create',['post'=>$id,'date'=>$key->id])">
                                    予定作成
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('posts.edit',['post'=>$id])">
                                    編集
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    削除
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
            @for($i=0;$i<count($schedule);$i++)
            @for($j=0;$j<count($schedule[$i]);$j++)
            @if($schedule[$i][$j]->date_id==$key->id)
            <div class="container mx-auto flex px-5  md:flex-row flex-col items-center">
                <div class="pl-10 lg:flex-grow md:w-1/5 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                  <p class="title-font sm:text-3xl text-2xl mb-4 font-medium text-gray-900 leading-relaxed">
                      {{$schedule[$i][$j]->start_time}}
                  </p>
                  <div class="ml-11 title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">|</div>
                  <p class="title-font sm:text-3xl text-3xl mb-4 font-medium text-gray-900 mb-8 leading-relaxed">
                      {{$schedule[$i][$j]->end_time}}
                  </p>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/3 w-5/6 p-5">
                  <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                </div>
                <div class="lg:flex-grow md:w-1/3 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                  <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                  {{$schedule[$i][$j]->destination}}
                  </h1>
                  <p class="mb-8 leading-relaxed">
                  {{$schedule[$i][$j]->comment}}
                  </p>
                  <div class="flex justify-center">
                    <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                    <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
                  </div>
                </div>
            </div>

         @endif
         @endfor
         @endfor

            </section>
        @endforeach




</x-app-layout>
