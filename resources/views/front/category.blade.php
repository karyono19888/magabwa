<x-layout>
	<x-navbar :categories="$categories"/>
	<section id="Category-result" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
		<h1 class="text-4xl leading-[45px] font-bold text-center">
			Explore Our <br />
			{{$category->name}} News
		</h1>
		<div id="search-cards" class="grid grid-cols-3 gap-[30px]">
            @forelse ($category->news as $news)
                <a href="{{route('front.details',$news->slug)}}" class="card">
                    <div
                        class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
                        <div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
                            <div
                                class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
                                <p class="text-xs leading-[18px] font-bold uppercase">{{$news->category->name}}</p>
                            </div>
                            <img src="{{Storage::url($news->thumbnail)}}" alt="thumbnail photo"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="flex flex-col gap-[6px]">
                            <h3 class="text-lg leading-[27px] font-bold line-clamp-2">{{$news->name}}</h3>
                            {{-- <h3 class="text-lg leading-[27px] font-bold">{{Str::substr($news->name,0, 55)}} {{ strlen($news->name) > 55 ? '...':'' }}</h3> --}}
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">{{$news->created_at->format('d M, Y')}}</p>
                        </div>
                    </div>
                </a>
            @empty
                <h1>data {{$category->name}} tidak ditemukan...</h1>
            @endforelse
		</div>
	</section>
	<x-ads-banner :ads_banner="$adsBanner"/>
</x-layout>