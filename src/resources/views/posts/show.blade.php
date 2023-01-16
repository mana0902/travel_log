<x-app-layout>
  <x-slot name="header">
      {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          show
      </h2> --}}
  </x-slot>

  {{-- <div class="py-5">

  </div> --}}

<div class="bg-gradient-to-r from-rose-100 to-teal-100 ">
        @foreach( $dates as $key )
        <section class="text-gray-600 body-font">
        <div>
            <div class="title-font text-1xl py-4 px-4 w-15 bg-blue-100 sm:text-xl text-gray-900 font-medium mb-2 flex justify-between">
                <p class="title-font text-1xl ">{{$key->date}}</p>
                <div class="float-right mr-20 ">
                    <div class=" sm:flex sm:items-center sm:ml-6">
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
                                {{-- <x-dropdown-link :href="route('posts.edit',['post'=>$id])">
                                        編集
                                </x-dropdown-link> --}}

                                <!-- Authentication -->
                                {{-- <form action="{{ route('posts.destroy', ['post'=>$id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">削除</button>
                                </form> --}}
                                {{-- <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        削除
                                    </x-dropdown-link>
                                </form> --}}
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>

            </div>

        </div>
            @for($i=0;$i<count($schedule);$i++)
             @for($j=0;$j<count($schedule[$i]);$j++)
              @if($schedule[$i][$j]->date_id==$key->id)
            <div class="container mx-auto flex px-5  sm:px-2 mt-4 mb-0 flex-row  items-center md:flex-row flex-col items-center">
                <div class="flex">
                    <div class="my-auto sm:ml-8 flex w-4 h-4 sm:w-10 sm:h-10"><img src="{{asset('/images/時計の無料アイコン.svg')}}"></div>
                    <div class="mx-5  lg:flex-grow py-auto flex  md:text-left  md:items-center text-center">
                        <p class="title-font sm:text-1xl text-1xl font-medium text-gray-900 leading-relaxed">
                        {{substr($schedule[$i][$j]->start_time, 0, 5)}}
                        </p>
                        <div class="mx-2">-</div>
                        <p class="title-font sm:text-1xl text-1xl font-medium text-gray-900 leading-relaxed">
                        {{substr($schedule[$i][$j]->end_time, 0, 5)}}
                        </p>
                    </div>
                </div>
                <!-- Slider main container -->
                @if(!is_null($schedule[$i][$j]->filename_1))
                <div class="slider">
                    @if(!is_null($schedule[$i][$j]->filename_1))

                    <div class="rounded"><img class="rounded" src="{{ asset('/storage/schedules/'.$schedule[$i][$j]->filename_1)}}"></div>
                    @endif
                    @if(!is_null($schedule[$i][$j]->filename_2))
                    <div class="rounded"><img class="rounded" src="{{ asset('/storage/schedules/'.$schedule[$i][$j]->filename_2)}}"></div>
                    @endif
                    @if(!is_null($schedule[$i][$j]->filename_3))
                    <div class="rounded"><img class="rounded" src="{{ asset('/storage/schedules/'.$schedule[$i][$j]->filename_3)}}"></div>
                    @endif
                    @if(!is_null($schedule[$i][$j]->filename_4))
                    <div class="rounded"><img class="rounded" src="{{ asset('/storage/schedules/'.$schedule[$i][$j]->filename_4)}}"></div>
                    @endif
                </div>
                @endif
                {{-- <div class="lg:max-w-lg lg:w-full md:w-1/3 w-5/6 p-5">
                  <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                </div> --}}
                <div class="lg:flex-grow lg:p-10 md:w-1/3 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center sm:p-2">
                  <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                  {{$schedule[$i][$j]->destination}}
                  </h1>
                  <p class="mb-8 leading-relaxed">
                  {{$schedule[$i][$j]->comment}}
                  </p>
                  <div class="flex justify-center">

                    <button onclick=location.href='{{ route('posts.dates.schedules.edit',['post'=>$id,'date'=>$key->id,'schedule'=>$schedule[$i][$j]->id]) }}' class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集</button>
                    <form action="{{ route('posts.dates.schedules.destroy',['post'=>$id,'date'=>$key->id,'schedule'=>$schedule[$i][$j]->id]) }}" method="POST">
                                  @method('delete')
                                  @csrf
                                    <button type="submit" class="btn btn-danger ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">削除</button>
                                  </form>
                    {{-- <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">削除</button> --}}
                  </div>
                </div>
            </div>

           @endif
          @endfor
         @endfor

            </section>
        @endforeach
</div>

    <script>
    $('.slider').slick({
    // autoplay: true,       //自動再生
    // autoplaySpeed: 2000,  //自動再生のスピード
    // speed: 800,           //スライドするスピード
    dots: true,           //スライド下のドット
    arrows: true,         //左右の矢印
    infinite: true,       //永久にループさせる
});
    </script>



</x-app-layout>
