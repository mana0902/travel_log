<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
index
      </h2>
  </x-slot>

  <div class="py-12  bg-lime-200">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-lime-200 ">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                  {{ __("You're logged in!") }}
              </div>
          </div>
<section class="text-gray-600 body-font bg-lime-200">
  <div class="float-right mt-5"><div class="hidden sm:flex sm:items-center sm:ml-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                <div class="ml-1 text-gray-600 title-font text-2xl">
                  +
                    {{-- <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg> --}}
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link :href="route('posts.create')">
              新規投稿
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
</div></div>
            <div class="container px-5 py-24 mx-auto">

              <div class="flex flex-wrap -m-4">

                  @foreach ($posts as $post)

               <div class="lg:w-1/4 md:w-1/2 p-2 w-full container">

                  <div class=" bg-white p-4 rounded">
                    <a class="block relative h-48 rounded overflow-hidden" href="{{route('posts.show',['post'=>$post->id])}}">
                      @if($post->thumbnail == '')
                      <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
                      @else
                      <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ asset('/storage/posts/'.$post->thumbnail)}}">
                      @endif
                    </a>

                    <div class="mt-4 flex ">
                      <h2 class=" flex-1 px-4 text-gray-900 title-font text-lg font-medium">
                        <a href="{{route('posts.show',['post'=>$post->id])}}"><div>{{$post->title}}</div></a>
                      </h2>
                      <div class="flex-end">
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                          <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                              <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div class="ml-1 text-gray-600 title-font text-1xl">・・・</div>
                              </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('posts.edit',['post'=>$post->id])">
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
                    </div></div>
                    </div>
                  </div>
              </div>
                  @endforeach
              </div>

            </div>
          </section>
      </div>
  </div>
</x-app-layout>
